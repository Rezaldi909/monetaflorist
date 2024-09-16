@extends('layouts.main')

@section('container')    

<p class="text-center fs-4 mb-5 mt-5">{{ $title }}</p>

<div class="container col-8 mb-5">
    <form>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your Name" >
                  </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email" >
                  </div>
            </div>
        </div>  
        <div class="mb-3">
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Your Phone">
        </div>
        <div class="mb-3">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message"></textarea>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="button">Send Message</button>
          </div>
    </form>
</div>

@endsection