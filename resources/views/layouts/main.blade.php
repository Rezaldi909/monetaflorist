<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moneta Florist | {{ $title }}</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    {{-- <link rel="stylesheet" href="/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/css/style.css" >
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    
</head>
<body class="fw-bold">
    @include('partials.navbar')

    <div class="container mt-4" style="min-height: calc(100vh - 100px);">
        @yield('container')
    </div>

    @include('partials.footer')

    {{-- script js --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/script.js"></script>
    
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ $googleApiKey }}&callback=initMap" async defer></script>
    <script>
        function initMap() {
            var lokasi = {lat: 0.920033238254941, lng: 104.44545370370885}; // Lokasi Jakarta, ganti sesuai kebutuhan
             
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 10,
                center: lokasi
            });
            var marker = new google.maps.Marker({
                position: lokasi,
                map: map,
                title: 'Moneta Florist'
            });
            // Menampilkan informasi tambahan/deskripsi di marker
            var infowindow = new google.maps.InfoWindow({
                content: '<p>Jl. Tugu Pahlawan No.39, Bukit Cermin, Kec. Tanjungpinang Bar., Kota Tanjung Pinang, Kepulauan Riau 29111</p>' // Deskripsi lokasi
            });

            // Membuka infowindow saat marker di-klik
            marker.addListener('click', function() {
                infowindow.open(map, marker);
        });
        }
    </script>
 --}}
</body>
</html>
