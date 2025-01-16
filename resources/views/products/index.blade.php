@extends('products.layouts.main')

@section('container')
    <div class="row g-3"> <!-- Add g-3 for gutter spacing -->
        @foreach ($products as $product)
            <div class="col-md-3"> <!-- Ensure it's col-md-3 for 4 products per row -->
                <div class="card" style="width: 100%;">
                    <img style="width: 100%; height: 300px; object-fit: contain;" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                    <div class="card-body">
                        <h5 class="card-title text-new">{{ $product->nama }}</h5>
                        <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
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
