<?php

namespace App\Http\Controllers;

use App\Models\alamat_penerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenerimaController extends Controller
{
    function create()  {
        return view('penerima.create');
    }
    function store(Request $request){
       $keranjang =  strpos($request->url, 'keranjang');
       $checkout =  strpos($request->url, 'checkout');

       alamat_penerima::create([
        'nama'=>$request->penerima,
        'alamat'=>$request->alamat,
        'contact'=>$request->contact,
        'user_id'=>Auth::user()->id
       ]);
       if($keranjang){


        return redirect($request->url);
       }
       else{
        return redirect($request->url);
       }
        
    }
}
