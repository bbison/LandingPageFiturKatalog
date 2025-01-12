@extends('layouts.sidebar')
@section('content')
    <div class="container">
        <div class="bg-light m2" id="filePreviewContainer">

            <div id="filePreview"></div>

        </div>
        <div id="tombol" class="d-flex m-2 d-none justify-content-center">
            <div class="d-flex">
                <button id="scrollLeft" class="btn btn-light" onclick="scrollLeftBtn()">&#10094;</button>
                <button id="scrollRight" class="btn btn-light" onclick="scrollRightBtn()">&#10095;</button>
            </div>
        </div>

        <!-- Form controls -->
        <form action="/produk" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="col-12 card">
                <div class="col-md-8">
                    <div class="card mb-4">

                        <div class="card-body">
                            <div class="mb-3">


                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" value="{{ old('nama') }}" id="exampleFormControlInput1" name="nama" required
                                    placeholder="Nama Produk..." />
                                    @error('nama')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Foto/video Produk</label>
                                <input class="form-control" required type="file" id="fileInput" name="media[]" multiple accept="image/*,video/*"
                                    onchange="previewFiles()" />
                                    @error('media')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                                <select name="category_id" required class="form-select">
                                    <option value="">Pilih</option>
                                    @foreach ($kategoryes as $k)
                                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                                    @endforeach


                                </select>
                                @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                                <input type="number" value="{{ old('harga') }}" class="form-control" id="exampleFormControlInput1" name="harga" required
                                    placeholder="Harga Produk..." />
                                    @error('harga')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Deskripsi</label>
                                <input id="x" type="hidden" required name="keterangan">
                                <trix-editor input="x"> {{ old('keterangan') }} </trix-editor>
                            </div>
                            @error('keterangan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                            <div class="">
                                <button type="submit" class="btn btn-primary"> Simpan</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <script src="/script.js"></script>
    </div>
@endsection
