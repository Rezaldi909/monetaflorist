<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutItem;
use App\Mail\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

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
                    'quantity' => $item['quantity'],
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
            // Mail::to($validatedData['email'])->send(new OrderPlaced($checkout, $checkoutItems));

            // // Kirim ke admin (jika diperlukan)
            // Mail::to('admin@example.com')->send(new OrderPlaced($checkout, $checkoutItems));
            $this->sendWhatsAppMessage($checkout, $checkoutItems);

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

    private function sendWhatsAppMessage($checkout, $checkoutItems)
    {
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $twilioWhatsAppNumber = env('TWILIO_WHATSAPP_NUMBER');
    
        $client = new Client($twilioSid, $twilioAuthToken);
    
        // Hitung total harga pesanan
        $total = 0;
        foreach ($checkoutItems as $item) {
            $cleanedPrice = str_replace(['Rp', ',', '.'], '', $item['price']);
            $itemTotal = (float) $cleanedPrice * $item['quantity'];
            $total += $itemTotal;
        }
    
        // Format pesan WhatsApp
        $message = "🌸 *Order Confirmation* 🌸\n\n";
        $message .= "*Customer Details:*\n";
        $message .= "Name: {$checkout->first_name} {$checkout->last_name}\n";
        $message .= "Address: {$checkout->address}\n";
        $message .= "Phone: {$checkout->phone}\n\n";
    
        $message .= "*Order Details:*\n";
        foreach ($checkoutItems as $item) {
            $message .= "- {$item['name']} * {$item['quantity']} | Rp " . number_format(floatval(str_replace('.', '', $item['price'])), 0, ',', '.') . "\n";
        }
        
    
        // Format total price
        $message .= "\n*Total:* Rp " . number_format($total, 0, ',', '.') . "\n\n";
    
        // Update message to request payment proof
        $message .= "Please send us your payment proof so we can process your order.\n";
        $message .= "Bank Transfer Details:\n";
        $message .= "- Bank: BCA\n";  // Replace with actual bank name
        $message .= "- Account Number: 91283719237\n";  // Replace with actual account number
        $message .= "- Account Name: MonetaFlorist\n";  // Replace with actual account name
    
        $message .= "\nThank you for your order! 💐\n";
        $message .= "We look forward to receiving your payment proof. 🌟";
    
        // Modify the phone number to replace the leading 0 with +62 for Twilio
        $phone = $checkout->phone;
        if (substr($phone, 0, 1) == '0') {
            // Remove the leading zero and replace it with +62
            $phone = '+62' . substr($phone, 1);
        }
    
        // Send the WhatsApp message
        $client->messages->create(
            "whatsapp:{$phone}", // Send to the modified phone number
            [
                'from' => $twilioWhatsAppNumber,
                'body' => $message,
            ]
        );
    }
    

}
