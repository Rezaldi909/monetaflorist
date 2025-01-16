@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-5">
        <h1 class="mb-4">Order Details</h1>

        <!-- Customer Information -->
        <div class="card mb-4 col-lg-5">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Customer Information</h3>
                <!-- Edit and Delete Icons for Checkout -->
                <div>
                    <a href="{{ route('checkouts.edit', $checkout->id) }}" class="badge bg-warning" title="Edit Order">
                        <span data-feather="edit"></span>
                    </a>
                    <form action="{{ route('checkouts.destroy', $checkout->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this order?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge bg-danger border-0" title="Delete Order">
                            <span data-feather="trash-2"></span>
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $checkout->email }}</p>
                <p><strong>Name:</strong> {{ $checkout->first_name }} {{ $checkout->last_name }}</p>
                <p><strong>Address:</strong> {{ $checkout->address }}</p>
                <p><strong>Phone:</strong> {{ $checkout->phone }}</p>
                <p><strong>Order Notes:</strong> {{ $checkout->order_notes ?? 'None' }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge fs-6 
                        {{ 
                            $checkout->status == 'Pending' ? 'bg-secondary' : 
                            ($checkout->status == 'Processed' ? 'bg-warning' : 
                            ($checkout->status == 'Completed' ? 'bg-success' : 'bg-secondary')) 
                        }}">
                        {{ $checkout->status ?? 'None' }}
                    </span>
                </p>
            </div>
        </div>

        <!-- Items Ordered -->
        <div class="card">
            <div class="card-header">
                <h3>Items Ordered</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    @php
                        $totalPrice = 0; // Initialize total price
                    @endphp
                    @foreach($checkoutItems as $item)
                        @php
                            $totalPrice += $item->price; // Add item price to total
                        @endphp
                        <div class="col-lg-6 col-md-12 mb-4">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $item->name }}</h5>
                                    <p><strong>Price:</strong> Rp {{ number_format($item->price, 2) }}</p>
                                    <p><strong>Delivery Options:</strong> {{ $item->delivery_options }}</p>
                                    <p><strong>Delivery Time:</strong> {{ $item->delivery_time }}</p>
                                    <p><strong>Sender Name:</strong> {{ $item->sender_name }}</p>
                                    <p><strong>Sender Phone:</strong> {{ $item->sender_phone }}</p>
                                    <p><strong>From:</strong> {{ $item->from }}</p>
                                    <p><strong>To:</strong> {{ $item->to }}</p>
                                    <p><strong>Message:</strong> {{ $item->message ?? 'None' }}</p>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a href="{{ route('checkout-items.edit', $item->id) }}" class="badge bg-warning me-2" title="Edit Item">
                                        <span data-feather="edit"></span>
                                    </a>
                                    <form action="{{ route('checkout-items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="badge bg-danger border-0" title="Delete Item">
                                            <span data-feather="trash-2"></span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer text-end text-muted">
                <h5><strong>Total Price:</strong> Rp {{ number_format($totalPrice, 2) }}</h5>
            </div>
        </div>

        <!-- Back to Checkout List Button -->
        <div class="mt-4">
            <a href="/dashboard/checkouts" class="btn btn-primary">Back to Order List</a>
        </div>
    </div>
@endsection
