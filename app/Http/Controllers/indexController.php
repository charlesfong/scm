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
use App\ProgressDetail;
use App\Progress;

class indexController extends Controller
{
    public function index(request $request)
    {
    	$spks = spk::all();
    	$ps   = Progress::all();
    	$a=0;
    	foreach ($ps as $val)
    	{

    		$pds  = ProgressDetail::where('no_dokumen',$val->no_dokumen)->get();
    		$total = count($pds);
    		$count = 0;
    		foreach ($pds as $val_1)
    		{
    			if ($val_1->status==4)
    			{
    				$count++;
    			}
    		}
    		if ($count!=$total)
    		{
    			$array[$a]['count'] = "belum";
    		}
    		else
    		{
    			$array[$a]['count'] = "sudah";
    		}
    		
    	}
    	return view('index');
    }
}
