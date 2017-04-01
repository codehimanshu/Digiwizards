<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ Transaction;
use App\ Vehicle;
use App\ TollPlaza;

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
        $vehicle = Vehicle::where('vehicle_number',$data['vehicle_number'])->first();
        $transaction->user_id = $vehicle->user_id;
        $transaction->vehicle_id = $vehicle->id;
        $transaction->toll_user_id = $data['toll_user_id'];
        $transaction->amount = $data['amount'];
        $transaction->mode_of_payment = $data['mode_of_payment'];
        $transaction->route = $data['route'];
        $transaction->date = $data['date'];
        if($transaction->save()){
           if($data['return']){     //return journey
               $transaction = new Transaction;
               $transaction->user_id = $vehicle->user_id;
               $transaction->vehicle_id = $vehicle->id;
               $transaction->toll_user_id = $data['toll_user_id'];
               $transaction->amount = $data['amount'];
               $transaction->mode_of_payment = $data['mode_of_payment'];
               $transaction->route = $data['route'];
               $transaction->date = $data['date'];
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
    public function show($id)
    {
        //
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
        $vehicle = Vehicle::where('vehicle_number',$vehicle_number)->first();
        $total_cost = 0;
        foreach ($tolls as $toll) {
            $total_cost += TollPlazafare::where('tollplaza_id', $toll->id)->where('vehicle_type',$vehicle->type)->first()->fare;
        }
        return $total_cost;
    }   
}
