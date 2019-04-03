<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mesin;

class mesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mesin = Mesin::all();

        return view('mesin.mesin', compact('mesin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mesin.inputmesin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $mesin = new Mesin;
        $mesin->nama = $request->nama_mesin;

        $mesin->save();

        return redirect(route('mesin'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $mesin = Mesin::find($id); //atau
        //$buku = App\Book('book')->where('id', $id)->first();
        return view('mesin.show', compact('mesin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $mesin = Mesin::all();

        return view('mesin.updatemesin',compact('mesin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        //d($request->all);
        $array_id="";
        foreach ($request->all() as $key => $value) {
            if ($key!="_token")
            {
                $mesin = Mesin::find($key);
                $mesin->nama=$value;
                $mesin->save();
            }
        }
        return redirect(route('mesin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mesin = Mesin::where('id_mesin',$id)->first();
        $mesin->delete();
        //$mesin = Mesin::onlyTrashed()->where('id_mesin',$id)->first();
        //$mesin->restore();
        return redirect(route('mesin'));
    }
}
