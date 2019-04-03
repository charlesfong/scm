<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\KaryawanFormRequest;
use App\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $karyawan = Karyawan::all();
        return view('karyawan.index',['karyawan' =>$karyawan]);
        // $karyawan = karyawan::all();
        // return view('karyawan',compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http/KaryawanFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::whereId($id)->firstOrFail();
        return view('karyawan.show', ['karyawan' =>$karyawan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawan = Karyawan::whereId($id)->firstOrFail();
        return view('karyawan.edit', compact('karyawan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(KaryawanFormRequest $request, $id)
    {
        // $jurusan = new Jurusan(
        //     array(
        //         'nama' => $request ->get('nama'),
        //         'deskripsi' => $request->get('deskripsi')
        //     )
        // );
        $karyawan = Karyawan::whereId($id)->firstOrFail();

        $karyawan->nama = $request->get('nama');
        $karyawan->jabatan = $request->get('jabatan');
        $karyawan->alamat = $request->get('alamat');
        $karyawan->save();
        // return redirect(action('jurusans/'.$jurusan->id.'/edit', $jurusan->id))->with('status', 'Jurusan dengan id '.$id.' telah berhasil diubah!');
        return view('karyawan.show', ['karyawan' =>$karyawan])->with('status', 'Karyawan dengan id '.$id.' telah berhasil diubah!');
        // return view('karyawan.index', ['karyawan' =>$karyawan])->with('status', 'Karyawan dengan id '.$id.' telah berhasil diubah!');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::whereId($id)->firstOrFail();
        $karyawan->delete();
        return redirect('/karyawan')->with('status', 'karyawan dengan id '.$id.' telah berhasil dihapus!');  

    }
    

    public function showinput() {
        return view('inputkaryawan');
    }
}
