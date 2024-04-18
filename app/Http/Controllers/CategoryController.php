<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategories()
    {
        $categories = Category::all();
        return view('Admin.categories.index', compact("categories"));
    }

    public function details($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.categories.details', compact('category'));
    }


    public function create()
    {
        return view('Admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
        ]);
        //create
        Category::create($data);

        //redirect
        return redirect(url("categories"));
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.categories.edit', compact("category"));
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
        ]);
        $product = Category::findOrFail($id);
        $product->update($data);
        return redirect(url("categories/details/$id"))->with('sucess', "Data updated successfuly");
    }


    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $categories = Category::all();
        return redirect()->route('categories');

        // return view('Admin.categories.index', compact("categories"))->with('success','data deleted succefully');
    }
}
