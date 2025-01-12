@extends('layouts.navUser')
@section('body')
    <div class="container card bg-light rounder-5 mt-5">
        <div class=" justify-content-around d-flex m-2">
            <a href="/panel"
                class="flex-fill @if (Request::get('filter') == '') bg-primary  text-white  @else text-dark @endif rounded-4 text-center m-2 p-2 text-decoration-none">Semua</a>
            <a href="/panel?filter=tunggubayar"
                class="flex-fill @if (Request::get('filter') == 'tunggubayar') bg-primary  text-white  @else text-dark @endif rounded-4 text-center m-2 p-2 text-decoration-none">Menunggu
                Pembayaranan</a>
            <a href="/panel?filter=keranjang"
                class="@if (Request::get('filter') == 'keranjang') bg-primary  text-white  @else text-dark @endif flex-fill rounded-4 text-center  m-2 p-2  text-decoration-none">Keranjang</a>
            <a href="/panel?filter=diproses"
                class="@if (Request::get('filter') == 'diproses') bg-primary  text-white  @else text-dark @endif flex-fill rounded-4 text-center   m-2 p-2  text-decoration-none">Diproses</a>
            <a href="/panel?filter=batal"
                class="@if (Request::get('filter') == 'batal') bg-primary  text-white  @else text-dark @endif flex-fill rounded-4 text-center  m-2 p-2  text-decoration-none">Batal</a>
            <a href="/panel?filter=selesai"
                class="@if (Request::get('filter') == 'selesai') bg-primary  text-white  @else text-dark @endif flex-fill rounded-4 text-center  m-2 p-2  text-decoration-none">Selesai</a>
        </div>
        @foreach ($pesanans as $pesanan)
            <div class="order-card">
                <div class="order-header d-flex justify-content-between">
                    <span><strong>ID Pesanan:</strong> #{{ $pesanan->id + 999 }}
                        <span>No Resi :

                            @if ($pesanan->resi)
                                <a href="/pesanan/lihat?resi={{$pesanan->resi}}">{{ $pesanan->resi }}</a>
                            @else
                                Sedang Diproses
                            
                            @endif
                        </span>
                    </span>
                   
                    

                    <span
                        class="badge  
                    @if ($pesanan->status == 'keranjang') bg-info
                    @elseif($pesanan->status == 'diproses' or $pesanan->status == 'Berhasil')
                    bg-warning
                     @elseif($pesanan->status == 'batal')
                     bg-danger
                      @elseif($pesanan->status == 'selesai')
                        bg-success
                         @elseif($pesanan->status == 'tunggubayar')
                         bg-primary @endif ">{{ $pesanan->status }}</span>
                </div>
                <div class="order-body d-flex mt-3">
                    <img src="{{ url('') . '/file?file=' . encrypt($pesanan->produk->media[0]->file) }}" class="product-img"
                        alt="Produk 1">
                    <div class="product-info">
                        <h5>{{ $pesanan->produk->nama }}</h5>
                        <p><strong>Jumlah:</strong> {{ $pesanan->jumlah }} x @currency($pesanan->produk->harga)</p>
                        <p><strong>Harga:</strong> @currency($pesanan->produk->harga * $pesanan->jumlah)</p>
                    </div>
                    <div class="order-footer">

                        @if ($pesanan->status == 'tunggubayar')
                            <a class="btn btn-action btn-success bg-success" href="/pembayaran?keranjang={{ encrypt($pesanan->id) }}">Bayar</a>
                        @elseif($pesanan->status == 'keranjang')
                            <a class="btn btn-action" href="/checkout?keranjang={{ encrypt($pesanan->id) }}">Checkout</a>
                            @elseif($pesanan->status == 'Berhasil')
                            <a class="btn btn-action" href="/lihat-pesanan?keranjang={{ encrypt($pesanan->id) }}">Lihat</a>
                        @endif


                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
