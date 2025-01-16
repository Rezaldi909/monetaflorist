@extends('layouts.main')

@section('container')
    <div class="container-fluid my-5">
        <h2 class="text-center mb-5 text-new">PLACE ORDER</h2>
        <div class="row mt-5">
            <!-- Shipping Details Section -->
            <div class="col-lg-7">
                <div class="py-4 rounded">
                    <h4 class="mb-4 text-new">DETAILS</h4>
                    <form action="/place-order" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Personal Information -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required>
                            </div>
                            <div class="col-lg-6 mb-3">
                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required>
                            </div>

                            <!-- Shipping Address -->
                            <label for="address" class="form-label">Delivery Address</label>
                            <div class="mb-3">
                                <input type="text" name="address" class="form-control" id="address" placeholder="Enter your delivery address" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" name="phone" class="form-control" placeholder="Phone Number" id="phone" required>
                            </div>

                            <!-- Order Notes -->
                            <div class="mb-3">
                                <label for="order_notes" class="form-label">Order Notes (Optional)</label>
                                <textarea name="order_notes" class="form-control" id="order_notes" rows="3" placeholder="Any special instructions or notes about your order"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-new px-3 py-2 fw-bold">PLACE ORDER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="col-lg-5">
                <div class="py-4">
                    <h4 class="mb-4 text-new">YOUR ORDERS</h4>
                    <div  class="border p-3">
                        <ul class="list-group">
                            @foreach($cart as $item)
                            <li class="list-group-item mb-3 border-white">
                                <div class="row">
                                    <!-- Product Image -->
                                    <div class="col-lg-3 text-center">
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="Product Image" class="img-fluid rounded">
                                    </div>
                                    
                                    <!-- Product Details -->
                                    <div class="col-lg-6">
                                        <h5 class="fs-5 text-new">{{ $item['name'] }}</h5>
                                        <small class="text-muted">Delivery Options  :  {{ $item['delivery_options'] }}</small><br>
                                        <small class="text-muted">Delivery Date :  {{ $item['delivery_date'] }}</small><br>
                                        <small class="text-muted">Name  :  {{ $item['sender_name'] }}</small><br>
                                        <small class="text-muted">Phone  :  {{ $item['sender_phone'] }}</small><br>
                                        <small class="text-muted">From  :  {{ $item['from'] }}</small><br>
                                        <small class="text-muted">To  :  {{ $item['to'] }}</small><br>
                                        <small class="text-muted">Message  :  {{ $item['message'] }}</small><br>
                                        <p class="my-2">Price  :  Rp {{ $item['price'] }}</p>
                                    </div> 
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        <div class="my-3 text-end text-muted">
                            <h4>TOTAL  :  <strong>Rp {{ number_format(floatval(str_replace(',', '', $total)), 0, ',', '.') }}</strong></h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
