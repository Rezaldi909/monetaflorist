@extends('layouts.main')

@section('container')    
@if(session('success'))
    <div class="alert alert-success col-lg-6 mt-4 justify-content-center">
        {{ session('success') }}
    </div>
    @else
    
@endif
<p class="text-center fs-4 mb-5 mt-5">{{ $title }}</p>

<div class="container col-8 mb-5">
  <form action="{{ route('custom-order.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="mb-3">
                <input type="text" class="form-control" name="name" placeholder="Your Name" required>
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
            </div>
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="phone" placeholder="Your Phone" required>
        </div>
        <div class="mb-3">
            <textarea class="form-control" name="message" rows="3" placeholder="Your Message" required></textarea>
        </div>
        <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Send Message</button>
        </div>
    </div>  
  </form>
</div>

@endsection