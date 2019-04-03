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

class orderController extends Controller
{
    public function orderlist() {
        $orders = order::all();
        return view('order',compact('orders'));
    }
    public function showinput() {
    	$customer=customer::all();
    	$karyawan=karyawan::all();
        return view('inputorder',compact('customer','karyawan'));
    }
    public function storeorder(request $request){
    	$ord = new order();
        $ord->customer_id_customer = $request->customer;
        $ord->karyawan_id_karyawan = $request->karyawan;
        $ord->unit_pemesanan = $request->unitpemesanan;
        $ord->kode_barang = $request->kodebarang;
        $ord->nama_barang = $request->namabarang;
        $ord->jumlah = $request->jumlah;
        $ord->satuan = $request->satuan;
        $ord->harga_satuan = $request->hargasatuan;
        $ord->keterangan = $request->keterangan;
        $ord->save();
        return redirect(route('showallkaryawan'));
    }
}
