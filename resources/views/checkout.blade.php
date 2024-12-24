@extends('layouts.main')

@section('container')
    <h1 class="text-center my-5">Checkout</h1>
    
    <div class="row">

        <div class="col-lg-7">
            <h3>Shipping Details</h3>
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
                        <input type="text" name="city" class="form-control" placeholder="City" id="city" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="postal_code" class="form-control" placeholder="Postal Code" id="postal_code" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" name="phone" class="form-control" placeholder="Phone Number" id="phone" required>
                    </div>

                    {{-- <!-- Payment Method -->
                    <h3>Payment Method</h3>
                    <div class="mb-3">
                        <select class="form-select" name="payment_method" id="payment_method" required>
                            <option value="credit_card">Credit Card</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="paypal">PayPal</option>
                            <option value="cash_on_delivery">Cash on Delivery</option>
                        </select>
                    </div> --}}

                    <!-- Order Notes -->
                    <div class="mb-3">
                        <label for="order_notes" class="form-label">Order Notes (Optional)</label>
                        <textarea name="order_notes" class="form-control" id="order_notes" rows="3" placeholder="Any special instructions or notes about your order"></textarea>
                    </div>

                    <!-- Billing Address -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="sameAsShipping" name="same_as_shipping" checked>
                        <label class="form-check-label" for="sameAsShipping">
                            Billing address is the same as shipping address
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Place Order</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">
            <h3>Your Order</h3>
            <ul class="list-group">
                @foreach($cart as $item)
                <li class="list-group-item">
                    <div class="row">
                        <!-- Product Image -->
                        <div class="col-lg-2">
                            <img src="{{ asset('storage/' . $item['photo']) }}" alt="Product Image" style="width: 50px; height: 50px;">
                        </div>
                        
                        <!-- Product Details -->
                        <div class="col-lg-5">
                            <span>{{ $item['name'] }}</span>
                            <div class="m-0 p-0">
                                <p>Delivery Options: {{ $item['delivery_options'] }}</p>
                                <p>Delivery Date: {{ $item['delivery_time'] }}</p>
                                <p>Sender Name: {{ $item['sender_name'] }}</p>
                                <p>Sender Phone: {{ $item['sender_phone'] }}</p>
                                <p>From: {{ $item['from'] }}</p>
                                <p>To: {{ $item['to'] }}</p>
                                <p>Message: {{ $item['message'] }}</p>
                                <p>Price: Rp {{ number_format($item['price'], 2) }}</p>
                            </div>
                        </div>
                        
                        <!-- Total Price -->
                        <div class="col-lg-5">
                            <p>Total: Rp {{ number_format($total, 2) }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>

            <div class="mt-3 text-end">
                <h4>Total: Rp {{ number_format($total, 2) }}</h4>
            </div>
        </div>

    </div>
@endsection
