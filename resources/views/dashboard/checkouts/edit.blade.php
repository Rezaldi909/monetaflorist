@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <h1>Edit Order</h1>

    <!-- Tampilkan pesan kesalahan -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk mengedit checkout -->
    <form action="{{ route('checkouts.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama depan -->
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $order->first_name) }}" required>
        </div>

        <!-- Nama belakang -->
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $order->last_name) }}" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $order->email) }}" required>
        </div>

        <!-- Alamat -->
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $order->address) }}" required>
        </div>

        <!-- Nomor Telepon -->
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $order->phone) }}" required>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status">
                <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Processed" {{ $order->status == 'Processed' ? 'selected' : '' }}>Processed</option>
                <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                <option value="Refund" {{ $order->status == 'Refund' ? 'selected' : '' }}>Refund</option>
            </select>
            @error('status')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Update Order</button>
        <a href="{{ route('checkouts.index') }}" class="btn btn-danger">Cancel</a>
    </form>
</div>
@endsection
