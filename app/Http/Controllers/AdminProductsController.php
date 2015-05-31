<?php
namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;

class AdminProductsController extends Controller{

    protected $productModel;

    public function __construct(Product $product){
        $this->productModel = $product;
    }

    public function index(){
        return view('products.index', ['products'=>$this->productModel->paginate(10)]);
    }

    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');
        return view('products.create', compact('categories'));
    }

    public function storage(ProductRequest $productRequest)
    {
        $this->productModel->fill($productRequest->all())->save();
        return redirect()->route('product_index');
    }

    public function edit($id, Category $category)
    {
        $product = $this->productModel->find($id);
        $categories = $category->lists('name', 'id');
        return view('products.edit', compact('product', 'categories'));
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