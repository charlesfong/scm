<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\supplier;


class supplierController extends Controller
{
    public function index() {
    	$supplierz = supplier::where('active',1)->get();
        return view('supplier',compact('supplierz'));
    }
    public function storesupplier(request $request) {
        $supplier = new supplier();
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->jenis = $request->jenis;
        $supplier->no_telp = $request->no_telp;
        $supplier->save();
        return redirect(route('showallsupplier'));
    }
    public function showinput() {
        return view('inputsupplier');
    }
    public function delete(Request $request) {
        $supplier = supplier::find($request->id_supplier);
        $supplier->active = false;
        $supplier->save();
        return redirect(route("showallsupplier"));
    }
    public function getdetails(Request $request) {
        $supplier = supplier::find($request->id_supplier);
        return response()->json(['result' => $supplier]);
    }
    public function update(Request $request)
    {
        $supplier = supplier::find($request->id_supplier);
        $supplier->nama = $request->nama;
        $supplier->alamat = $request->alamat;
        $supplier->jenis = $request->jenis;
        $supplier->no_telp = $request->no_telp;
        $supplier->save();
        return redirect(route("showallsupplier"));
    }

}
