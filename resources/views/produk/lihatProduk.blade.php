@extends('layouts.navUser')
@section('body')
    <script>
        $(document).ready(function() {

            $("button#kerajang").click(function() {
                console.log('keranjang')
            })


        });
    </script>
    <!-- Detail Produk -->
    <div class="col-12 bg- pb-5" style="height:auto;background-color:rgb(234, 245, 255)">
        <br>
        <br>
        <div class="container pt-4">
            <div id="berhasil" class="d-none">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="" id="pesanberhasil">Pesanan Berhasil Dimasukan Keranjang</div>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div id="ada" class="d-none">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="" id="pesanberhasil">Pesanan Sudah Ada Dalam Keranjang</div>

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <div id="gagal" class="d-none">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <div class="text-dark" id="pesangagal">Error Anda Harus Login Terlabih Dahulu Silahkan Coba Lagi Nanti
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>



            {{-- terbaru --}}

            <div class="m-0 m-lg-5" style="">
                <div style="background: linear-gradient(to bottom, rgb(211,205,233), rgba(208,206,240,255), rgba(185,182,230,255)
);"
                    class="d-flex p-3 flex-wrap justify-content-between">
                    <div class="col-12 d-flex align-items-center justify-content-center text-center col-md-6">
                        <h1 style="   text-shadow: 0px 4px 6px rgba(0, 0, 0, 0.7);" class="align-middle">{{ $produk->nama }}
                        </h1>
                    </div>
                    <div class="col-12 col-md-6">
                        <!-- Gambar Produk -->
                        <div class="col-12 d-flex justify-content-center">
                            <div class="foto d-flex flex-wrap">
                                @foreach ($produk->media as $media)
                                    <div class="">
                                        <img class="m-2"
                                            src="{{ env('APP_URL') . '/file?file=' . encrypt($media->file) }}"
                                            width="200px" height="200px" style="overflow: hidden;margin: 3px"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="tombol" class="d-flex m-2  justify-content-center">
                            <div class="d-flex">
                                <button id="scrollLeft" class="btn btn-light" onclick="scrollLeftBtn()">&#10094;</button>
                                <button id="scrollRight" class="btn btn-light" onclick="scrollRightBtn()">&#10095;</button>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- keterangan --}}
                <div class="d-flex flex-wrap p-3" style="background-color: #7d7cac">
                    <!-- Deskripsi Produk -->
                    <div class="col-12 text-center col-md-3 mt-4">
                        <small class="text-white">Kategori</small>
                        <h3 class="text-white">{{ $produk->kategory->name }}</h3>


                    </div>
                    <div class="col-12 text-center col-md-3 mt-4">
                        <small class="text-white">Harga</small>
                        <h3 class="text-white"> @currency($produk->harga)</h3>


                    </div>
                    <div class="col-12 text-start text-white col-md-6 mt-4">
                        <small class="text-white">Keterangan</small>
                        <h3 class="text-white"> @currency($produk->harga)</h3>
                        <div>{!! Str::limit($produk->keterangan, 200, '...') !!}</div>
                        <div class="d-flex flex-wrap justify-content-between">
                            <button type="button" onclick="selengkapnya()"
                                class="btn btn-white bg-white">Selengkapnya..</button>

                            @php
                                $pesan = "🛍️ **Katalog Produk** 🛍️\n\n";
                                $pesan .= 'Nama : ' . $produk->nama . "\n\n";
                                $pesan .= 'Harga : ' . $produk->harga . "\n\n";
                                $pesan .= 'Deskripsi : ' . strip_tags($produk->keterangan) . "\n\n";
                                $pesan .=
                                    '🔗 Klik untuk melihat lebih lanjut: [Tautan Katalog](' . url('') . "/product)\n\n";

                            @endphp
                            <a target="_BLANK" class="btn btn-success"
                                href="https://wa.me/+6287813720480?text={{ rawurlencode($pesan) }}">Pesan Sekarang</a>

                        </div>

                    </div>

                </div>

            </div>
            <div id="selengkapnya" class="text-dark bg-light mt-3 p-2 borde border-dark  border-1  d-none">
                <hr>
                {!! $produk->keterangan !!}
            </div>
        </div>
        <input type="hidden" id="produk" value="{{ $produk->id }}">
    </div>


    <script src="/script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function keranjang(produk) {


            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {

                // produk = document.getElementById("produk").value
                console.log(produk)
                if (this.readyState == 4 && this.status == 200) {
                    if (this.responseText == true) {
                        document.getElementById("berhasil").classList.remove('d-none')
                        // document.getElementById("pesanberhasil").innerHTML = this.responseTex
                    } else if (this.responseText == 'ada') {
                        document.getElementById("ada").classList.remove('d-none')
                    } else {
                        // document.getElementById("pesangagal").innerHTML = this.responseText
                        document.getElementById("gagal").classList.remove('d-none')
                    }
                } else {
                    document.getElementById("gagal").classList.remove('d-none')
                }
            };
            xmlhttp.open("GET", "/masukan-keranjang?produk=" + produk, true);
            xmlhttp.send();

        }

        function selengkapnya() {
            const element = document.getElementById("selengkapnya");
            if (element.classList.contains("d-none")) {
                element.classList.remove("d-none"); // Hapus kelas d-none jika ada
            } else {
                element.classList.add("d-none"); // Tambahkan kelas d-none jika tidak ada
            }
        }
    </script>
@endsection
