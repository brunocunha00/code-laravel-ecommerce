<?php namespace CodeCommerce;

use Exception;
use Illuminate\Database\Eloquent\Model;
use PHPSC\PagSeguro\Items\Item;
use CodeCommerce\Order;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class PagSeguro extends Model {

    protected $fillable = [
        'order_id',
        'code',
        'status'
    ];

    protected $table = 'pagseguro_payments';

    public function order()
    {
        return $this->belongsTo('CodeCommerce\Order');
    }

    public function createIntentPayment(Order $order, CheckoutService $checkoutService)
    {

        $checkout = $checkoutService->createCheckoutBuilder();
        $checkout->setRedirectTo(route('pagseguro_return'));
        $checkout->setReference($order->id);
        foreach ($order->items as $k => $item) {
            $checkout->addItem(new Item($k, $item->product->name, $item->price, $item->qtd));
        }

        return $checkoutService->checkout($checkout->getCheckout());

    }


}
