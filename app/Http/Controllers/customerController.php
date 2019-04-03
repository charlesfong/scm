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
        $customers = customer::where('active',1)->get();
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

    public function show ($id)
    {
        $customer = customer::whereId($id)->firstOrFail();
        return view('customer.show', ['customer' =>$customer]);
    }

    public function edit($id)
    {
        $customer = customer::whereId($id)->firstOrFail();
        return view('customer.show', ['customer' =>$customer]);

    }

     public function update(Request $request)
    {
        $customer = customer::find($request->id_customer);
        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->unit = $request->unit;
        $customer->no_telp = $request->no_telp;
        $customer->email = $request->email;
        $customer->password = $request->password;
        $customer->save();
        return redirect(route("showallcustomer"));

    }

    public function destroy($id)
    {
        $customer = customer::whereId($id)->firstOrFail();
        $customer->delete();
        return redirect('/customer')->with('Info', 'Customer/Pelanggan '.$id.' Sudah dihapus!');  

    }
    
    public function delete(Request $request) {
        $customer = customer::find($request->id_customer);
        $customer->active = false;
        $customer->save();
        return redirect(route("showallcustomer"));
    }
    public function getdetails(Request $request) {
        $customer = customer::find($request->id_customer);
        return response()->json(['result' => $customer]);
    }

}
