<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.categories.index',compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $rules = [
            'name' =>'required|string|unique:categories'
        ];

        $this->validate($request,$rules);

        Category::create([
           'name' => $request->get('name')
        ]);

        session()->flash('status','New Category has been created.');

        return redirect('/admin/categories');
    }

    public function edit($id){
        $category = Category::findOrFail($id);

        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,$id){
        $rules = [
            'name' =>'required|string'
        ];

        $this->validate($request,$rules);

        $category = Category::findOrFail($id);

        $category->update($request->all());

        session()->flash('success','The category has been updated');
        return redirect('/admin/categories');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        session()->flash('errors','The category has been deleted');
        return redirect('/admin/categories');
    }


}
