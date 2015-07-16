<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use CodeCommerce\OrderItem;
use CodeCommerce\PagSeguro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class CheckoutController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user.profile');
    }

    public function place(Order $orderModel, OrderItem $orderItemModel)
    {
        if(!Session::has('cart')){
            return redirect()->route('store_index');
        }

        $cart = Session::get('cart');

        if($cart->getTotal() > 0)
        {
            $order = $orderModel->create(['user_id'=> Auth::user()->id , 'total'=>$cart->getTotal()]);
            foreach($cart->all() as $k => $item){
                $order->items()->create(['product_id'=>$k,'price'=>$item['price'], 'qtd'=>$item['qtd']]);
            }
            $cart->clear();
            $categories = Category::all();
            return view('store.checkout', compact('order', 'categories'));
        }

        return redirect()->route('store_index');
    }

    public function payment($id, Order $orderModel, PagSeguro $pagSeguro, CheckoutService $checkoutService)
    {
        $response = $pagSeguro->createIntentPayment($orderModel->find($id), $checkoutService);
        return redirect($response->getRedirectionUrl());
    }
}
