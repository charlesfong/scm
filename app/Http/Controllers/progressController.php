<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;
use App\supplier;
use App\bahanbaku;
use App\customer;
use App\order;
use App\Order_detail;
use App\Karyawan;
use App\spk;
use App\bom;
use App\Mesin;
use App\Progress;
use App\ProgressDetail;
use App\Order_status;

class progressController extends Controller
{
	public function showinputprogressdetail() {
        $mesins 	= Mesin::where('active',1)->get();
        $Karyawans	= Karyawan::where('active',1)->get();
        $progress 	= Progress::all();
        return view('inputprogressdetail',compact('mesins','Karyawans','progress'));
    }
    public function storeprogressdetail(request $request){
        // dd($request);
    	$progress=new ProgressDetail();
    	$progress->no_dokumen=$request->no_dokumen;
    	$progress->id_mesin=$request->id_mesin;
    	$progress->id_karyawan=$request->id_karyawan;
    	$progress->tanggal_rencana=$request->tgl_rencana;
    	$progress->tanggal_progress=$request->tgl_progress;
    	$progress->hasil=$request->hasil;
    	$progress->keterangan=$request->keterangan;
    	$progress->save();
    	return redirect(route('showdetailprogress', ['no_dokumen' => $progress->no_dokumen]));
    }
    public function showinputprogress() {
        $progress = Progress::all();
        $spks = spk::all();
        foreach ($progress as $key => $value) {
            $spks = $spks->where('id_spk','!=',$value->id_spk);
        }
        $order_d=Order_detail::all();
        return view('inputprogress',compact('spks','order_d'));
    }
    public function showdetailprogress(request $request){
        $order_status= Order_status::all();
    	$spks		= spk::all();
    	$pros 		= Progress::find($request->no_dokumen)->first();
    	$order_d 	= Order_detail::all();
    	$mesins 	= Mesin::all();
        $Karyawans	= Karyawan::all();
    	$pros_d = ProgressDetail::where('no_dokumen',$request->no_dokumen)->where('active',1)->get();
        foreach ($pros_d as $proz)
        {
            if ($proz->tanggal_rencana>=$proz->tanggal_progress && $proz->status=="New")
            {
                $proz->status="2";
                $proz->save();
            }
        }
    	return view('progressdetail',compact('pros','spks','order_d','pros_d','mesins','Karyawans','order_status'));
    }
    public function showprogress(request $request){
        $spks = spk::all();
        $pros = Progress::all();
        $order_d=Order_detail::all();
        $pros_d=ProgressDetail::where('active',1)->get();
        if ($request->has('id_spk') && $request->input('id_spk') != "") {
            $pros = $pros->where('id_spk',$request->id_spk);
        }

        return view('progress',compact('pros','spks','order_d','pros_d'));
    }
    public function storeprogress(request $request){
    	$progress=new Progress();
    	$progress->no_dokumen=$request->no_dokumen;
    	$progress->no_revisi=$request->no_revisi;
    	$progress->id_spk=$request->id_spk;
    	$check=Progress::where('id_spk',$request->id_spk)->exists();
    	if ($check)
    	{
    		return redirect(route('showinputprogress'));
    	}
    	else
    	{
    		$progress->save();
    	}
    	
    }
    
    public function detailprogress(request $request){
    	$pros = Progress::find($request->id)->first();
    	return response()->json(['result' => $pros]);
    }
    public function deleteprogressdetail(request $request){
    	$pros = ProgressDetail::find($request->id);
        $pros->active = false;
        $pros->save();
        return redirect(route('showdetailprogress', ['no_dokumen' => $pros->no_dokumen]));
    }
    public function confirmprogressdetail(request $request){
        $pros = ProgressDetail::find($request->id);
        $pros->status = "4";
        $pros->save();
        return redirect(route('showdetailprogress', ['no_dokumen' => $pros->no_dokumen]));
    }
    public function updateprogress(request $request){
    	$pros = Progress::find($request->no_dokumen);
    	$progress->no_dokumen=$request->no_dokumen;
    	$progress->no_revisi=$request->no_revisi;
    	$progress->id_spk=$request->id_spk;
    	$progress->save();
    	return redirect(route('showdetailprogress'));
    }
}
