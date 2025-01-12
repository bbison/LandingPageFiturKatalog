<?php

namespace App\Http\Controllers;

use App\Models\kategory;
use App\Models\media_produk;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->param){
            $produks = produk::where('nama', 'like','%'.$request->param.'%')
            ->orWhere('keterangan', 'like','%'.$request->param.'%')
            ->get();
        }

        else{
            $produks = produk::paginate(50);
        }
        return view('produk.index', [
            'produks' => $produks,
            'kategory'=>kategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produk.create', [
            'kategoryes' => kategory::orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'category_id' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'media' => 'required',
        ]);

        //masukan data produk
        /*
        $table->foreignId('kategory_id');
        $table->string('nama');
        $table->text('keterangan');
        $table->string('harga');
         */
        $produk = produk::create([
            'kategory_id' => $request->category_id,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
        ]);

        /*
        simpan foto dan video produk
         */

        foreach ($request->file('media') as $media) {
            media_produk::create([
                'produk_id' => intval($produk->id),
                'file' => $media->store('media_produk', 'public'),
            ]);

        }

        return redirect('/produk')->with('berhasil', 'Produk Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($produk)
    {
        $id = decrypt($produk);
        
        return view('produk.show',[
            'produk'=>produk::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($produk)
    {
        $id = decrypt($produk);

        return view('produk.edit', [
            'produk' => produk::find($id),
            'kategoryes' => kategory::orderBy('name', 'ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $produk)
    {
        $idProduk = decrypt($produk);
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'category_id' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
        ]);

        //update produk
        produk::find($idProduk)->update([
            'kategory_id' => $request->category_id,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
        ]);

        //jika ada foto baru masukan
        if ($request->file('media')) {
            foreach ($request->file('media') as $media) {
                media_produk::create([
                    'produk_id' => intval($idProduk),
                    'file' => $media->store('media_produk', 'public'),
                ]);

            }
        }

        return redirect('/produk')->with('berhasil', 'Berhasil Update Produk');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($produk)
    {
        $id = decrypt($produk);
        $produk = produk::find($id);

        // hapus foto terkait
        foreach ($produk->media as $media) {
            $filePath = storage_path('app/public/' . $media->file);
            if (File::exists($filePath)) {
                File::delete($filePath);
                media_produk::find($media->id)->delete();
            }
        }
        // hapus produk
        $cek = $produk->delete();
        if ($cek) {
            return redirect('/produk')->with('berhasil', 'Produk Dan Foto Berhasil Dihapus');
        } else {
            return redirect('/produk')->with('gagal', 'Produk Dan Foto gagal Dihapus');
        }

    }

    public function hapusFotoProduk(Request $request)
    {
        $id = decrypt($request->id);
        // Nama file yang akan dihapus
        $filePath = storage_path('app/public/' . media_produk::find($id)->file);

// Cek apakah file ada
        if (File::exists($filePath)) {
            // Hapus file
            File::delete($filePath);
            media_produk::find($id)->delete();

            return back();
        } else {
            return back()->with('gagal', 'File Tidak Ditemukan');
        }
    }

    function lihatProduk($id)  {
        $produk_id = decrypt($id);
        return view('produk.lihatProduk',[
            'produk'=>produk::find($produk_id)
        ]);
    }
}
