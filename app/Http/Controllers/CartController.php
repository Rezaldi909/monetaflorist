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
            'message' => $request->input('message'),
            'quantity' => 1,
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
            $cleanedPrice = str_replace(['Rp', ',', '.'], '', $item['price']);
            $itemTotal = (float) $cleanedPrice * $item['quantity'];
            $total += $itemTotal;
        }
    
        // Redirect ke view checkout dengan data cart dan total harga
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
            
            // Multiply price by quantity to get the total price for each item
            $itemTotal = (float) $cleanedPrice * $item['quantity'];  // Convert to float for calculations
            
            // Add the item total to the overall total
            $total += $itemTotal;
        }
    
        // Tampilkan halaman checkout dengan data cart dan total harga
        return view('checkout', compact('cart', 'total'), [
            "title" => "Place Order",
        ]);
    }
    

    public function update($index)
    {
        $cart = session('cart', []);
        
        // Validate the quantity
        $quantity = request()->input('quantity', 1);
        $quantity = min(max(1, $quantity), 10); // Ensure quantity is between 1 and 10
        
        // Update the item in the cart
        if (isset($cart[$index])) {
            $cart[$index]['quantity'] = $quantity;
        }
        
        // Simpan kembali cart yang sudah diupdate ke session
        session(['cart' => $cart]);
    
        // Hitung total harga setelah update
        $total = 0;
        foreach ($cart as $item) {
            $cleanedPrice = str_replace(['Rp', ',', '.'], '', $item['price']);
            $itemTotal = (float) $cleanedPrice * $item['quantity'];
            $total += $itemTotal;
        }
        
        // Simpan total yang sudah diperbarui ke dalam session
        session(['cart_total' => $total]);
    
        return redirect()->route('cart');
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
