<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\supplier;
use App\bahanbaku;
use App\customer;
use App\order;
use App\karyawan;
use App\spk;

class spkController extends Controller
{
    public function index() {
        $spks = spk::all();
        return view('spk',compact('spks'));
    }
    public function showinput() {
    	$customer=customer::all();
    	$karyawan=karyawan::all();
    	$orders=order::all();
        return view('inputspk',compact('customer','karyawan','orders'));
    }
    public function storespk(request $request){
    	$spk = new spk();
        $spk->order_id_order = $request->order;
        $spk->lama_kerja = $request->lamakerja;
        $spk->biaya = $request->biaya;
        $spk->lokasi_tempat_customer = $request->lokasi;
        $spk->deskripsi = $request->deskripsi;
        $spk->save();
        return redirect(route('showallspk'));
    }
}
