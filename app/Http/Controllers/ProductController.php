<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('products', compact('products'));
    }

    public function addProduct(Request $request)
    {
        // Product::create($request->all());
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();

        return response()->json([
            'status' => 'success'
        ]);
    }
}
