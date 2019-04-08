<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\supplier;
use App\bahanbaku;
use App\customer;
use App\order;
use App\Order_detail;
use App\karyawan;

class orderController extends Controller
{
    public function orderlist() {
        $orders = order::all();
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
        $orders = Order_detail::where('id_order',$request->id_order)->get();
        return response()->json(['result' => json_decode(json_encode($orders),true)]);
    }
    public function storeorder(request $request){
        $order = new order();
        $order->customer_id_customer    = $request->customer;
        $order->karyawan_id_karyawan    = $request->karyawan;
        // $order->keterangan              = $request->biaya_transport;
        $order->save();
        $last=order::latest()->first();
        foreach ($request->kodebarang as $key => $val)
        {
            $ord                        = new Order_detail();
            $ord->id_order              = $last->id_order;
            $ord->kode_barang           = $request->kodebarang[$key];
            $ord->nama_barang           = $request->namabarang[$key];
            $ord->jumlah                = $request->jumlah[$key];
            $ord->satuan                = $request->satuan[$key];
            $ord->harga_satuan          = $request->hargasatuan[$key];
            $order->biaya_transport     = $request->biaya_transport[$key];
            $ord->keterangan            = $request->keterangan[$key];
            $ord->save();
        }
    	
        return redirect(route('showallorder'));
    }
}
