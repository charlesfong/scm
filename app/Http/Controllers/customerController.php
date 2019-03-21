<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\supplier;
use App\bahanbaku;
use App\customer;

class customerController extends Controller
{
    public function index() {
        $customers = customer::all();
        return view('customer',compact('customers'));
    }
    public function showinput() {
        return view('inputcustomer');
    }
    public function storecustomer(request $request){
    	$ct = new customer();
        $ct->nama = $request->nama;
        $ct->alamat = $request->alamat;
        $ct->unit = $request->unit;
        $ct->no_telp = $request->no_telp;
        $ct->email = $request->email;
        $ct->password = '123';
        $ct->save();
        return redirect(route('showallcustomer'));
    }

}
