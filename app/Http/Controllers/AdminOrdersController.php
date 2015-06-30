<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\Order;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller {

    public function index(Order $orderModel)
    {
        $orders = $orderModel->all();
        return view('orders.index', compact('orders'));
    }

    public function updateStatus(Order $orderModel, $id)
    {
        $orderModel->find($id)->updateStatus();

        $orders = $orderModel->all();
        return redirect()->route('order_index', compact('orders'));
    }

}
