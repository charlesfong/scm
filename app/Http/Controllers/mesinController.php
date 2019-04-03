<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesin;

class mesinController extends Controller
{
    // public function create()
    // {
    //     return view('mesin.inputmesin');
    // }
    // public function store(Request $request)
    // {
    //     $mesin = new Mesin;
    //     $mesin->nama = $request->nama_mesin;

    //     $mesin->save();

    //     return redirect(route('mesin'));
    // }
    // public function edit()
    // {
    //     $mesin = Mesin::all();

    //     return view('mesin.updatemesin',compact('mesin'));
    // }
    // public function update(Request $request)
    // {
    //     $array_id="";
    //     foreach ($request->all() as $key => $value) {
    //         if ($key!="_token")
    //         {
    //             $mesin = Mesin::find($key);
    //             $mesin->nama=$value;
    //             $mesin->save();
    //         }
    //     }
    //     return redirect(route('mesin'));
    // }
    // public function destroy($id)
    // {
    //     $mesin = Mesin::where('id_mesin',$id)->first();
    //     $mesin->delete();
    //     return redirect(route('mesin'));
    // }

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
