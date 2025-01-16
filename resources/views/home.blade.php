@extends('layouts.main')

@section('container')
    <!-- Latest Products Section -->
    <h2 class="my-4 text-center text-new">LATEST</h2>
    <div class="container">
        <div class="row g-3">
            @foreach ($products as $product)
                <div class="col-md-3"> 
                    <div class="card" style="width: 100%;">
                        <img style="width: 100%; height: 300px; object-fit: contain;" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">

                        <div class="card-body">
                            <h5 class="card-title text-new">{{ $product->nama }}</h5>
                            <p class="card-text text-muted">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mb-5 d-flex justify-content-center">
                <a href="/products" class="btn btn-new text-white px-3 py-2">VIEW ALL PRODUCT</a>
            </div>
        </div>
    </div>

    <!-- Fresh Flowers Section -->
    <h2 class="my-5 text-center text-new">FRESH FLOWERS</h2>
    <div class="container">
        <div class="row g-3">
            @foreach ($flower as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card" style="width: 100%;">
                        <img style="width: 100%; height: 300px; object-fit: contain;" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                        <div class="card-body">
                            <h5 class="card-title text-new">{{ $product->nama }}</h5>
                            <p class="card-text text-muted">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mb-5 d-flex justify-content-center">
                <a href="/products" class="btn btn-new text-white px-3 py-2">VIEW ALL PRODUCT</a>
            </div>
        </div>
    </div>

    <!-- New Arrivals Section -->
    <h2 class="my-4 text-center text-new">NEW</h2>
    <div class="container">
        <div class="row g-3">
            @foreach ($new as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card" style="width: 100%;">
                        <img style="width: 100%; height: 300px; object-fit: contain;" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                        <div class="card-body">
                            <h5 class="card-title text-new">{{ $product->nama }}</h5>
                            <p class="card-text text-muted">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mb-5 d-flex justify-content-center">
                <a href="/products" class="btn btn-new text-white px-3 py-2">VIEW ALL PRODUCT</a>
            </div>
        </div>
    </div>

    <!-- Event Products Section -->
    <h2 class="my-4 text-center text-new">EVENT</h2>
    <div class="container">
        <div class="row g-3">
            @foreach ($event as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card" style="width: 100%;">
                        <img style="width: 100%; height: 300px; object-fit: contain;" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                        <div class="card-body">
                            <h5 class="card-title text-new">{{ $product->nama }}</h5>
                            <p class="card-text text-muted">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                            <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="mb-5 d-flex justify-content-center">
                <a href="/products" class="btn btn-new text-white px-3 py-2">VIEW ALL PRODUCT</a>
            </div>
        </div>
    </div>

    <!-- About Moneta Florist Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <h3 class="text-new my-4">MONETA FLORISTS</h3>
                <p class="text-center lh-lg text-muted"> 
                    <strong class="text-new">Moneta Florist</strong> adalah toko bunga yang berdedikasi untuk menghadirkan keindahan dan kebahagiaan melalui rangkaian bunga segar dan menawan. Kami percaya bahwa bunga bukan hanya sekadar hadiah, melainkan ungkapan cinta, kebahagiaan, dan kehangatan yang dapat menyentuh hati siapa saja.
                </p>
                <p class="text-center lh-lg text-muted">
                    Kami juga mendukung keberlanjutan dengan menggunakan bunga lokal berkualitas tinggi dan kemasan ramah lingkungan. Terima kasih telah mempercayakan momen-momen berharga Anda kepada Moneta Florist—kami siap membantu Anda menciptakan kenangan yang tak terlupakan.
                </p>
            </div>
            <div class="col-lg-6 d-flex align-items-center p-3">
                <img src="{{ asset('images/logo.jpg') }}" style="object-fit: :contain;" alt="Moneta Florist" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Location Map Section -->
    {{-- <div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <h2 class="text-new my-4">Lokasi Peta</h2>
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
            <div class="col-lg-4">
                <div class="mt-5 mx-5 fs-5">
                    <p class="text-muted">WHERE TO FIND US</p>
                    <div class="my-5 py-5">
                        <a href="/products" class="btn btn-new text-white px-3 py-2">VIEW ALL PRODUCT</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection
