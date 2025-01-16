@extends('layouts.main')

@section('container')
<div class="container my-5">
    <h3 class="text-center mb-4 text-new">FAQs</h3>
    
    <div class="accordion justify-content-center col-lg-8 mx-auto mt-5 text-muted my-5" id="faqsAccordion">
        <!-- FAQ 1 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Apa itu Moneta Florist?
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqsAccordion">
                <div class="accordion-body">
                    Moneta Florist adalah platform pemesanan bunga secara online di mana Anda dapat menjelajahi, menyesuaikan, dan membeli rangkaian bunga yang indah untuk berbagai acara.
                </div>
            </div>
        </div>

        <!-- FAQ 2 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    Bagaimana cara memesan bunga?
                </button>
            </h2>
            <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqsAccordion">
                <div class="accordion-body">
                    Untuk memesan bunga, kunjungi halaman produk, pilih rangkaian bunga yang diinginkan, lalu lanjutkan ke proses checkout. Anda juga dapat menyesuaikan pesanan melalui halaman "Custom Order".
                </div>
            </div>
        </div>

        <!-- FAQ 3 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    Apakah saya bisa melacak pesanan saya?
                </button>
            </h2>
            <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqsAccordion">
                <div class="accordion-body">
                    Ya, setelah Anda memesan, Anda akan menerima email konfirmasi yang berisi tautan untuk melacak status pengiriman pesanan Anda.
                </div>
            </div>
        </div>

        <!-- FAQ 4 -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="faq4">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    Metode pembayaran apa saja yang diterima?
                </button>
            </h2>
            <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqsAccordion">
                <div class="accordion-body">
                    Kami menerima berbagai metode pembayaran, termasuk kartu kredit, PayPal, dan transfer bank. Untuk detail lebih lanjut, silakan cek bagian "Opsi Pembayaran".
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
