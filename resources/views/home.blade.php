@extends('layouts.main')

@section('container')
    <h2 class="m-4">Latest</h2>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card" style="width: 100%;">
                        <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 d-flex justify-content-center p-5">
            <a href="/products" class="btn btn-primary">View All Product</a>
        </div>
    </div>

    <h2>Fresh Flowers</h2>
    <div class="container">
        <div class="row">
            @foreach ($flowers  as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card" style="width: 100%;">
                        <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 d-flex justify-content-center p-5">
            <a href="/products" class="btn btn-primary">View All Product</a>
        </div>
    </div>


    <h2>New</h2>
    <div class="container">
        <div class="row">
            @foreach ($new  as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card" style="width: 100%;">
                        <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 d-flex justify-content-center p-5">
            <a href="/products" class="btn btn-primary">View All Product</a>
        </div>
    </div>


    <h2>Event</h2>
    <div class="container">
        <div class="row">
            @foreach ($event  as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card" style="width: 100%;">
                        <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 d-flex justify-content-center p-5">
            <a href="/products" class="btn btn-primary">View All Product</a>
        </div>
    </div>

    
    
    
@endsection
