<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Contact;
use App\Models\Checkout;  // Ganti dengan model Order Anda

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah produk, kontak, pesanan, dan kategori
        $productCount = Product::count();
        $contactCount = Contact::count();
        $orderCount = Checkout::count();  // Ganti dengan nama model kategori Anda

        return view('dashboard.index', [
            'productCount' => $productCount,
            'contactCount' => $contactCount,
            'orderCount' => $orderCount
        ]);
    }
}

