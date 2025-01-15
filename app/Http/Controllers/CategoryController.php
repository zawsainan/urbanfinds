<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index',['categories' => Category::paginate(10)]);
    }

    public function search(Request $request){
        $searchBy = $request->searchBy;
        $categories = Category::where('name','Like',"%$searchBy%")->paginate(10);
        return view('admin.category.index',['categories' => $categories]);
    }

    public function delete($id){
        $category = Category::findOrFail($id);
        $category->products()->delete();
        $category->delete();
        return back()->with('success','Category and related products deleted successfully.');
    }

    public function add(){
        return view('admin.category.add');
    }

    public function create(){
        if(Category::where('name',request()->name)->exists()){
            return back()->withErrors('name','Category already exist');
        }

        $category = new Category();
        $category->name = request()->name;
        $category->slug = request()->slug;
        $category->save();
        return redirect('admin/category')->with('success','New Category has been added successfully.');
    }
}
