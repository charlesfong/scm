<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\supplier;
use App\bahanbaku;
use App\customer;
use App\order;
use App\Order_detail;
use App\karyawan;
use App\spk;
use App\bom;

class indexController extends Controller
{
    public function index(request $request)
    {
    	
    	return view('index');
    }
}
