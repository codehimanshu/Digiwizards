<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use User;
use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Auth;
use Session;
use App\TollPlaza;
use App\TollPlazaFares;
use App\Transaction;
use App\Blocking;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   public static function admin(){
		if(intval(Auth::user()->role) == 5)
		{  

			$action="Dashboard";
			$toll=TollPlaza::all();
			$transactions = Transaction::all();

	    	$blocking_model = new Blocking;
	    	$blocked = $blocking_model->getAllBlocked();

			return View::make('dashboard_admin', compact('action','toll','transactions','blocked'));
		}
		else{
			return Redirect::route('home');
		}	
	}
}
