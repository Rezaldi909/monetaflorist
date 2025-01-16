@extends('layouts.main')

@section('container')
    <h1 class="text-center my-5 text-new">{{$title}}</h1>
    <div class="row">
        <!-- Bagian Keranjang Belanja -->
        <div class="col-lg-8 my-4">
            <div class="row border-bottom mb-4 text-new">
                <div class="col-6">
                    <strong>PRODUCT</strong>
                </div>
                <div class="col-6 text-end">
                    <strong>TOTAL</strong>
                </div>
            </div>      

            @if(!empty($cart))
            <ul class="list-group">
                @foreach($cart as $item)
                <div class="container border-bottom py-3">
                    <div class="row mb-3">
                      <div class="col-4 col-lg-2 d-flex justify-content-center">
                        <img src="{{ $item['image'] }}" alt="Product Image" class="img-fluid rounded" style="max-height: 80px;">
                      </div>
                      <div class="col-8 col-lg-7">
                          <div class="container">
                              <h4 class="fw-bold text-new">{{ $item['name'] }}</h4>
                            <div class="text-muted">
                                <small>
                                    <p class="mb-1">Delivery Option  :  {{ $item['delivery_options'] }}</p>
                                    <p class="mb-1">Delivery Time  :  {{ $item['delivery_time'] }}</p>
                                    <p class="mb-1">Delivery Date  :  {{ \Carbon\Carbon::parse($item['delivery_date'])->format('d/m/Y') }}</p>
                                    <p class="mb-1">Sender Name  :  {{ $item['sender_name'] }}</p>
                                    <p class="mb-1">Sender Phone  :  {{ $item['sender_phone'] }}</p>
                                    <p class="mb-1">From  :  {{ $item['from'] }}</p>
                                    <p class="mb-1">To  :  {{ $item['to'] }}</p>
                                    <p class="mb-1">Message  :  {{ $item['message'] }}</p>
                                </small>
                            </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-3 text-end align-self-center">
                        <p class="fw-bold text-muted">Rp {{$item['price'] }}</p>
                      </div>
                    </div>
                </div>
                @endforeach
            </ul>
            
            <div class="col align-self-center text-end mt-4 text-muted">
                <h4>Total: Rp {{ number_format(floatval(str_replace(',', '', $total)), 0, ',', '.') }}</h4>
                <form action="{{ route('checkout') }}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-new mt-3 py-2 px-4 fw-bold">ORDER</button>
                </form>
            </div>

        </div>

        <!-- Bagian Catatan Penting -->
        <div class="col-lg-4">
            <div class="sticky-top">
                <div class="mb-3 text-new">
                    <h5 class="fw-bold mb-3">IMPORTANT NOTES</h5>
                    <div class="text-muted">
                        <ul>
                            <li>No refund or cancellation once payment has been made</li>
                            <li>No changes within 48 hours of the delivery date and time</li>
                            <li>We accept change only by phone</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        </div>
        
        @else
            <p class="text-center">Your cart is empty.</p>
        @endif
@endsection
