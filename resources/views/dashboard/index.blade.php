@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

@if (@session()->has('success'))
<div class="alert alert-primary col-lg-12" role="alert">
  {{ session('success') }}  
</div>  
@endif

<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Products</div>
            <div class="card-body">
                <h5 class="card-title">{{ $productCount }}</h5>
                <p class="card-text">Jumlah produk yang tersedia.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Total Contacts</div>
            <div class="card-body">
                <h5 class="card-title">{{ $contactCount }}</h5>
                <p class="card-text">Jumlah kontak yang terkirim.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-white bg-info mb-3">
            <div class="card-header">Total Order</div>
            <div class="card-body">
                <h5 class="card-title">{{ $orderCount }}</h5>
                <p class="card-text">Jumlah kategori yang tersedia.</p>
            </div>
        </div>
    </div>
</div>

@endsection
