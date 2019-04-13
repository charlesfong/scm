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
use App\Karyawan;
use App\spk;
use App\bom;
use App\barangjadi;

class spkController extends Controller
{
    public function index(request $request) {
        $spks = spk::all();
        if ($request->has('detail_order_id')) {
            $spks = spk::where('order_detail_id',$request->detail_order_id)->get();      
        }
        return view('spk',compact('spks'));
    }
    public function showinput(request $request) {
    	$customer=customer::all();
    	$karyawan=karyawan::all();
        $bb=bahanbaku::where('active',1)->get();
    	$orders=Order_detail::all();
        if ($request->has('detail_order_id')) {
            $orders = Order_detail::where('id',$request->detail_order_id)->get();      
        }

        return view('inputspk',compact('customer','karyawan','orders','bb'));
    }
    public function storespk(request $request){
    	$spk = new spk();
        $spk->order_detail_id           = $request->order;
        $spk->lama_kerja                = $request->lamakerja;
        $spk->biaya                     = $request->biaya;
        $spk->lokasi_tempat_customer    = $request->lokasi;
        $spk->deskripsi                 = $request->deskripsi;
        $spk->save();
        $last                           = spk::latest()->first();
        $order_d                        = Order_detail::where('id',$request->order)->first();
        $barangjadi                     = new barangjadi();
        $barangjadi->spk_id_spk         = $last->id_spk;
        $barangjadi->nama               = $order_d->nama_barang;
        $barangjadi->save();
        $order                          = order::find($order_d->id_order);
        $order->status                  = "2";
        $order->save();
        return redirect(route('showallspk'));
    }
    public function storebom(request $request){
        $check=true;
        foreach ($request->id_bahan_baku as $key => $val)
        {
            $bb  = bahanbaku::find($request->id_bahan_baku[$key]);
            if ($bb->stok<$request->jumlah_satuan_bahan[$key])
            {
                $check=false;
            }
        }
        if ($check==true)
        {
            foreach ($request->id_bahan_baku as $key => $val)
            {
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
            return redirect(route('showaddspk', ['detail_order_id' => $request->detail_order_id]));
        }
        else
        {
            return redirect(route('showaddspk', ['detail_order_id' => $request->detail_order_id]));
        }
    }
    public function getdetailbom(request $request)
    {
        // $nama_barang=Order_detail::find($request->id)->first();
        $bb=bahanbaku::all();
        $boms=bom::where('barang_jadi_id_barang_jadi',$request->id)->get();
        return response()->json(['result' => $boms,'bb' => $bb]);
    }
    public function checkBOM(request $request)
    {
        $check=bom::where('barang_jadi_id_barang_jadi',$request->id)->exists();
        return response()->json(['result' => $check]);
    }
    public function checkSPK(request $request)
    {
        $check=spk::where('order_detail_id',$request->id)->exists();
        return response()->json(['result' => $check]);
    }

    public function detailSPK(request $request)
    {
        if ($request->has('detail_order_id')) {      
            $spks = spk::where('order_detail_id',$request->detail_order_id)->first();
        }
        $order=order::where('id_order',$request->detail_order_id)->first();
        $order_d=Order_detail::find($request->detail_order_id)->first();
        $cust=customer::find($order->customer_id_customer)->first();
        $kary=karyawan::find($order->karyawan_id_karyawan)->first();
        return view('detailspk',compact('spks','cust','order_d','kary','order'));
    }
}
