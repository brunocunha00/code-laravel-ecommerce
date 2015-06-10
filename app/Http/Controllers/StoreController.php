<?php namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Http\Requests;
use CodeCommerce\Product;
use CodeCommerce\Tag;

class StoreController extends Controller {

    public function index()
    {
        $pFeatured = Product::featured()->get();
        $pRecommend = Product::recommend()->get();
        $categories = Category::all();
        return view('store.index', compact('categories', 'pFeatured', 'pRecommend'));
    }

    public function category($id)
    {
        $products = Product::OfCategory($id)->get();
        $categories = Category::all();
        return view('store.category', compact('products', 'categories'));
    }

    public function product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('store.product',  compact('product', 'categories'));
    }

    public function tag($id)
    {
        $products = Tag::find($id)->products;
        $categories = Category::all();
        return view('store.category', compact('products', 'categories'));
    }

}
