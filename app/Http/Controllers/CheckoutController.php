<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutItem;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'phone' => 'required|max:15',
            'order_notes' => 'nullable|string',
        ]);

        // Mulai transaksi database
        DB::beginTransaction();
        try {
            // Buat entri di tabel checkouts
            $checkout = Checkout::create(array_merge($validatedData, [
                'status' => 'pending', // Set status default
            ]));
    

            // Ambil produk dari session cart
            $cart = Session::get('cart', []);
            
            // Loop melalui produk di cart dan buat entri untuk setiap produk di tabel checkout_items
            foreach ($cart as $item) {
                CheckoutItem::create([
                    'checkout_id' => $checkout->id,
                    'name' => $item['name'],
                    'price' => (float) str_replace('.', '', $item['price']),
                    'image' => $item['image'], // Pastikan menggunakan 'image'
                    'delivery_options' => $item['delivery_options'],
                    'delivery_time' => $item['delivery_time'],
                    'delivery_date' => $item['delivery_date'],
                    'sender_name' => $item['sender_name'],
                    'sender_phone' => $item['sender_phone'],
                    'from' => $item['from'],
                    'to' => $item['to'],
                    'message' => $item['message'] ?? null,
                ]);
                
            }
            

            // Hapus cart dari session setelah order ditempatkan
            Session::forget('cart');

            $checkoutItems = $cart;

            // Kirim email ke pelanggan
            Mail::to($validatedData['email'])->send(new OrderPlaced($checkout, $checkoutItems));

            // // Kirim ke admin (jika diperlukan)
            // Mail::to('admin@example.com')->send(new OrderPlaced($checkout, $checkoutItems));

            // Commit transaksi
            DB::commit();

            // Redirect dan tampilkan pesan sukses
            return redirect('/')->with('success', 'Your order has been placed successfully!');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi error
            DB::rollBack();

            // Redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'An error occurred while processing your order. Please try again.');
        }
    }
}
