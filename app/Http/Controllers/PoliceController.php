<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TollPlaza;
use App\Blocking;
use App\Vehicle;
use Auth;
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

    public function unblock(Request $request)
    {
    	$blocking_id = $request->blocking_id;
    	$vehicle = Blocking::find($blocking_id);
    	$vehicle->delete();
    	return "success";
    }

    public function block(Request $request)
    {
    	$vehicle_no = $request->vehicle_no;
    	$vehicle_model = new Vehicle;
    	$vehicle_id = $vehicle_model->getVehicleId($vehicle_no);
    	if(!$vehicle_id)
	    	return redirect('/dashboard');
    	$user_id = $vehicle_model->getUserId($vehicle_no);
    	// get auth id
    	$blocked_by = Auth::user()->id;
    	var_dump("expression");
    	DB::table('blocking')->insert(
    			['blocked_id'=>$user_id,'blocked_by'=>$blocked_by,'blocked_vehicle'=>$vehicle_id]
    		);
    	return redirect('/dashboard');
    }
}