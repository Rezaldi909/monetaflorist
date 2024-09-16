@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Product Event</h1>

    @foreach ($events as $event)
        <ul>
            <li>
                <h2><a href="/event/{{ $event->slug }}">{{ $event->nama }}</a></h2>
            </li>
        </ul>        
            
    @endforeach

@endsection
