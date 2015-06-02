<?php
namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Category;
use CodeCommerce\Http\Requests\ProductImageRequest;
use CodeCommerce\Http\Requests\ProductRequest;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

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

    public function indexImage($id)
    {
        $product = $this->productModel->find($id);
        return view('products.images.index', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);
        return view('products.images.create', compact('product'));
    }

    public function storageImage(ProductImageRequest $imageRequest, $id, ProductImage $productImage)
    {
        $file = $imageRequest->file('image');
        $image = $productImage->create(['product_id' => $id, 'extension' => $file->getClientOriginalExtension()]);
        Storage::disk('public_local')->put('images/'. $image->id . '.' . $image->extension, File::get($file));

        return redirect()->route('product_image_index', $id);
    }

    public function deleteImage($id, ProductImage $productImage)
    {
        $image = $productImage->find($id);
        $imageName = 'images/' . $image->id . '.' . $image->extension;
        $disk = Storage::disk('public_local');
        if($disk->exists($imageName)){
            $disk->delete($imageName);
            $product = $image->product;
            $image->delete();

            return redirect()->route('product_image_index', $product->id);
        }else{
            throw new FileNotFoundException('Arquivo não encontrado');
        }



    }
}