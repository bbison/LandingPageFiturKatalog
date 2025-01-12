@extends('layouts.navUser')
@section('body')
    {{-- @dd($penerimas) --}}
    @if (session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container d-flex justify-content-center">
        <div class="bg-white d-flex justify-content-center col-12 m-2">
            <div class="col-10">
                <h4 class="m-2 text-center">Check Out</h4>
                <div class="p-3" style="background-color: rgb(236, 236, 236)">
                    <h4></h4>
                    <h5> Alamat Pengiriman : <span id="alamatfix"></span> <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleM">
                            Ubah
                        </button>
                    </h5>
                    @error('penerima')
                    <span class="text-danger">
                        Pilih Alamat Pengiriman
                    </span>
                    @enderror
                </div>
                <div>
                    {{-- <div id="map" style="width: 100%; height: 400px;"></div> --}}

                </div>

                <div class="row justify-content-center">
                    <div class="col-12 m-2">
                        <div class="row">
                            <!-- Gambar Produk -->
                            <div class="col-12  row d-md-flex bg-light">
                                <div class="col-12 col-md-12 col-lg-3" style="width: 400px">
                                    <div class="foto col-12 row flex-row flex-nowrap " id="filePreviewContainer"
                                        style="overflow-x: scroll">
                                        @foreach ($produk->media as $media)
                                            <div class="p-3" style="width: 370px">
                                                <img class="p-1"
                                                    src="{{ env('APP_URL') . '/file?file=' . encrypt($media->file) }}"
                                                    width="400px" height="400px" style="overflow: hidden"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div id="tombol" class="d-flex m-2  justify-content-center">
                                        <div class="d-flex">
                                            <button id="scrollLeft" type="button" class="btn btn-light"
                                                onclick="scrollLeftBtn()">&#10094;</button>
                                            <button type="button" id="scrollRight" class="btn btn-light"
                                                onclick="scrollRightBtn()">&#10095;</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Deskripsi Produk -->
                                <div class="col-12 col-md-12  col-lg-6  mt-4">
                                    <div>
                                        <h2>{{ $produk->nama }}</h2>
                                        <p class="text-muted">Kategori: {{ $produk->kategory->name }}</p>
                                      
                                        @error('varian')
                                        <p class="text-danger">Pilih Varian</p>
                                        @enderror
                                      

                                        <small>
                                        
                                        </small>
                                        <h4 class="text-danger">
                                            @currency($produk->harga)
                                            <span id="harga_awal" class="d-none">{{ $produk->harga }}</span>

                                        </h4>
                                        <small>
                                            <img width="50px"
                                                src="https://images.tokopedia.net/img/cache/700/VqbcmM/2022/2/22/682b7c8a-6a43-4c9a-a0ef-92d221af7fb9.jpg"
                                                alt=""> Gratis Ongkir
                                        </small>
                                  

                                    </div>
                                    <div class="d-flex">
                                        <div class="col-6">
                                            <div class=" h6 bg-success text-white p-2 round rounded-3 ">
                                                <span> Total Harga</span> <br>
                                                <span id="hargatotal"> @currency($produk->harga)</span>
                                                <input type="hidden" name="jumlahBeli" id="jumlahBeli" value="1">

                                            </div>

                                        </div>

                                        <div class="col-3 d-flex justify-content-center">
                                            <button class="text-success btn btn-light" onclick="minus()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                                </svg>
                                            </button>

                                            <span class="ms-2 me-2 fs-5" id="total">1</span>
                                            <button class="text-success btn btn-light" onclick="add()">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                    <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                                    <path
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                                </svg>
                                            </button>

                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <form action="/checkout?@if(Request::get('keranjang'))keranjang={{Request::get('keranjang')}}@endif" class="mb-3 btn" method="post">
                                            <input type="text" name="catatan" placeholder="Pesan">
                                            @csrf
                                            <input type="hidden" name="produk" value="{{ encrypt($produk->id) }}">
                                            <input type="hidden" name="jumlahBeli" id="input_jumlah_beli"
                                                value="1">
                                            <input type="hidden" id="input_alamat_id" name="penerima" value="">
                                            <input type="hidden" id="input_varian" name="varian" value="Original">
                                            <button class="btn btn-danger">Pesan Sekarang</button>
                                        </form>
                                    </div>


                                </div>
                            </div>

                            <hr>



                        </div>





                    </div>
                </div>


            </div>


        </div>
    </div>

    <script>
        function pilih(param) {

            let penerima = document.getElementById('asal_penerima' + param).innerText

            let contact = document.getElementById('asal_contact' + param).innerText
            let alamat = document.getElementById('asal_alamat' + param).innerText
            let close = document.getElementById('btn-close')

            close.click()


            let penerima_masuk = document.getElementById('penerima').innerText = penerima
            let contact_masuk = document.getElementById('contact').innerText = contact
            let alamat_masuk = document.getElementById('alamat').innerText = alamat


            document.getElementById('penerimaVal').value = param


        }

        function minus() {
            let total = parseInt(document.getElementById('total').innerText)
            let harga_awal = parseInt(document.getElementById('harga_awal').innerText)
            let hargatotal = document.getElementById('hargatotal')

            if (total - 1 >= 1) {
                let jumlah = document.getElementById('total').innerText = total - 1

                let final = harga_awal * jumlah

                document.getElementById('input_jumlah_beli').value = jumlah

                hargatotal.innerText = formatRupiah(final)
                document.getElementById('jumlahBeli').value = total - 1
            }
        }

        function add() {
            let harga_awal = parseInt(document.getElementById('harga_awal').innerText)
            console.log(harga_awal)
            let hargatotal = document.getElementById('hargatotal')

            let total = parseInt(document.getElementById('total').innerText)
            let jumlah = document.getElementById('total').innerText = total + 1

            let final = harga_awal * jumlah
            hargatotal.innerText = formatRupiah(final)
            document.getElementById('jumlahBeli').value = total + 1

            document.getElementById('input_jumlah_beli').value = jumlah

        }

        function formatRupiah(angka) {
            const format = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            });
            return format.format(angka);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- jQuery AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tambah-penerima').on('submit', function(e) {
                e.preventDefault(); // Mencegah refresh halaman

                // Mengambil semua data dari form
                var formData = $(this).serialize();

                // Mengirim data dengan AJAX
                $.ajax({
                    url: '/penerima', 
                    type: 'POST',
                    data: formData,
                    success: function(response, textStatus, xhr) {
                        // Tindakan setelah data berhasil dikirim
                        if (xhr.status == 200) {
                            document.getElementById('list-penerima').style.display = "block";
                            document.getElementById('btn-tambah-baru').style.display = "block";
                            document.getElementById('tambah-penerima').style.display = "none";

                            $('#list-penerima').load('/load-penerima');

                            document.getElementById("tambah-penerima").reset();
                        }
                    },
                    error: function(xhr, status, error) {
                        // Tindakan jika terjadi kesalahan
                        console.error("Terjadi kesalahan:", error);
                        alert("Gagal mengirim form.");

                    }
                });
            });
        });

        function select(id) {
            console.log(id)
            document.querySelector(`input[type="radio"][id="${id}"]`).checked = true;;

        }
    </script>
@endsection