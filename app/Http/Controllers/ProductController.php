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


    public function updateProduct(Request $request)
    {
        Product::where('id', $request->up_id)->update([
            'name' => $request->up_name,
            'price' => $request->up_price
        ]);

        return response()->json([
            'status' => 'success'
        ]);
    }
}
