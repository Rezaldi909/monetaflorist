<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\FlowerType;
use App\Models\EventType;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index',[
            'products' => Product::where('users_id', auth()->user()->id)->get()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create', [
            'flowers' => FlowerType::all(),
            'productsTypes' => ProductType::all(),
            'events' => EventType::all(),
        ]);
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
            'flower_type_id' => 'required',
            'product_type_id' => 'required',
            'event_type_id' => 'required',
            'nama' => 'required|max:255',
            'slug' => 'required|unique:products',
            'harga' => 'required|numeric|lt:10000000',
            'image' => 'image|file|max:1024'
             
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['users_id'] = auth()->user()->id;

        Product::create($validatedData);

        return redirect('/dashboard/products')->with('success', 'New product has been added!');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('dashboard.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('dashboard.products.edit', [
            'product' => $product,
            'flowers' => FlowerType::all(),
            'productsTypes' => ProductType::all(),
            'events' => EventType::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $rules = [
            'flower_type_id' => 'required',
            'product_type_id' => 'required',
            'event_type_id' => 'required',
            'nama' => 'required|max:255',
            'harga' => 'required|numeric|lt:10000000',
            'image' => 'image|file|max:1024'
             
        ];

        

        $validatedData['users_id'] = auth()->user()->id;

        if($request->slug != $product->slug) {
            $rules['slug'] = 'required|unique:products';
        }

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product-images');
        }

        $validatedData['users_id'] = auth()->user()->id;

        Product::where('id', $product->id)
            ->update($validatedData);

        return redirect('/dashboard/products')->with('success', 'product has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image) {
            Storage::delete($product->image);
        }
        Product::destroy($product->id);
        return redirect('/dashboard/products')->with('success', 'New product has been deleted!');
    }


    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Product::class, 'slug', $request->nama);
        return response()->json(['slug' => $slug]);
    }

}
