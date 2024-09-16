<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest();

        if(request('search')) {
            $products->where('nama', 'like', '%' . request('search') . '%');
        }

        return view('products', [
            "title" => "All Products",
            "products" => $products->paginate(20)->withQueryString()
        ]);
    }



    public function show(Product $product)
    {
        return view('detail', [
            "title" => "Detail",
            "product" => $product->load('event')
        ]);
    }
}
