@extends('layouts.navUser')
@section('body')


    <!-- Product Section -->
    <section id="produk" class="py-5 mt-5">
        <div class="container">
            <h2 class="text-start border-success d-flex border-bottom text-align-center">
                <div class="col-4">
                   
                </div>
              
            </h2>
            <br>
            @foreach ($kategorys as $kategory)
                <a class="  m-2
                        @if (Request::get('kategory') == $kategory->name) border-bottom border-primary @endif text-dark text-decoration-none "
                    href="/product?kategory={{ $kategory->name }}#produk"> {{ $kategory->name }}</a>
            @endforeach


            @if ($produks->count()>0)
            <div class="row mt-2 g-4">
                @foreach ($produks as $produk)
                    <div class="col-6 col-md-4 col-lg-3 ">
                        <div class="card product-card">
                            <img loading="lazzy" src="/file?file={{ encrypt($produk->media[0]->file) }}"
                                class="card-img-top" alt="{{ $produk->nama }}">
                            <div class="card-body">
                                <h5 class="card-title"> <a href="/lihat-produk/{{ encrypt($produk->id) }}"
                                        class="text-decoration-none">{{ $produk->nama }}</a> </h5>
                                <p class="card-text">{{ Str::limit(strip_tags($produk->keterangan, 50)) }}</p>
                                @php

                                    $message = "Hallo Saya Ingin Memesan '" . $produk->nama . "'";

                                @endphp
                                <a target="_Blank" href="https://wa.me/+6287813720480?text={{ rawurlencode($message) }}"
                                    class="btn btn-primary">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                
<div class="d-flex justify-content-center">

    @if (!Request::get('param') && (!Request::get('kategory')))
           {{ $produks->links() }}
    @endif
     
    
</div>

            </div>
            @else
                <div class="d-flex align-items-center justify-content-center" style="height:400px">
                    <h4>Produk Tidak Ditemukan</h4>
                </div>
            @endif
         
        </div>
    </section>

    <script>
        // Pastikan script ini dijalankan setelah halaman selesai dimuat
        document.addEventListener("DOMContentLoaded", function() {
            // Cek apakah ada hash di URL
            if (window.location.hash) {
                // Lakukan scroll dengan efek smooth ke elemen dengan ID sesuai hash
                const target = document.querySelector(window.location.hash);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    </script>
@endsection
