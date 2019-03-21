<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\supplier;
use App\bahanbaku;
use App\customer;
use App\karyawan;

class karyawanController extends Controller
{
    public function index() {
        $karyawans = karyawan::all();
        return view('karyawan',compact('karyawans'));
    }
    public function showinput() {
        return view('inputkaryawan');
    }
    public function storekaryawan(request $request){
    	$kr = new karyawan();
        $kr->nama = $request->nama;
        $kr->jabatan = $request->jabatan;
        $kr->alamat = $request->alamat;
        $kr->telepon = $request->no_telp;
        $kr->save();
        return redirect(route('showallkaryawan'));
    }
}
