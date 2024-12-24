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

        return view('products.index', [
            "title" => "All Products",
            "products" => $products->paginate(20)->withQueryString()
        ]);
    }



    public function show(Product $product)
    {
        $products = Product::latest();

        return view('products.show', [
            "title" => "Detail",
            "products" => $products->take(4)->get(),
            "product" => $product->load('event')
        ]);
    }
}
