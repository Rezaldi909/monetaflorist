<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // Ambil data produk dari input
        $product = [
            'id' => $request->product_id,
            'name' => $request->input('product_name'),
            'price' => $request->input('product_price'),
            'photo' => $request->input('product_photo'),
            'delivery_options' => $request->input('delivery_options'),
            'delivery_time' => $request->input('delivery_time'),
            'sender_name' => $request->input('sender_name'),
            'sender_phone' => $request->input('sender_phone'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'message' => $request->input('message')
        ];

        // Simpan ke dalam session
        $cart = session()->get('cart', []);
        $cart[] = $product;
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function show()
    {
        // Ambil data cart dari session
        $cart = session('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price']; // Pastikan 'price' di cart adalah tipe numerik
    }

        // Redirect ke view checkout dengan data cart
        return view('cart', compact('cart', 'total'), [
            "title" => "Cart",
        ]);
    }

    public function showCheckout()
    {
        // Ambil data cart dari session
        $cart = session('cart', []);

        // Hitung total harga
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price']; // Pastikan 'price' numerik
        }

        // Tampilkan halaman checkout dengan data cart dan total harga
        return view('checkout', compact('cart', 'total'), [
            "title" => "Checkout",
        ]);
    }


}
