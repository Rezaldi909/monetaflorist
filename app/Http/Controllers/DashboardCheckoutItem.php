<?php

namespace App\Http\Controllers;

use App\Models\CheckoutItem;
use Illuminate\Http\Request;

class DashboardCheckoutItem extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\CheckoutItem  $checkoutItem
     * @return \Illuminate\Http\Response
     */
    public function show(CheckoutItem $checkoutItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CheckoutItem  $checkoutItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = CheckoutItem::findOrFail($id);
        return view('dashboard.checkout-items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CheckoutItem  $checkoutItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'delivery_options' => 'required|string',
            'delivery_time' => 'required|string',
            'sender_name' => 'required|max:255',
            'sender_phone' => 'required|max:15',
            'from' => 'required|string',
            'to' => 'required|string',
            'message' => 'nullable|string',
        ]);

        $item = CheckoutItem::findOrFail($id);
        $item->update($validatedData);

        return redirect()->route('checkouts.show', $item->checkout_id)
                         ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CheckoutItem  $checkoutItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Cari item dalam checkout berdasarkan ID
            $item = CheckoutItem::findOrFail($id);
    
            // Hapus item tersebut
            $item->delete();
    
            // Redirect dengan pesan sukses
            return redirect()->route('checkouts.show')->with('success', 'Item deleted successfully.');
        } catch (\Exception $e) {
            // Redirect kembali dengan pesan error
            return redirect()->route('checkouts.index')->with('error', 'An error occurred while deleting the item.');
        }
    }
    
}
