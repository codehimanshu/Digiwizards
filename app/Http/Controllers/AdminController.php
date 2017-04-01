<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\User;
use Hash;
use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Auth;
use Session;
use App\TollPlaza;
use App\TollPlazaFares;
use App\Transaction;

class AdminController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   public static function admin(){
		if(intval(Auth::user()->role) == 5)
		{  

			//dd("hello");


			$action="Dashboard";
			$toll=TollPlaza::all();
			$transactions = Transaction::all();

			return View::make('dashboard_admin', compact('action','toll','transactions'));
		
		
		}
		else{
		return Redirect::route('home');

	}
	}

	public static function create(){
	

			$action="Createtoll";

		return View::make('createtoll',compact('action'));
		
		
	}

	public static function savedetails(){
			$action="Createtoll";
		$data=Input::all();
		$user=new User;
		$user->name=$data['name'];
		$user->email=$data['email'];
		$user->password=Hash::make($data['password']);
		$user->card_balance=0;
		$user->role='2';
		$user->save();
		$toll=new TollPlaza;
		$toll->user_id = $user->id;
		$toll->name=$data['tollname'];
		$toll->latitude=$data['latitude'];
		$toll->longitude=$data['longitude'];
		$toll->type=$data['type'];
		$toll->next_city=$data['next_city'];
		$toll->previous_city=$data['previous_city'];
		$toll->address=$data['address'];
		$toll->status=0;
		$toll->save();

		return Redirect::to('dashboard')->with('message','Successfully saved');
	}

	public static function getdetails($id){
		$toll_model = new TollPlaza;
		$toll = $toll_model->get_details($id);
		return compact('edit_toll','toll');
	}

	public static function editdetails(){
			$action="Edittoll";
		$data=Input::all();
		$user=new User;
		$user->name=$data['name'];
		$user->email=$data['email'];
		$user->password=Hash::make($data['password']);
		$user->card_balance=0;
		$user->role='2';
		$user->save();
		$toll=new TollPlaza;
		$toll->user_id = $user->id;
		$toll->name=$data['tollname'];
		$toll->latitude=$data['latitude'];
		$toll->longitude=$data['longitude'];
		$toll->type=$data['type'];
		$toll->next_city=$data['next_city'];
		$toll->previous_city=$data['previous_city'];
		$toll->address=$data['address'];
		$toll->status=0;
		$toll->save();

		return Redirect::to('dashboard')->with('message','Successfully saved');
	}	


}
