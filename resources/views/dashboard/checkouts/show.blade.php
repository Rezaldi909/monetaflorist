@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-5">
        <h1 class="mb-4">Orders Details</h1>

        <!-- Customer Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h3>Customer Information</h3>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $checkout->email }}</p>
                <p><strong>Name:</strong> {{ $checkout->first_name }} {{ $checkout->last_name }}</p>
                <p><strong>Address:</strong> {{ $checkout->address }}</p>
                <p><strong>City:</strong> {{ $checkout->city }}</p>
                <p><strong>Phone:</strong> {{ $checkout->phone }}</p>
                <p><strong>Order Notes:</strong> {{ $checkout->order_notes ?? 'None' }}</p>
            </div>
        </div>

        <!-- Items Ordered -->
        <div class="card">
            <div class="card-header">
                <h3>Items Ordered</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($checkoutItems as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <p><strong>Price:</strong> Rp {{ number_format($item->price, 2) }}</p>
                                    <p><strong>Delivery Options:</strong> {{ $item->delivery_options }}</p>
                                    <p><strong>Delivery Time:</strong> {{ $item->delivery_time }}</p>
                                    <p><strong>Sender Name:</strong> {{ $item->sender_name }}</p>
                                    <p><strong>Sender Phone:</strong> {{ $item->sender_phone }}</p>
                                    <p><strong>From:</strong> {{ $item->from }}</p>
                                    <p><strong>To:</strong> {{ $item->to }}</p>
                                    <p><strong>Message:</strong> {{ $item->message ?? 'None' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Back to Checkout List Button -->
        <div class="mt-4">
            <a href="/dashboard/checkouts" class="btn btn-primary">Back to Checkout List</a>
        </div>
    </div>
@endsection
