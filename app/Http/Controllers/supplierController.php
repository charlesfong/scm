<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\supplier;


class supplierController extends Controller
{
    public function index() {
    	$supplierz = supplier::all();
        return view('supplier',compact('supplierz'));
    }


}
