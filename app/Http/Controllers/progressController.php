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
use App\karyawan;
use App\spk;
use App\bom;
use App\mesin;
use App\Progress;
use App\ProgressDetail;

class progressController extends Controller
{
	public function showinputprogressdetail() {
        $mesins 	= mesin::where('active',1)->get();
        $karyawans	= karyawan::where('active',1)->get();
        $progress 	= Progress::all();
        return view('inputprogressdetail',compact('mesins','karyawans','progress'));
    }
    public function storeprogressdetail(request $request){
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
        $spks = spk::all();
        $order_d=Order_detail::all();
        return view('inputprogress',compact('spks','order_d'));
    }
    public function showdetailprogress(request $request){
    	$spks		= spk::all();
    	$pros 		= Progress::find($request->no_dokumen)->first();
    	$order_d 	= Order_detail::all();
    	$mesins 	= mesin::all();
        $karyawans	= karyawan::all();
    	$pros_d = ProgressDetail::where('no_dokumen',$request->no_dokumen)->where('active',1)->get();
        foreach ($pros_d as $proz)
        {
            if ($proz->tanggal_rencana>=$proz->tanggal_progress && $proz->status=="New")
            {
                $proz->status="In progress";
                $proz->save();
            }
        }
    	return view('progressdetail',compact('pros','spks','order_d','pros_d','mesins','karyawans'));
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
    public function showprogress(){
    	$spks = spk::all();
    	$pros = Progress::all();
    	$order_d=Order_detail::all();
        $pros_d=ProgressDetail::all();
    	return view('progress',compact('pros','spks','order_d','pros_d'));
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
        $pros->status = "Done";
        $pros->save();
        return redirect(route('showdetailprogress', ['no_dokumen' => $pros->no_dokumen]));
    }
    public function updateprogress(request $request){
    	dd($request);
    	$pros = Progress::find($request->no_dokumen);
    	$progress->no_dokumen=$request->no_dokumen;
    	$progress->no_revisi=$request->no_revisi;
    	$progress->id_spk=$request->id_spk;
    	$progress->save();
    	return redirect(route('showdetailprogress'));
    }
}
