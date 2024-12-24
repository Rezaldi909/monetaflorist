<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function show(ProductType $type)
    {
        return view('products.index', [
            'title' => $type->nama,
            'products' => $type->products()->paginate(10)->withQueryString(), 
            'type' => $type->nama,
        ]);
    }
}
