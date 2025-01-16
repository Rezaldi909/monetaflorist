@extends('layouts.main')

@section('container')

<div class="container text-center mb-5">
    <div class="row gy-4 m-5">
        <!-- Gambar Produk -->
        <div class="col-lg-7 col-md-12">
            <article>
                <img style="width: 100%;  max-height: 550px; object-fit: contain;" src="{{ asset('storage/' . $product->image) }}" class="card-img-top img-fluid" alt="{{ $product->nama }}">
            </article>
        </div>

        <!-- Detail Produk -->
        <div class="col-lg-5 col-md-12 text-start">
            <div class="container mx-lg-5 p-0">
                <h2 class="mb-3 fw-bold text-new">{{ $product->nama }}</h2>
                <p class="mb-3 fs-5">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                <!-- Form Utama -->
                <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="product_name" value="{{ $product->nama }}">
                    <input type="hidden" name="product_price" value="{{ number_format($product->harga, 0, ',', '.') }}">
                    <input type="hidden" name="product_photo" value="{{ $product->image }}">

                    <div class="accordion" id="accordionExample">
                        <!-- Delivery Details -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button bg-new text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    DELIVERY DETAILS
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label for="delivery_options" class="form-label">Delivery Options</label>
                                        <select class="form-select" name="delivery_options" id="delivery_options">
                                            <option selected>Select Delivery Options</option>
                                            <option value="Pickup">Pickup</option>
                                            <option value="Delivery">Delivery</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="delivery_time" class="form-label">Pickup or Delivery Time</label>
                                        <select class="form-select" name="delivery_time" id="delivery_time">
                                            <option selected>Select Time</option>
                                            <option value="9am - 2pm">9am - 2pm</option>
                                            <option value="3pm - 5pm">3pm - 5pm</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="delivery_date" class="form-label">Delivery Date</label>
                                        <input type="date" name="delivery_date" class="form-control" id="delivery_date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sender_name" class="form-label">Sender Name</label>
                                        <input type="text" name="sender_name" class="form-control" id="sender_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sender_phone" class="form-label">Sender Phone</label>
                                        <input type="text" name="sender_phone" class="form-control" id="sender_phone" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Message on Card -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed bg-new text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    MESSAGE ON CARD
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label for="from" class="form-label">From</label>
                                        <input type="text" name="from" class="form-control" id="from">
                                    </div>
                                    <div class="mb-3">
                                        <label for="to" class="form-label">To</label>
                                        <input type="text" name="to" class="form-control" id="to">
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">Message</label>
                                        <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-new text-white px-3 py-2 mt-3">ADD TO CART</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Produk Terbaru -->
<div class="my-5">
    <h2 class="text-center text-new">Latest</h2>
    <div class="row gy-4">
        @foreach ($products as $product)
        <div class="col-lg-3 col-md-6">
            <div class="card h-100">
                <img style="width: 100%; height: 300px; object-fit: contain;" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->nama }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->nama }}</h5>
                    <p class="card-text">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>
                    <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-5">
        <a href="/products" class="btn btn-new px-3 py-2">View All Products</a>
    </div>
</div>

@endsection
