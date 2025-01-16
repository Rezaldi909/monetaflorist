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
            'image' => $request->input('product_photo'),
            'delivery_options' => $request->input('delivery_options'),
            'delivery_time' => $request->input('delivery_time'),
            'delivery_date' => $request->input('delivery_date'),
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

        return redirect('/')->with('success', 'Product added to cart');
    }

    public function show()
    {
        // Ambil data cart dari session
        
        $cart = session('cart', []);

        $total = 0;
        foreach ($cart as $item) {
            $total += (float) str_replace(['Rp', ',', '.'], '', $item['price']);
        }
        

        // Redirect ke view checkout dengan data cart
        return view('cart', compact('cart', 'total'), [
            "title" => "CART",
        ]);
    }

    public function showCheckout()
    {
        // Ambil data cart dari session
        $cart = session('cart', []);
    
        // Hitung total harga
        $total = 0;
        foreach ($cart as $item) {
            // Sanitize the price to ensure it's a numeric value
            $cleanedPrice = str_replace(['Rp', ',', '.'], '', $item['price']);  // Remove currency symbols and commas
            $total += (float) $cleanedPrice;  // Convert to float for calculations
        }
    
        // Tampilkan halaman checkout dengan data cart dan total harga
        return view('checkout', compact('cart', 'total'), [
            "title" => "Place Order",
        ]);
    }
    

    public function delete($index)
    {
        // Ambil data cart dari session
        $cart = session('cart', []);

        // Hapus item berdasarkan indeks
        if (isset($cart[$index])) {
            unset($cart[$index]);
        }

        // Simpan ulang cart ke session
        session(['cart' => $cart]);

        // Redirect kembali ke halaman cart dengan pesan sukses
        return redirect()->back()->with('success', 'Item has been removed from the cart.');
    }


}
