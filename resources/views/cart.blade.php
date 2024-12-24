@extends('layouts.main')

@section('container')
    <h1 class="text-center my-5">{{$title}}</h1>
    <div class="row">
        <div class="col-lg-8 my-4">
            <div class="row border-bottom mb-5">
                <div class="col mb-2">
                    PRODUCT
                </div>
                <div class="col text-end">
                    TOTAL
                </div>
            </div>      

            @if(!empty($cart))
            <ul class="list-group">
                @foreach($cart as $item)
                <div class="container border-bottom">
                    <div class="row mb-3">
                      <div class="col">
                        <img src="{{ $item['photo'] }}" alt="Product Image" style="width: 50px; height: 50px;">
                      </div>
                      <div class="col">
                        <div class="container">
                            <span>{{ $item['name'] }}</span>
                            <p>Price: {{ $item['price'] }}</p>
                            <p>Delivery Option: {{ $item['delivery_options'] }}</p>
                            <p>Delivery Time: {{ $item['delivery_time'] }}</p>
                            <p>Sender Name: {{ $item['sender_name'] }}</p>
                            <p>Message: {{ $item['message'] }}</p>
                        </div>
                      </div>
                      <div class="col align-self-center text-end">
                        <p>{{ number_format($total, 2) }}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
            </ul>
            
            <div class="col align-self-center text-end mt-3">
                <h4>Total: Rp {{ number_format($total, 2) }}</h4>
                <form action="{{ route('checkout') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-primary mt-3">Checkout</button>
                </form>
                
            </div>

        </div>

        <div class="col-lg-4">
            <div>
                <p>Important Notes</p>
            </div>
            <div>
                <p>Important Notes</p>
            </div>
            <div>
                <p>Important Notes</p>
            </div>
            <div>
                <p>Important Notes</p>
            </div>
        </div>

        </div>
        
        @else
            <p>Your cart is empty.</p>
        @endif
@endsection
