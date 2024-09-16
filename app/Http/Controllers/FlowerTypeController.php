<?php

namespace App\Http\Controllers;

use App\Models\FlowerType;
use App\Http\Requests\StoreFlowerTypeRequest;
use App\Http\Requests\UpdateFlowerTypeRequest;

class FlowerTypeController extends Controller
{
    
    public function show(FlowerType $type)
    {
        return view('products', [
            'title' => $type->nama,
            'products' => $type->products()->paginate(10)->withQueryString(), // Pastikan relasi 'products' ada di model FlowerType
            'type' => $type->nama,
        ]);
    }
}
