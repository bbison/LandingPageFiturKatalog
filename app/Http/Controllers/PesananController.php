<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class PesananController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = 'SB-Mid-server-NOlnN7XVK5okl-Hw5p_Abj_i';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createSnapToken(Request $request)
    {

        if ($request->keranjang) {
            $pesanan_id = decrypt($request->keranjang);
            $pesanan = pesanan::find($pesanan_id);
            $produk = produk::find($pesanan->produk->id);
            $total = floatval($request->jumlahBeli) * floatval($pesanan->produk->harga);
            $qtty = $pesanan->jumlah;

            $pesanan->update([
                'alamat_penerima_id'=>$request->penerima,
                'jumlah'=>$request->jumlahBeli,
                'catatan' => $request->catatan,
            ]);
            $id = $produk->id;
        } else {
            $id = decrypt($request->produk);
            $produk = produk::find($id);
            $total = floatval($produk->harga) * floatval($request->jumlahBeli);
            $masukan = pesanan::create([
                'user_id' => Auth::user()->id,
                'produk_id' => $id,
                'alamat_penerima_id' => $request->penerima,
                'jumlah' => $request->jumlahBeli,
                'catatan' => $request->catatan,
                'status' => 'tunggubayar',
            ]);

            $pesanan_id = $masukan->id;
            $qtty = $request->jumlah;
        }


        try {
          
          
            $params = array(
                'transaction_details' => array(
                    'order_id' => $pesanan_id.'-'.time(),
                    'gross_amount' => $total,
                ),
                // 'item_details' => array(
                //     'id' => $id,
                //     'price' => floatval($total),
                //     'quantity' => intval($qtty),
                //     'name' => $produk->nama, 
                // ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                    'phone' => Auth::user()->contact,
                ),
            );

           

            $snapToken = Snap::getSnapToken($params);
            pesanan::find($pesanan_id)->update([
                'snap_token'=>$snapToken,
                'status'=>'tunggubayar'
            ]);

           
            $encrypt = encrypt($pesanan_id);

            return redirect('/pembayaran?keranjang='.$encrypt);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function checkout(Request $request)
    {

        if ($request->keranjang) {
            $id_pesanan = decrypt($request->keranjang);
            $keranjang = pesanan::find($id_pesanan);
            $produk = produk::find($keranjang->produk->id);
        } elseif ($request->produk) {
            $id_produk = decrypt($request->produk);
            $produk = produk::find($id_produk);
        } else {
            
            return back();
        }
        return view('produk.checkout', [
            'produk' => $produk,
        ]);
    }

    public function pembayaran(Request $request)
    {
        $pesanan = decrypt($request->keranjang);
        // dd($pesanan);
        return view('produk.pembayaran',[
            'pesanan'=>pesanan::find($pesanan)
        ]);
    }

    function index(Request $request) {
  
       
            $pesanan = pesanan::FilterId(request()->query('query'))
            ->FilterStatus(request()->query('status'))
            // ->FilterTanggal(request()->query('start_date'),request()->query('end_date'))
            ->get();
        
        return view('pesanan.index',[
            'pesanans'=>$pesanan
        ]);
    }

    function update(Request $request, $id) {
        $id = decrypt($id);
        $pesanan =pesanan::find($id);
        $pesanan->update([
            'resi'=>$request->resi
        ]);
        return back()->with('berhasil', 'Berhasil Memasukan Resi');
    }

}
