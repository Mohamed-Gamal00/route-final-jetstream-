<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

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
}
