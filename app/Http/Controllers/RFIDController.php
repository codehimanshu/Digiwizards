<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class RFIDController extends Controller
{
	public function check_for_payment(Request $request)
	{
		$transaction_model = new Transaction;
		return $transaction_model->check_for_payment($request->vehicle, $request->toll_id);
	}

	public function getdata(Request $request)
	{
		// return var_dump($request);
		return '{"Succes":"Hello"}';
	}
}