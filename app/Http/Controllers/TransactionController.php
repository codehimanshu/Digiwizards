<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ Transaction;
use App\ Vehicle;
use App\ TollPlaza;
use App\ TollPlazaFares;
use App\ User;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $transaction = new Transaction;
        $vehicle = Vehicle::where('vehicle_no',$data['vehicle_number'])->first();
        $transaction->user_id = $vehicle->user_id;
        $transaction->vehicle_id = $vehicle->id;
        $transaction->toll_user_id = 1;
        $transaction->amount = $data['amount'];
        $transaction->mode_of_payment = $data['mode_of_payment'];
        $transaction->transaction_id = $data['transaction_id'];
        $transaction->route = $data['route'];
        $transaction->date = $data['date'];
        $user =  User::find($vehicle->user_id);
        $user->card_balance -= $data['amount'];
        $user->save(); 
        if($transaction->save()){
           if(!$data['one_way']){     //return journey
             $transaction = new Transaction;
             $transaction->user_id = $vehicle->user_id;
             $transaction->vehicle_id = $vehicle->id;
             $transaction->toll_user_id = 1;
             $transaction->amount = $data['amount'];
             $transaction->mode_of_payment = $data['mode_of_payment'];
             $transaction->route = $data['route'];
             $transaction->date = $data['date'];
             $user =  User::find($vehicle->user_id);
             $user->card_balance = floatval($user->card_balance) - floatval($data['amount']);
             $user->save();
             if($transaction->save())
                return 1;
            else 
                return 0;
        }
        else return 1;
    }
    else 
        return 0;

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $transaction_model = new Transaction;
        return json_encode($transaction_model->get_all_transactions($request->user_id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function toll_amount(Request $request){
        $tolls = json_decode($request->get('tolls'));
        $vehicle_number = $request->get('vehicle_number');
        $user_id = $request->get('user_id');
        $user = User::find($user_id);
        $vehicle = Vehicle::where('vehicle_no',$vehicle_number)->first();
        $total_cost = 0;
        foreach ($tolls as $toll) {
            $TollPlazaFares =TollPlazaFares::where('tollplaza_id', $toll)->where('vehicle_type',$vehicle->type)->first();
            if($TollPlazaFares) 
                $total_cost +=  $TollPlazaFares->fare;
        }
        if(!$request->get('one_way')){
         foreach ($tolls as $toll) {
            $TollPlazaFares =TollPlazaFares::where('tollplaza_id', $toll)->where('vehicle_type',$vehicle->type)->first();
            if($TollPlazaFares) 
                $total_cost +=  $TollPlazaFares->returnfare;
        }   
        }
        return json_encode(['total_cost'=>$total_cost,'card_balance'=>$user->card_balance]);
    }   
}
