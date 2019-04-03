<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KaryawanFormRequest;
use App\Karyawan;

class KaryawanController extends Controller
{
    
    public function index() {
        $karyawan = Karyawan::where('active',1)->get();
        return view('karyawan.index',['karyawan' =>$karyawan]);
    }
    public function getdetails(Request $request) {
        $karyawan = Karyawan::find($request->id_karyawan);
        return response()->json(['result' => $karyawan]);
    }
    public function store(KaryawanFormRequest $request){

        $karyawan = new Karyawan(
            array(
                'nama' => $request ->get('nama'),
                'jabatan' => $request->get('stok'),
                'alamat' => $request->get('alamat'),
                'telepon' => $request->get('telepon')
            )
        );
            $karyawan->save();
            return redirect('/karyawan/create') //returnnya nge save
            ->with('status','karyawan dengan nama '.$request->get('nama').' sudah berhasil tersimpan');

    	// $kr = new Karyawan();
     //    $kr->nama = $request->nama;
     //    $kr->jabatan = $request->jabatan;
     //    $kr->alamat = $request->alamat;
     //    $kr->telepon = $request->no_telp;
     //    $kr->save();
     //    return redirect(route('showallkaryawan'));
    }

    public function show($id)
    {
        $karyawan = Karyawan::whereId($id)->firstOrFail();
        return view('karyawan.show', ['karyawan' =>$karyawan]);
    }

    public function edit($id)
    {
        $karyawan = Karyawan::whereId($id)->firstOrFail();
        return view('karyawan.edit', compact('karyawan'));

    }

     public function update(Request $request)
    {
        $karyawan = Karyawan::find($request->id_karyawan);
        $karyawan->nama = $request->nama;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->alamat = $request->alamat;
        $karyawan->telepon = $request->telepon;
        $karyawan->save();
        return redirect(route("showallkaryawan"));

    }

    public function destroy($id)
    {
        $karyawan = Karyawan::whereId($id)->firstOrFail();
        $karyawan->delete();
        return redirect('/karyawan')->with('status', 'karyawan dengan id '.$id.' telah berhasil dihapus!');  

    }
    
    public function delete(Request $request) {
        $karyawan = Karyawan::find($request->id_karyawan);
        $karyawan->active = false;
        $karyawan->save();
        return redirect(route("showallkaryawan"));
    }

    public function showinput() {
        return view('inputkaryawan');
    }
}
