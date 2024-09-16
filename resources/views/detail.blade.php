@extends('layouts.main')

@section('container')
    
<div class="container text-center">
    <div class="row m-5">
      <div class="col-7">
        <article>
            <img style="height: 550px" src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="...">
        </article>
      </div>

      <div class="col-5 text-start">
        <div class="container mx-5 p-0">
            <label class="mb-3 fw-bold fs-3" for="form-label">{{ $product->nama }}</label>
            <p class="mb-3">Rp. {{ $product->harga }}</p>
        </div>

        <div class="container mx-5 mt-4 border p-3">
            <form>
                <div class="mb-3">
                    <label for="form-label"><b>Delivery Options</b></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3 col-6">
                    <label for="form-label">Pickup or Delivery Time</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>9am - 2pm</option>
                        <option value="1">3pm - 5pm</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label ">Sender Name</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Sender Phone</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                
              </form>
        </div>
      </div>
    </div>
  </div>


@endsection