<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;

class StoreController extends Controller {

    public function index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();
        $categories = Category::all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function productsByCategory($id)
    {
        $products = Category::find($id)->products;
        $categories = Category::all();
        return view('store.products', compact('products', 'categories'));
    }
}
