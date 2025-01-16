@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Custom Order</h1>  
</div>

<div class="col-lg-8">

    <form action="/dashboard/custom-order/{{ $customOrder->id }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $customOrder->name) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $customOrder->email) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $customOrder->phone) }}" required>
        </div>
    
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required>{{ old('message', $customOrder->message) }}</textarea>
        </div>
    
        <button type="submit" class="btn btn-primary">Update Contact</button>
    </form>
</div>

@endsection
