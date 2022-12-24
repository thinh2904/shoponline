<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    }

    public function create(){
        return view('admin.category.create');
    }
    public function store(CategoryFormRequest $request){
        $validatedData = $request->validated();

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        $uploadPath = 'uploads/category/';
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move($uploadPath, $filename);

            $category->image = $uploadPath.$filename;
        }
        
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully');
    }

    #Tao ham khi click vao edit
    public function edit(Category $category){
        #lien ket voi edit.blade.php
        return view('admin.category.edit', compact('category')); #tra ve trang edit
    }

    // Tao ham update khi click vao update cua trang edit
    public function update(CategoryFormRequest $request, $category){
        $category = Category::findOrFail($category);

        // Su dung tuong tu ham store
        $validatedData = $request->validated();

        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['slug']);
        $category->description = $validatedData['description'];

        if($request->hasFile('image')){

            $uploadPath = 'uploads/category/';

            // Xoa anh cu
            $path = 'uploads/category/'.$category->image;
            // Su dung ham file
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;

            $file->move($uploadPath, $filename);

            $category->image = $uploadPath.$filename;
        }
        
        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->update();

        return redirect('admin/category')->with('message', 'Category Updated Successfully');
    }
}
