<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Auth;
use App\Transaction;
use App\Vehicle;
use Session;
use App\Rto;
use App\TollPlazaFares;
use App\TollPlaza;
class TollController extends BaseController
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public static function admin(){
		if(intval(Auth::user()->role) == 2)
		{  

			//dd("hello");


			$action="Dashboard";
			$transactions = Transaction::where('user_id',Auth::user()->id)->get();
			foreach ($transactions as $trans) {
				$user = User::where('id', $trans->user_id)->first();
				$vehicle = Vehicle::where('id',$trans->vehicle_id)->first();
				$trans->user=$user;
				$trans->vehicle = $vehicle;
				$rto=Rto::where('vehicle_number',$vehicle->vehicle_number)->first();
				$trans->rto=$rto;

					
			}
			return View::make('dashboard_toll', compact('action','transactions'));
		
		}
		else{
		return Redirect::route('home');

	}
	}
	
	
	
}
