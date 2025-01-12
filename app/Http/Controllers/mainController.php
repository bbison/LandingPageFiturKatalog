<?php

namespace App\Http\Controllers;

use App\Models\kategory;
use App\Models\pesanan;
use App\Models\produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class mainController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->hak_akses == 'User') {
                return redirect()->intended('panel');
            } else {
                return redirect()->intended('produk');
            }

        }

        return back()->with('gagal', 'Periksa Kombinasi email dan password anda');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function getfile(Request $request)
    {
        $decryptFile = decrypt($request->file);
        $filename = $decryptFile;
        $path = storage_path('app/public/' . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        return response($file, 200)->header("Content-Type", $type);
    }

    public function index(Request $request)
    {
        if($request->kategory && !$request->param){

            $kategory_id = kategory::firstWhere('name', 'like','%'.$request->kategory.'%')->id;
            $produks = produk::where('kategory_id', $kategory_id)->paginate(18);
        }
        else if($request->param && !$request->kategory){
            $produks = produk::where('nama', 'like','%'.$request->param.'%')
            ->orWhere('keterangan', 'like','%'.$request->param.'%')
            ->get();
        }
        else if($request->param && $request->kategory){

            $kategory_id = kategory::firstWhere('name', 'like','%'.$request->kategory.'%')->id;

            $produks = produk::where('nama', 'like','%'.$request->param.'%')
            ->orWhere('keterangan', 'like','%'.$request->param.'%')
            ->where('kategory_id', $kategory_id)
            ->get();
        }
        else{
            $produks = produk::paginate(18);
        }

        return view('produk.lihatUser', [
            'produks' => $produks,
            'kategorys' => kategory::orderBy('name','DESC')->get(),
        ]);
    }

    public function loginUser()
    {
        return view('login');
    }
    public function registerUser()
    {
        return view('register');
    }
    public function prosesRegisterUser(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'contact' => ['required'],
        ]);

        if ($request->password != $request->password2) {
            return back()->with('gagal', 'Password Tidak Sama')->withInput();
        }

        $cek = User::create([
            'name' => $request->email,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'contact' => $request->contact,
            'hak_akses' => 'User',
        ]);
        if ($cek) {
            return redirect('/login')->with('berhasil', 'Berhasil Registrasi Silahkan Login');
        } else {
            return back()->with('gaga', 'Gagal Registrasi Silahkan Hubungi Admin');
        }
    }

    public function panel(Request $request)
    {

        $produk = pesanan::Filter($request->filter)->paginate(10);
        return view('user.panel',[
            'pesanans'=>$produk,
        ]);
    }

    public function masukanKeranjang(Request $request)
    {
        $id = decrypt(($request->produk));
        $cek = pesanan::where('user_id', Auth::user()->id)
        ->where('produk_id', $id)
        ->where('status','keranjang')
        ->get();
        if ($cek->count() > 0) {
            return 'ada';
        } else {

            $masukan = pesanan::create([
                'user_id' => Auth::user()->id,
                'produk_id' => $id,
                'status' => 'keranjang',
            ]);

            if ($masukan) {
                return true;
            } else {
                return false;
            }
        }

    }

    function home(){
        return view('home');
    }
}
