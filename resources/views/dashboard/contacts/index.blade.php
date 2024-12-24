@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>  
</div>

@if (@session()->has('success'))
<div class="alert alert-primary col-lg-12" role="alert">
  {{ session('success') }}  
</div>  
@endif

<div class="table-responsive col-lg-11">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">Message</th>
        </tr>
      </thead>
      <tbody>
        @foreach ( $contacts as $contact )
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $contact->name }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->phone }}</td>
          <td>{{ $contact->message }}</td>
          <td>
            <form action="/dashboard/contacts/{{ $contact->id }}" method="post" class="d-inline">
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