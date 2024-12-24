<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moneta Florist | {{ $title }}</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    
    @include('partials.navbar')
    <h1 class="my-5 text-center">{{ $title }}</h1>
    <div class="d-flex">
        @include('products.layouts.sidebar') <!-- Include sidebar here -->
        <div class="container-fluid"> <!-- Use container-fluid to take full width -->
            <div class="row">
                <div class="col-md-12"> <!-- Main content -->
                    @yield('container') <!-- Main content goes here -->
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
