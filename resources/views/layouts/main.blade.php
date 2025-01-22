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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    
    <!-- CSS untuk intl-tel-input -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">

    <!-- JavaScript untuk intl-tel-input -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>

    
</head>
<body>
    @include('partials.navbar')

    <div class="container mt-4" style="min-height: calc(100vh - 100px);">
        @yield('container')
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    @stack('scripts')

    @include('partials.footer')

    {{-- script js --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/script.js"></script>
    {{-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([0.919894208915123, 104.44516705566495], 16); // Koordinat alamat Anda

        // Tambahkan tile layer (OpenStreetMap)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Tambahkan marker dengan popup
        L.marker([0.919894208915123, 104.44516705566495]).addTo(map)
            .bindPopup('<b>Jl. Tugu Pahlawan No.39</b><br>Bukit Cermin, Tanjungpinang, Kepulauan Riau.')
            .openPopup();
    </script> --}}
    
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
