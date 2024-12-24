<?php

namespace App\Http\Controllers;

use App\Models\FlowerType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class DashboardFlowerTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.collections.flower.index',[
            'flower' => FlowerType::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.collections.flower.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:flower_types'
        ]);

        FlowerType::create($validatedData);

        return redirect('/dashboard/collections/flower')->with('success', 'New flower type has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlowerType  $flowerType
     * @return \Illuminate\Http\Response
     */
    public function show(FlowerType $flowerType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FlowerType  $flowerType
     * @return \Illuminate\Http\Response
     */
    public function edit(FlowerType $flowerType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlowerType  $flowerType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlowerType $flowerType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlowerType  $flowerType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlowerType $flowerType)
    {
        $flowerType->forceDelete();
        return redirect('/dashboard/collections/flower')->with('success', 'Flower type has been deleted!');
    }
}
