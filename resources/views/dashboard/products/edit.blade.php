@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>  
</div>

<div class="col-lg-8">
    <form action="/dashboard/products/{{ $product->slug }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"  autofocus value="{{ old('nama', $product->nama ) }}" required>
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label" hidden>slug</label>
          <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" readonly hidden   >
        </div>
        <div class="mb-3 col-lg-6">
          <label for="harga" class="form-label">harga</label>
          <input type="number" class="form-control  @error('harga') is-invalid @enderror" id="harga" name="harga" value="{{ old('harga', $product->harga) }}" required>
          @error('harga')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="hidden" name="oldImage" value="{{ $product->image }}">
          @if ($product->image)
            <img src="{{ asset('storage/' . $product->image )}}" class="img-preview img-fluid mb-3 col-sm-4 d-block">
          @else
            <img class="img-preview img-fluid mb-3 col-sm-4">
          @endif
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-lg-4">
          <label for="event" class="form-label">FlowerType</label>
          <select class="form-select" name="flower_type_id">
            @foreach ( $flowers as $type )
              @if(old('flower_type_id', $product->flower_type_id) == $type->id)
                <option value="{{ $type->id }}" selected>{{ $type->nama }}</option>
              @else
                <option value="{{ $type->id }}">{{ $type->nama }}</option>
              @endif  
            @endforeach
          </select>
        </div>
        <div class="mb-3 col-lg-4">
          <label for="event" class="form-label">ProductType</label>
          <select class="form-select" name="product_type_id">
            @foreach ( $productsTypes as $type )
              @if(old('product_type_id', $product->product_type_id) == $type->id)
                <option value="{{ $type->id }}" selected>{{ $type->nama }}</option>
              @else
                <option value="{{ $type->id }}">{{ $type->nama }}</option>
              @endif  
            @endforeach
          </select>
        </div>
        <div class="mb-3 col-lg-4">
          <label for="event" class="form-label">EventType</label>
          <select class="form-select" name="event_type_id">
            @foreach ( $events as $type )
              @if(old('event_type_id', $product->event_type_id) == $type->id)
                <option value="{{ $type->id }}" selected>{{ $type->nama }}</option>
              @else
                <option value="{{ $type->id }}">{{ $type->nama }}</option>
              @endif 
            @endforeach
          </select>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

<script>
    const nama = document.querySelector('#nama');
    const slug = document.querySelector('#slug');

    nama.addEventListener('change', function() {
        fetch('/dashboard/products/checkSlug?nama=' + nama.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)

    });
    
    function previewImage() {
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview')

      imgPreview.style.display = 'block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }

</script>

@endsection