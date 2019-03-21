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
        return view('product');
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
    	$bb = bahanbaku::all();
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
}
