<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutItem;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data checkout
        $validatedData = $request->validate([
            'email' => 'required|email',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'postal_code' => 'required|max:10',
            'phone' => 'required|max:15',
            'order_notes' => 'nullable|string',
        ]);

        // Buat entri di tabel checkouts
        $checkout = Checkout::create($validatedData);

        // Ambil produk dari session cart
        $cart = Session::get('cart', []);

        // Loop melalui produk di cart dan buat entri untuk setiap produk di tabel checkout_items
        foreach ($cart as $item) {
            CheckoutItem::create([
                'checkout_id' => $checkout->id, // Hubungkan ke checkout yang baru dibuat
                'name' => $item['name'],
                'price' => $item['price'],
                'delivery_options' => $item['delivery_options'],
                'delivery_time' => $item['delivery_time'],
                'sender_name' => $item['sender_name'],
                'sender_phone' => $item['sender_phone'],
                'from' => $item['from'],
                'to' => $item['to'],
                'message' => $item['message'] ?? null, // Kolom message bisa nullable
            ]);
        }

        // Hapus cart dari session setelah order ditempatkan
        Session::forget('cart');

        // Send email to the customer



        // Redirect dan tampilkan pesan sukses
        return redirect('/')->with('success', 'Your order has been placed successfully!');
    }
}
