<?php

namespace App\Http\Controllers;

use App\Models\FlowerType;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
         ]);
     
         // The slug will be automatically generated
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
    public function edit($slug)
    {
        // Find the flower type by its slug
        $flowerType = FlowerType::where('slug', $slug)->firstOrFail();

        // Return the view with the flower type data
        return view('dashboard.collections.flower.edit', [
            'flowerType' => $flowerType
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlowerType  $flowerType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'slug' => 'required|unique:flower_types,slug,' . $slug . ',slug'
        ]);

        // Find the flower type by its slug
        $flowerType = FlowerType::where('slug', $slug)->firstOrFail();

        // Update the flower type with the validated data
        $flowerType->update($validatedData);

        // Redirect back with a success message
        return redirect('/dashboard/collections/flower')->with('success', 'Flower type has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlowerType  $flowerType
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // Find the flower type by its slug
        $flowerType = FlowerType::where('slug', $slug)->firstOrFail();

        // Delete the flower type
        $flowerType->delete();

        // Redirect back with a success message
        return redirect('/dashboard/collections/flower')->with('success', 'Flower type has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(FlowerType::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }
}
