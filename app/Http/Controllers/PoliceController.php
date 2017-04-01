<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TollPlaza;
use App\Blocking;
use DB;

class PoliceController extends Controller
{
    public function dashboard()
    {
    	$action = "Police";
    	$blocking_model = new Blocking;
    	$blocked = $blocking_model->getAllBlocked();
    	return view('dashboard_police',compact('blocked','action'));
    }

    public function block(Request $request)
    {
    	$blocking_id = $request->blocking_id;
    	DB::table('blocking')->where('id',$blocking_id)->delete();
    	return "success";
    }
}