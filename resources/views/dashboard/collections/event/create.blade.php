@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New EventType</h1>  
</div>

<div class="col-lg-8">
  <form action="/dashboard/collections/event" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" autofocus value="{{ old('nama') }}" required>
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>

<script>
      const nama = document.querySelector('#nama');
      const slug = document.querySelector('#slug');
      const form = document.querySelector('form');

      // Add event listener to generate slug when nama changes
      nama.addEventListener('change', function() {
          fetch('/dashboard/products/checkSlug?nama=' + nama.value)
              .then(response => response.json())
              .then(data => {
                  slug.value = data.slug; // Set the generated slug
              });
      });

      // Add submit event listener to ensure slug is populated before submission
      form.addEventListener('submit', function(event) {
          if (!slug.value) {
              event.preventDefault(); // Prevent form submission
              alert('Please wait for the slug to be generated');
          }
      });


</script>

@endsection