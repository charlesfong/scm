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
use App\bom;

class spkController extends Controller
{
    public function index() {
        $spks = spk::all();
        return view('spk',compact('spks'));
    }
    public function showinput() {
    	$customer=customer::all();
    	$karyawan=karyawan::all();
        $bb=bahanbaku::where('active',1)->get();
    	$orders=order::all();
        return view('inputspk',compact('customer','karyawan','orders','bb'));
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
    public function storebom(request $request){
        foreach ($request->id_bahan_baku as $key => $val)
        {
            $bb=bahanbaku::find($request->id_bahan_baku[$key]);
            $bom = new bom();
            $bom->barang_jadi_id_barang_jadi    = $request->id_order;
            $bom->bahan_baku_id_bahan_baku      = $request->id_bahan_baku[$key];
            $bom->bagian                        = $request->bagian[$key];
            $bom->ukuran_mentah                 = $request->ukuran_mentah[$key];
            $bom->ukuran_jadi                   = $request->ukuran_jadi[$key];
            $bom->ukuran_luasan                 = $request->ukuran_luasan[$key];
            $bom->jumlah_bagian                 = $request->jumlah_bagian[$key];
            $bom->jumlah_satuan_bahan           = $request->jumlah_satuan_bahan[$key];
            $bom->harga_satuan                  = $bb->harga;
            $bom->save();
        }
        
        return redirect(route('showallspk'));
    }
}
