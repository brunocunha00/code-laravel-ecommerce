<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\PagSeguro;
use Illuminate\Http\Request;
use PHPSC\PagSeguro\Items\Item;
use PHPSC\PagSeguro\Purchases\Transactions\Locator;
use PHPSC\PagSeguro\Requests\Checkout\CheckoutService;

class PagSeguroController extends Controller {

    public function retorno(CheckoutService $checkoutService)
    {
        $checkout = $checkoutService->createCheckoutBuilder()
            ->addItem(new Item(1, 'Televisão LED 500', 8999.99, 4))
            ->addItem(new Item(2, 'Video-game mega ultra blaster', 799.99))
            ->getCheckout();

        $response = $checkoutService->checkout($checkout);
        dd($response);
        return redirect($response->getRedirectionUrl());
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
