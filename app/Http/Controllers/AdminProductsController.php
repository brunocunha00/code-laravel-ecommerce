<?php
namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;

class AdminProductsController extends Controller{

    protected $productModel;

    public function __construct(Product $product){
        $this->productModel = $product;
    }

    public function index(){
        return view('products.index', ['products'=>$this->productModel->all()]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function storage(ProductRequest $productRequest)
    {
        $this->productModel->fill($productRequest->all())->save();
        return redirect()->route('product_index');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $productRequest, $id)
    {
        $this->productModel->find($id)->update($productRequest->all());
        return redirect()->route('product_index');
    }

    public function delete($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('product_index');
    }
}