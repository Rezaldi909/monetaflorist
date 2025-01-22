<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Twilio\Rest\Client;

class DashboardCheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->get('status'); // Get status filter
        $search = $request->get('search'); // Get search query
    
        // Reset to all if no filters are applied
        $orders = Checkout::when($status, function ($query) use ($status) {
            return $query->where('status', $status); // Filter by status
        })->when($search, function ($query) use ($search) {
            return $query->where(function ($q) use ($search) {
                $q->where('email', 'like', "%$search%")
                  ->orWhere('first_name', 'like', "%$search%")
                  ->orWhere('last_name', 'like', "%$search%")
                  ->orWhere('address', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhere('status', 'like', "%$search%");
            });
        })->paginate(10); // Adjust pagination as needed

        return view('dashboard.checkouts.index', [
            'orders' => $orders,
        ]);
    }
    
    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        // Mengambil semua item yang berhubungan dengan checkout tertentu
        $checkoutItems = $checkout->items;

        $total = $checkout->items->sum('item_total');

        // Kirim data checkout dan checkoutItems ke view
        return view('dashboard.checkouts.show', [
            'title' => "checkoutItems",
            'checkout' => $checkout,
            'checkoutItems' => $checkoutItems,
            'total' => $total,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Temukan checkout berdasarkan ID (menggunakan findOrFail agar jika tidak ada data ditemukan, akan melempar exception)
        $order = Checkout::findOrFail($id);
    
        // Kirim data ke view
        return view('dashboard.checkouts.edit', compact('order'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Checkout::findOrFail($id);
    
        // Validasi input
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'address' => 'required|max:255',
            'phone' => 'required|max:15',
            'status' => 'required|in:Pending,Processed,Completed,Cancelled,Refund',
            'order_notes' => 'nullable|string',
        ]);
    
        // Simpan status sebelumnya untuk pesan WhatsApp
        $previousStatus = $order->status;
    
        // Update data order
        $order->update($validatedData);
    
        // Kirim pesan WhatsApp jika status diperbarui
        if ($validatedData['status'] !== $previousStatus) {
            // Hanya kirim pesan untuk status 'processed' atau 'cancelled'
            if ($validatedData['status'] == 'Processed' || $validatedData['status'] == 'Cancelled' || $validatedData['status'] == 'Refund')  {
                $this->sendWhatsAppMessage($order);
            }
        }
    
        // Redirect dengan pesan sukses
        return redirect()->route('checkouts.index')->with('success', 'Order updated successfully!');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        // Menghapus checkout beserta items terkait
        $checkout->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect('/dashboard/checkouts')->with('success', 'Checkout has been deleted successfully.');
    }

    public function generatePdf()
    {
        // Ambil semua data order yang statusnya 'Completed' dan items terkait
        $orders = Checkout::with('items')
            ->where('status', 'Completed') // Menambahkan filter untuk status 'Completed'
            ->get();
        
        // Hitung total harga untuk setiap order
        $orders->map(function ($order) {
            $order->totalPrice = $order->items->sum('price'); // Menggunakan relasi items
            return $order;
        });
    
        // Muat view untuk laporan PDF
        $pdf = Pdf::loadView('dashboard.checkouts.pdf', compact('orders'))->setPaper('a4', 'landscape');
    
        // Kembalikan file PDF untuk diunduh
        return $pdf->stream('orders-report-completed.pdf');
    }
    
    private function sendWhatsAppMessage($order)
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $twilioPhoneNumber = env('TWILIO_WHATSAPP_NUMBER');
        
        $client = new Client($sid, $token);
    
        $total = $order->items->sum('item_total');
        
        // Kondisi untuk status 'Processed'
        if ($order->status == 'Processed') {
            $message = "🌸 *Order Confirmation* 🌸\n\n";
            $message .= "*Customer Details:*\n";
            $message .= "Name: {$order->first_name} {$order->last_name}\n";
            $message .= "Address: {$order->address}\n";
            $message .= "Phone: {$order->phone}\n\n";
    
            $message .= "*Order Details:*\n";
            foreach ($order->items as $item) {
                $message .= "- {$item->name} * {$item->quantity} | Rp " . number_format($item->price, 0, ',', '.') . "\n";
            }
    
            $message .= "\n*Total:* Rp " . number_format($total, 0, ',', '.') . "\n\n";
            $message .= "Thank you for your payment! 🌟\n";
            $message .= "Your payment proof has been received, and your order will be processed soon.\n";
    
        // Kondisi untuk status 'Cancelled'
        } elseif ($order->status == 'Cancelled') {
            $message = "🌸 *Order Cancellation* 🌸\n\n";
            $message .= "Hello, {$order->first_name} {$order->last_name}. Unfortunately, your order has been cancelled.\n\n";
            $message .= "*Order Details:*\n";
            foreach ($order->items as $item) {
                $message .= "- {$item->name} * {$item->quantity} | Rp " . number_format($item->price, 0, ',', '.') . "\n";
            }

            $message .= "\n*Total:* Rp " . number_format($total, 0, ',', '.') . "\n\n";
            $message .= "We are sorry for the inconvenience. Please contact us if you have any questions.\n";
            $message .= "Thank you for your understanding. 🌸";
    
        // Kondisi untuk status 'Refund'
        } elseif ($order->status == 'Refund') {
            $message = "🌸 *Refund Processed* 🌸\n\n";
            $message .= "Hello, {$order->first_name} {$order->last_name}. Your order has been cancelled, and we have initiated a refund for your purchase.\n\n";
            $message .= "*Order Details:*\n";
            foreach ($order->items as $item) {
                $message .= "- {$item->name} * {$item->quantity} | Rp " . number_format($item->item_total, 0, ',', '.') . "\n";
            }

            $message .= "\n*Total:* Rp " . number_format($total, 0, ',', '.') . "\n\n";
            $message .= "You should receive your refund shortly.\n";
            $message .= "Thank you for your patience and understanding. 🌸";
        }
    
        if ($message !== "") {
            $phone = $order->phone;
            if (substr($phone, 0, 1) == '0') {
                // Remove the leading zero and replace it with +62
                $phone = '+62' . substr($phone, 1);
            }
    
            // Kirim pesan WhatsApp
            $client->messages->create(
                "whatsapp:{$phone}", // Nomor WhatsApp pelanggan
                [
                    'from' => $twilioPhoneNumber, // Nomor WhatsApp Twilio Anda
                    'body' => $message, // Body pesan
                ]
            );
        }
    }
       
 

    
    

}
