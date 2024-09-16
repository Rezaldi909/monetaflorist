<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\FlowerType;
use App\Models\ProductType;
use App\Models\EventType;
use Clockwork\Request\Timeline\Event;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Fetch the flower type with id = 1 (assumed to be 'Fresh Flower')
        $products = Product::latest();

        $flowerType = FlowerType::find(1);
        $new = ProductType::find(1);
        $event = EventType::find(1);

        return view('home', [
            "title" => "Home",
            "products" => $products->take(4)->get(),
            "flowers" => $flowerType->products()->take(4)->get(),  // Pass the related products to the view
            "new" => $new->products()->take(4)->get(),  // Pass the related products to the view
            "event" => $event->products()->take(4)->get(),  // Pass the related products to the view
        ]);
    }
}

