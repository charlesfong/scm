<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\supplier;
use App\bahanbaku;

class productController extends Controller
{
    public function index() {
        $bb=bahanbaku::where('active',1)->get();
        return view('product',compact('bb'));
    }
    public function showaddbahanbaku() {
    	$supplierz = supplier::all();
        return view('inputbahanbaku',compact('supplierz'));
    }
    public function storebahanbaku(request $request) {
    	$bb = new bahanbaku();
        $bb->nama = $request->namabb;
        $bb->harga = $request->hargabb;
        $bb->supplier_id_supplier = $request->id_supz;
        $bb->save();
        return view('product');
    }
    public function showinputstokbahanbaku() {
    	$bb = bahanbaku::where('active',1)->get();
    	$supplierz = supplier::all();
        return view('inputstokbahanbaku',compact('bb','supplierz'));
    }
    public function storestokbahanbaku(request $request) {
        $array_id="";
        foreach ($request->all() as $key => $value) {
            if ($key!="_token")
            {
            	$bb = bahanbaku::find($key);
                $bb->stok=$value;
                $bb->save();
            }
        }
        return redirect(route('inputstokbb'));
    }
    public function showinput() {
        return view('inputmesin');
    }
    public function delete(Request $request) {
        $bb = bahanbaku::find($request->id_bahan_baku);
        $bb->active = false;
        $bb->save();
        return redirect(route("inputstokbb"));
    }
    public function getdetails(Request $request) {
        $bb = bahanbaku::find($request->id_bahan_baku);
        return response()->json(['result' => $bb]);
    }
    public function update(Request $request)
    {
        $bb = bahanbaku::find($request->id_bahan_baku);
        $bb->nama = $request->nama;
        $bb->harga = $request->harga;
        $bb->save();
        return redirect(route("inputstokbb"));
    }
}
