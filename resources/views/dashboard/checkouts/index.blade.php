@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Checkout</h1>  
</div>

@if (@session()->has('success'))
<div class="alert alert-primary col-lg-11" role="alert">
  {{ session('success') }}  
</div>  
@endif

<div class="table-responsive col-lg-11">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Email</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Address</th>
          <th scope="col">City</th>
          <th scope="col">Phone</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $orders as $order )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $order->email }}</td>
          <td>{{ $order->first_name }}</td>
          <td>{{ $order->last_name }}</td>
          <td>{{ $order->address }}</td>
          <td>{{ $order->city }}</td>
          <td>{{ $order->phone }}</td>
          <td>{{ $order->order_notes }}</td>
          <td>
            <a href="{{ route('checkouts.show', $order->id) }}" class="badge bg-info">
                <span data-feather="eye"></span>
            </a>            
            <form action="/dashboard/checkouts/{{ $order->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>
@endsection