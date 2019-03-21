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
use App\barangjadi;
use App\spk;

class barangjadiController extends Controller
{
    public function index() {
        return view('barangjadi');
    }
    public function showinput() {
    	$bjadi = barangjadi::all();
    	$spk= spk::all();
        return view('inputbarangjadi',compact('bjadi','spk'));
    }
    public function storebarangjadi(request $request) {
    	$bb = new barangjadi();
        $bb->nama = $request->spk;
        $bb->harga = $request->nama;
        $bb->save();
        return redirect(route('barangjadi'));
    }
}
