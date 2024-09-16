@extends('dashboard.layouts.main')

@section('container')

    <article>
        {{-- <p>{{ $product->foto }}</p> --}}
        {{-- <p>Event: <a href="/event/{{ $product->event->slug }}">{{ $product->event->nama }}</a></p> --}}
    
        <h2>{{ $product->nama }}</h2>
        <h5>{{ $product->harga }}</h5>
    </article>

    <a href="/">Back</a>

@endsection