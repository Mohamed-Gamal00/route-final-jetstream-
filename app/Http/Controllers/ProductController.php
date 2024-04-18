<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function allProducts()
    {
        $products = Product::all();
        return view('Admin.products.index', compact("products"));
    }
    public function create()
    {
        $categories = Category::all();
        return view('Admin.products.create', compact("categories"));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "image" => "required|image|mimes:png,jpg,jepg",
            "price" => "required|numeric",
            "quantity" => "required|integer",
            "category_id" => "required",
        ]);
        //storage
        $data['image'] = Storage::putFile("products", $data['image']);

        //create
        Product::create($data);

        //redirect
        return redirect(url("products"));
    }

    public function details($id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.products.details', compact('product'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::findOrFail($id);
        return view('Admin.products.edit', compact("categories", "product"));
    }

    public function update(Request $request,$id)
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "desc" => "required|string",
            "image" => "image|mimes:png,jpg,jepg",
            "price" => "required|numeric",
            "quantity" => "required|integer",
            "category_id" => "required",
        ]);
        //     //storage
        $product = Product::findOrFail($id);
        if ($request->has("image")) {
            Storage::delete($product->image);
            $data['image'] = Storage::putFile("products", $data['image']);
        }
        $product->update($data);
        return redirect(url("products/details/$id"))->with('sucess', "Data updated successfuly");
    }


    public function delete($id)
    {

        $product = Product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route('products')->with('success','data deleted succefully');
    }
}
