<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KaryawanFormRequest;
use App\Mesin;

class MesinController extends Controller
{
    public function index() {
        $mesins = Mesin::where('active',1)->get();
        return view('mesin',compact('mesins'));
    }
    public function storemesin(request $request) {
    	$mesin = new Mesin();
        $mesin->nama = $request->nama_mesin;
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
        $mesin->save();
        return redirect(route("showallmesin"));

    }
}
