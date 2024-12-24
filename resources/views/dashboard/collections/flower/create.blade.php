@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New ProductType</h1>  
</div>

<div class="col-lg-8">
    <form action="/dashboard/collections/flower" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">nama</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"  autofocus value="{{ old('nama') }}" required>
          @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="slug" class="form-label" hidden>slug</label>
          <input type="text" class="form-control" id="slug" name="slug" readonly hidden>
        
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