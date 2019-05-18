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
        $bjadi = barangjadi::all();
        $spks= spk::all();
        dd($bjadi);
        return view('barangjadi',compact('bjadi','spks'));
    }
    public function showinput() {
    	$bjadi = barangjadi::all();
    	$spk= spk::all();
        return view('inputbarangjadi',compact('bjadi','spk'));
    }
    public function storebarangjadi(request $request) {
    	$bjadi = new barangjadi();
        $bjadi->spk_id_spk = $request->spk_id_spk;
        $bjadi->nama = $request->nama;
        $bjadi->save();
        return redirect(route('showallbarangjadi'));
    }
}
