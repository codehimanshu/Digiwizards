<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalTransactionController extends Controller
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
       // if($data['return'])  //return journey
       $transaction = new ExternalTransaction;
       $transaction->user_id = $data['user_id'];
       $transaction->toll_user_id = 1;
       $transaction->amount = $data['amount'];
       $transaction->mode_of_payment = $data['mode_of_payment'];
      //  $transaction->route = $data['route'];
       $transaction->transaction_id = $data['transaction_id'];
       $transaction->date = $data['date'];
       $user =  User::find($data['user_id']);
        $user->card_balance =  floatval($user->card_balance) + floatval($data['amount']);
        $user->save();
       if($transaction->save())
        return 1;
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
}
