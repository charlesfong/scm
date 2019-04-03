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
        $orders = order::groupBy('tanggal')->get();
        $customers = customer::all();
        $karyawans = karyawan::all();
        return view('order',compact('orders','customers','karyawans'));
    }
    public function showinput() {
    	$customer=customer::all();
    	$karyawan=karyawan::all();
        return view('inputorder',compact('customer','karyawan'));
    }
    public function getdetails(Request $request) {
        $orders = order::where('tanggal',$request->tanggal)->get();
        return response()->json(['result' => json_decode(json_encode($orders),true)]);
    }
    public function storeorder(request $request){
        foreach ($request->kodebarang as $key => $val)
        {
            $ord = new order();
            $ord->customer_id_customer = $request->customer;
            $ord->karyawan_id_karyawan = $request->karyawan;
            $ord->unit_pemesanan = $request->unitpemesanan[$key];
            $ord->kode_barang = $request->kodebarang[$key];
            $ord->nama_barang = $request->namabarang[$key];
            $ord->jumlah = $request->jumlah[$key];
            $ord->satuan = $request->satuan[$key];
            $ord->harga_satuan = $request->hargasatuan[$key];
            $ord->keterangan = $request->keterangan[$key];
            $ord->save();
        }
    	
        return redirect(route('showallorder'));
    }
}
