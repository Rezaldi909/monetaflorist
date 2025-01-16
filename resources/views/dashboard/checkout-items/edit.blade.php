@extends('dashboard.layouts.main')

@section('container')
    <div class="container mt-5">
        <h1>Edit Item</h1>

        <form action="{{ route('checkout-items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $item->price }}" required>
            </div>

            <div class="mb-3">
                <label for="delivery_options" class="form-label">Delivery Options</label>
                <input type="text" class="form-control" id="delivery_options" name="delivery_options" value="{{ $item->delivery_options }}" required>
            </div>

            <div class="mb-3">
                <label for="delivery_time" class="form-label">Delivery Time</label>
                <input type="text" class="form-control" id="delivery_time" name="delivery_time" value="{{ $item->delivery_time }}" required>
            </div>

            <div class="mb-3">
                <label for="sender_name" class="form-label">Sender Name</label>
                <input type="text" class="form-control" id="sender_name" name="sender_name" value="{{ $item->sender_name }}" required>
            </div>

            <div class="mb-3">
                <label for="sender_phone" class="form-label">Sender Phone</label>
                <input type="text" class="form-control" id="sender_phone" name="sender_phone" value="{{ $item->sender_phone }}" required>
            </div>

            <div class="mb-3">
                <label for="from" class="form-label">From</label>
                <input type="text" class="form-control" id="from" name="from" value="{{ $item->from }}" required>
            </div>

            <div class="mb-3">
                <label for="to" class="form-label">To</label>
                <input type="text" class="form-control" id="to" name="to" value="{{ $item->to }}" required>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="3">{{ $item->message }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('checkouts.show', $item->checkout_id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
