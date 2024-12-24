@extends('products.layouts.main')

@section('container')
    <div class="row g-3"> <!-- Add g-3 for gutter spacing -->
        @foreach ($products as $product)
            <div class="col-md-3"> <!-- Ensure it's col-md-3 for 4 products per row -->
                <div class="card" style="width: 100%;">
                    <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->nama }}</h5>
                        <p class="card-text">{{ $product->harga }}</p>
                        <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>
@endsection
