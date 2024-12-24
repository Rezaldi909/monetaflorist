@extends('layouts.main')

@section('container')
    <h2 class="my-4 text-center text-new">LATEST</h2>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card border-0" style="width: 100%;">
                        <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top border" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-new">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 d-flex justify-content-center p-5">
            <a href="/products" class="btn btn-new  px-3 py-2">View All Product</a>
        </div>
    </div>

    <h2 class="my-4 text-center text-new">FRESH FLOWERS</h2>
    <div class="container">
        <div class="row">
            @foreach ($flower  as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card border-0" style="width: 100%;">
                        <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top border" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-new">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 d-flex justify-content-center p-5">
            <a href="/products" class="btn btn-new text-white px-3 py-2">View All Product</a>
        </div>
    </div>


    <h2 class="my-4 text-center text-new">NEW</h2>
    <div class="container">
        <div class="row">
            @foreach ($new  as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card border-0" style="width: 100%;">
                        <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top border" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-new">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 d-flex justify-content-center p-5">
            <a href="/products" class="btn btn-new text-white px-3 py-2">View All Product</a>
        </div>
    </div>


    <h2 class="my-4 text-center text-new">EVENT</h2>
    <div class="container">
        <div class="row">
            @foreach ($event  as $product)
                <div class="col-md-3 mb-4"> 
                    <div class="card border-0" style="width: 100%;">
                        <img style="height: 250px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top border" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-new">{{ $product->nama }}</h5>
                            <p class="card-text">{{ $product->harga }}</p>
                            <a href="/products/{{ $product->slug }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mb-5 d-flex justify-content-center p-5">
            <a href="/products" class="btn btn-new text-white px-3 py-2">View All Product</a>
        </div>
    </div>

    <div class="container">
        <div class="col-lg-6">
            <h3>MONETA FLORISTS</h1>
            <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est nesciunt, obcaecati beatae nemo cumque dolor molestias ea nisi quam deserunt debitis iusto possimus sit error, in veniam? Hic amet illum sint ut pariatur, alias delectus atque voluptatum, quo, porro veniam nulla placeat quas! Iste dicta nulla repudiandae modi eos assumenda aspernatur fugit labore est delectus ab laborum corporis quaerat dolorum natus perferendis eaque, libero officia sequi ducimus eligendi ut alias vero. Provident obcaecati sunt eius corporis? Omnis, similique itaque quaerat blanditiis est mollitia, dolorum obcaecati voluptate id ipsum non, maxime facere temporibus vel molestiae enim accusantium in. Atque, dignissimos. Vero?</P>
        </div>
        <div class="col-lg-6">
            <img src="D:\laragon\www\monetaflorist\storage\app\public\product-images\3RG1wokMceLtjCOdmA6BP1Cj4iVnOxQisEaoxGnN.png" alt="">
        </div>
    </div>

    <div class="container my-5">
        <div class="row ">
            <div class="col col-lg-8">
                <h2>Lokasi Peta</h2>
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>
            <div class="col col-lg-4">
                <div class="mt-5 mx-5 fs-5">
                    <p>WHERE TO FIND US</p>
                    <div class="my-5 py-5">
                        <a href="/products" class="btn btn-new text-white px-3 py-2">View All Product</a>
                    </div>
                </div>
            </div>
        </div>
      </div>
    
    
    
@endsection
