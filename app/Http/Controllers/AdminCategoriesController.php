<?php

namespace CodeCommerce\Http\Controllers;


use CodeCommerce\Category;
use CodeCommerce\Http\Requests\CategoryRequest;

class AdminCategoriesController extends Controller{

    protected $categoryModel;

    public function __construct(Category $category){
        $this->categoryModel = $category;
    }

    public function index(){
        return view("categories.index", ['categories'=>$this->categoryModel->all()]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function storage(CategoryRequest $categoryRequest){
        $this->categoryModel->fill($categoryRequest->all())->save();
        return redirect()->route('category_index');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $categoryRequest, $id)
    {
        $this->categoryModel->find($id)->update($categoryRequest->all());
        return redirect()->route('category_index');
    }

    public function delete($id)
    {
        $this->categoryModel->find($id)->delete();
        return redirect()->route('category_index');
    }

}