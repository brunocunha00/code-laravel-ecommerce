<?php
namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Product;

class AdminProductsController extends Controller{

    protected $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    public function index(){
        return view('products.index', ['products'=>$this->product->all()]);
    }
}