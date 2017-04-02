<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;
use Mail;

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
		
		if(empty($toll)||empty(json_decode($toll)))
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


		$blocked_vehicle = DB::table('blocking')->where('blocked_vehicle',$vehicle_id)->count();
		if($blocked_vehicle)
		{
			$police = DB::table('users')->where('role',6)->first();
	        Mail::send('emails.notify',[],function($m) use ($police) {
	                $m->from('shashaa35@gmail.com','Toll');
	                $m->to($police->email,'Alert')->subject('Notification');
	            });
		
		}


	}
}