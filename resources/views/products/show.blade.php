@extends('layouts.main')

@section('container')

<div class="container text-center mb-5">
    <div class="row m-5">
        <div class="col-7">
            <article>
                <img style="height: 550px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
            </article>
        </div>

        <div class="col-5 text-start">
            <div class="container mx-5 p-0">
                <label class="mb-3 fw-bold fs-3" for="form-label">{{ $product->nama }}</label>
                <p class="mb-3">Rp. {{ $product->harga }}</p>

                <!-- Form utama yang mencakup semua field -->
                <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}"> <!-- Menambahkan input product_id -->
                    <input type="hidden" name="product_name" value="{{ $product->nama }}">
                    <input type="hidden" name="product_price" value="{{ $product->harga }}">
                    <input type="hidden" name="product_photo" value="{{ $product->image }}">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    PICK UP/DELIVERY DETAILS
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="mb-3">
                                        <label for="form-label"><b>Delivery Options</b></label>
                                        <input type="text" name="delivery_options" class="form-control" id="deliveryOptions">
                                    </div>
                                    <div class="mb-3 col-6">
                                        <label for="form-label">Pickup or Delivery Time</label>
                                        <select class="form-select" name="delivery_time">
                                            <option selected>9am - 2pm</option>
                                            <option value="1">3pm - 5pm</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sender_name" class="form-label">Sender Name</label>
                                        <input type="text" name="sender_name" class="form-control" id="senderName">
                                    </div>
                                    <div class="mb-3">
                                        <label for="sender_phone" class="form-label">Sender Phone</label>
                                        <input type="text" name="sender_phone" class="form-control" id="senderPhone">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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

                    <!-- Tombol submit di dalam form -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div style="height:50px;"></div>

<h2 class="my-5 text-center">Latest</h2>
<div class="container">
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 mb-4"> 
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
    <div class="mb-5 d-flex justify-content-center p-5">
        <a href="/products" class="btn btn-success px-3 py-2">View All Product</a>
    </div>
</div>

@endsection
