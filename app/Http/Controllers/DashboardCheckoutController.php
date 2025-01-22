<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;


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


        // Kirim data checkout dan checkoutItems ke view
        return view('dashboard.checkouts.show', [
            'title' => "checkoutItems",
            'checkout' => $checkout,
            'checkoutItems' => $checkoutItems
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
            'status' => 'required|in:Pending,Processed,Completed',
            'order_notes' => 'nullable|string',
        ]);
    
        // Update data order
        $order->update($validatedData);
    
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
    
    
    

}
