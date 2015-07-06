<?php namespace CodeCommerce;

use Exception;
use Illuminate\Database\Eloquent\Model;
use PHPSC\PagSeguro\Items\Item;
use CodeCommerce\Order;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class PagSeguro extends Model {

    protected $fillable = [
        'order_id',
        'code'
    ];

    protected $table = 'pagseguro_payments';

    public function order()
    {
        return $this->belongsTo('CodeCommerce\Order');
    }

    public function createPayment(Order $order, CheckoutService $checkoutService)
    {

        $checkout = $checkoutService->createCheckoutBuilder();

        foreach ($order->items as $k => $item) {
            $checkout->addItem(new Item($k, $item->product->name, $item->price, $item->qtd));
        }
        $response = $checkoutService->checkout($checkout->getCheckout());
        $this->create(['order_id' => $order->id, 'code' => $response->getCode()]);
        return $response;

    }

}
