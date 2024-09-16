<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use App\Http\Requests\StoreEventTypeRequest;
use App\Http\Requests\UpdateEventTypeRequest;

class EventTypeController extends Controller
{
    public function show(EventType $type)
    {
        return view('products', [
            'title' => $type->nama,
            'products' => $type->products()->paginate(10)->withQueryString(), // Pastikan relasi 'products' ada di model FlowerType
            'event' => $type->nama,
        ]);
    }
}
