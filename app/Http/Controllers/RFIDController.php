<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;

class RFIDController extends Controller
{
	public function check_for_payment(Request $request)
	{
		$transaction_model = new Transaction;
		return $transaction_model->check_for_payment($request->vehicle, $request->toll_id);
	}

	public function getdata(Request $request)
	{
		$vehicle = DB::table('vehicles')->where('rfid_id',$request->user)->first();
		if(!$vehicle) return 0;
		$vehicle_id = $vehicle->id;
		$toll= DB::table('transactions')->where('vehicle_id',$vehicle_id)->get();
		
		if(empty($toll))
			return 0;
		else
		{
			$route = $toll[0]->route;
			$route_arr = json_decode($route);
			$ret = "";
			foreach ($route_arr as $route ) {
				$ret = $ret . $route;
			}
			return $ret;
		}

		return 0;
		$paid = $request->paid;
		$paid =substr($paid,1,strlen($paid)-1);
		
		$pos = strpos($paid,'p');
		$toll_id = substr($paid,0,$pos);
		if($pos+1<=strlen($paid))
			echo "Subsequent toll;";
		else echo "First Toll";
		return $vehicle_id.$paid."Hello";
	}
}