<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;

use CodeCommerce\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller {

    public function orders()
    {
        $orders = User::find(Auth::id())->orders;
        return view('user.orders', compact('orders'));
	}

}
