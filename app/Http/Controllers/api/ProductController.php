<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function all() {
        $products = Product::all();
        if($products == null) {
            return response()->json(["message"=>"products not found"],404);
        }
        return ProductResource::collection($products);
    }
    public function show($id) {
        $product = Product::find($id);
        if($product == null) {
            return response()->json(["message"=>"product not found"],404);
        }
        return new ProductResource($product);
    }

    public function store(Request $request) {

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

        // $validator = Validator::make($request->all(),[
        //     "name" => "required|string|max:255",
        //     "desc" => "required|string",
        //     "image" => "required|image|mimes:png,jpg,jepg",
        //     "price" => "required|numeric",
        //     "quantity" => "required|integer",
        //     "category_id" => "required|exists:categories,id",
        // ]);
        // if($validator->fails()) {
        //     return response()->json(["message"=>$validator->errors()],404);

        // }
        // Product::create([
        //     "name"=>$request->name,
        //     "desc"=>$request->desc,
        //     "price"=>$request->price,
        //     "quantity"=>$request->quantity,
        //     "image"=>$request->image,
        //     "category_id"=>$request->category_id,
        // ]);
        return response()->json(["message"=>"product add successfully"],201);
    }
}
