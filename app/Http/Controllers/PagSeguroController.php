<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\PagSeguro;
use Illuminate\Http\Request;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class PagSeguroController extends Controller {

    public function returnPayment(Request $request, Locator $locator)
    {
        $categories = Category::all();
        $transaction = $locator->getByCode($request->get('code'));
        return view('store.checkout_pagseguro', compact('transaction', 'categories'));
	}

    public function receiveNotification(Request $request, PagSeguro $pagSeguroModel, Locator $locator)
    {
        $notificationCode = $request->input('notificationCode');
        $payment = $locator->getByNotification($notificationCode);
        $pagSeguroModel->updateOrCreate(
            ['order_id' => $payment->getDetails()->getReference()],
            [
                'code' => str_replace('-', '', $payment->getDetails()->getCode()),
                'status' => $payment->getDetails()->getStatus()
            ]
        );
        return response('OK', 200);
    }


}
