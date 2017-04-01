<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TollPlaza;
use App\Blocking;

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
    	$vehicle = Blocking::find($blocking_id);
    	$vehicle->delete();
    	return "success";
    }
}