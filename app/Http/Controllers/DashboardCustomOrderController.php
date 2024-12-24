<?php

namespace App\Http\Controllers;

use App\Models\CustomOrder;
use Illuminate\Http\Request;

class DashboardCustomOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.custom-order.index',[
            'customOrder' => CustomOrder::all()
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
     * @param  \App\Models\CustomOrder  $customOrder
     * @return \Illuminate\Http\Response
     */
    public function show(CustomOrder $customOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomOrder  $customOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomOrder $customOrder)
    {
        return view('dashboard.custom-order.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomOrder  $customOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomOrder $customOrder)
    {
            // Validasi inputan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'message' => 'nullable|string',
        ]);

        // Update data custom order
        $customOrder->update($validatedData);

        return redirect()->route('custom-orders.index')->with('success', 'Custom order updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomOrder  $customOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomOrder $customOrder)
    {
        CustomOrder::destroy($customOrder->id);
        return redirect('/dashboard/custom-order')->with('success', 'Custom Order has been deleted!');
    }
}
