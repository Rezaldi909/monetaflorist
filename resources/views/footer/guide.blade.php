@extends('layouts.main')

@section('container')
<div class="text-center py-5">
    <h1 class="mb-4 fw-bold text-new">Guide</h1>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-search"></i> Cara mencari produk
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-cart"></i> Langkah-langkah untuk memesan bunga
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-basket"></i> Cara menggunakan fitur keranjang
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-telephone"></i> Kontak untuk bantuan lebih lanjut
                        </li>
                    </ul>
                    <p class="text-center mt-4 text-muted">
                        Jika Anda memiliki pertanyaan lebih lanjut, silakan hubungi kami melalui halaman 
                        <a href="/contact" class="text-decoration-none text-new ">Contact</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
