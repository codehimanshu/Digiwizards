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
		$vehicle_id = $vehicle->id;
		// return var_dump($request);
		echo $vehicle_id;
		$paid = substr($request->paid,1,strlen($request->paid-1));
		echo $paid;
		$pos = strpos($paid, 'p');

		return;
	}
}