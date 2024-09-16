@extends('layouts.main')

@section('container')


    <h1 class="m-4">{{ $title }}</h1>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4"> <!-- Adjust column width to fit 4 cards per row -->
                    <div class="card" style="width: 100%;">
                        <img src="https://source.unsplash.com/featured/?{{ $product->image }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>
    
@endsection
