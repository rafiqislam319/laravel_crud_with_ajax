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


    public function deleteProduct(Request $request)
    {
        Product::find($request->up_id)->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }


    //pagination
    public function paginateProduct()
    {
        $products = Product::latest()->paginate(5);
        return view('paginate_products', compact('products'));
    }

    //live search
    public function searchProduct(Request $request){
        $products = Product::where('name', 'like', '%'.$request->searchProduct.'%')
        ->orWhere('price', 'like', '%' . $request->searchProduct . '%')
        ->paginate(5);

        if($products->count() >=1){
            return view('paginate_products', compact('products'));
        }else{
            return response()->json([
                'status' => 'not_found'
            ]);
        }
        
    }
}
