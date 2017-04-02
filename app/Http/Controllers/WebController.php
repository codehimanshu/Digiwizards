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

class WebController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function home(){
		/*if(Auth::check()){
			return Redirect::route('dashboard');
		}*/
		return View::make('home');
	}
	public function logout(){
		if(Auth::check()){
			Auth::logout();
			Session::forget('email');
		}
		return Redirect::route('home');
	}

	public function log(){
		$data = array('email'=>Input::get('email'),'password'=>Input::get('password'));
		$rules=array(
			'email' => 'required',
			'password' => 'required',
			);
		$validator = Validator::make($data, $rules);
		if($validator->fails()){

			return Redirect::back()->withErrors($validator->errors())->withInput();
		}
		else {
			if(Auth::attempt($data)){
				if(Auth::user()->role=='2'){

					$toll_id = TollPlaza::where('user_id',Auth::user()->id)->first()->id;
				//dd($toll_id);
				$pricetwo=TollPlazaFares::where([['vehicle_type','two'],['tollplaza_id',$toll_id]])->first();


				$pricethree=TollPlazaFares::where([['vehicle_type','three'],['tollplaza_id',$toll_id]])->first();
				$pricefour=TollPlazaFares::where([['vehicle_type','four'],['tollplaza_id',$toll_id]])->first();
				//dd($pricethree);
				if($pricethree)
				session(['pricetwo'=>$pricetwo->fare]);

				if($pricethree)
				session(['pricethree'=>$pricethree->fare]);

				if($pricefour)
				session(['pricefour'=>$pricefour->fare]);
				}
				
				return Redirect::intended('dashboard')->with('success','Successfully Logged In');
			}
			else{
				return Redirect::route('home')->with('message','Your Customer Code / Password combination is incorrect!')->withInput();
			}
		}
	}

	public function dashboard(){
		if(Auth::check()){
			if(intval(Auth::user()->role) == 2){ 
				return TollController::admin();
			}
			else if(intval(Auth::user()->role) == 5){ 
				return AdminController::admin();
			}
			else
			if(Auth::user()->role==6){
				$police_model = new PoliceController;
				return $police_model->dashboard();
			}	
			/*else{
				return DealerController::dealers();
			}*/
		}
		else{
			return Redirect::route('home');
		}
		
	}
public function save_settings(){
	$data = Input::all();
	$toll_id = TollPlaza::where('user_id',Auth::user()->id)->first()->id;
	$pricetwo=TollPlazaFares::where([['vehicle_type','two'],['tollplaza_id',$toll_id]])->first();
	$pricethree=TollPlazaFares::where([['vehicle_type','three'],['tollplaza_id',$toll_id]])->first();
	$pricefour=TollPlazaFares::where([['vehicle_type','four'],['tollplaza_id',$toll_id]])->first();
	$pricetwo->fare=$data['pricetwo'];
	$pricethree->fare=$data['pricethree'];
	$pricefour->fare=$data['pricefour'];
	$pricefour->save();
	$pricethree->save();
	session(['pricetwo'=>$pricetwo->fare]);
	Session::put('pricethree',$data['pricethree']);
	Session::put('pricefour',$data['pricefour']);
	Session::forget('check');
	return Redirect::route('dashboard')->with('success','Settings Successfully Saved');
}


}
