<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesin;
use Illuminate\Support\Facades\File;
class mesinController extends Controller
{
    
    public function index() {
        $mesins = Mesin::where('active',1)->get();
        return view('mesin',compact('mesins'));
    }
    public function storemesin(request $request) {
        $mesin = new Mesin();
        $mesin->nama = $request->nama_mesin;
        $mesin->tanggal_beli = $request->tgl_beli;
        if ($request->has('image')){
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $mesin->image = $filename;
            if (!is_dir("sources/mesin")) {
                File::makeDirectory("sources/mesin", $mode = 0777, true, true);
            }

            $pathForImage = "sources/mesin";
            $file->move($pathForImage, $filename);
        }
        $mesin->save();
        return redirect(route('showallmesin'));
    }
    public function showinput() {
        return view('inputmesin');
    }
    public function delete(Request $request) {
        $mesin = Mesin::find($request->id_mesin);
        $mesin->active = false;
        $mesin->save();
        return redirect(route("showallmesin"));
    }
    public function getdetails(Request $request) {
        $mesin = Mesin::find($request->id_mesin);
        return response()->json(['result' => $mesin]);
    }
    public function update(Request $request)
    {
        $mesin = Mesin::find($request->id_mesin);
        $mesin->nama = $request->nama;
        $mesin->tanggal_beli = $request->tgl_beli;
        $mesin->save();
        return redirect(route("showallmesin"));
    }
}
