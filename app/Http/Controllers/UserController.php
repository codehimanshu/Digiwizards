<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return true;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User;
        $user->name  = $data['name'];
        $user->email  = $data['email'];
        $user->password  = Hash::make($data['password']);
        $user->card_balance  = $data['card_balance'];
        $user->role  = 1;
        if( $user->save()){
            return true;
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function login(Request $request)
    {
        $data = array('email'=>$request->get('email'),'password'=>$request->get('password'));
        
        $validator = Validator::make($data, $rules);
        if($validator->fails()){

            return 0;
        }
        else {
            if(Auth::attempt($data)){
               return 1;
            }
            else{
                return 0;
            }
        }

    }  
    public function card_balance(Request $request){
        $user = User::find(intval($request->get('user_id')));
        return $user->card_balance;
    }    
     public function add_money(Request $request){

        $user = User::find(intval($request->get('user_id')));
        $amount = floatval($request->get('amount'));
        $user->card_balance = floatval($user->card_balance) + floatval($amount);
        if($user->save()){
            return $user->card_balance;
        }
        else
            return 0;

    }     

}
