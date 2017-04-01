<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TollPlaza;
class GeoLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $response =  \GeometryLibrary\PolyUtil::isLocationOnPath(
              ['lat' => 25.774, 'lng' => -80.190], // point array [lat, lng]
             [ // poligon arrays of [lat, lng]
             ['lat' => 25.774, 'lng' => -80.190], 
             ['lat' => 18.466, 'lng' => -66.118], 
             ['lat' => 32.321, 'lng' => -64.757]
             ]);  

     dd($response);
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
        // $data = $request->all();

        $toll_plaza_model = new TollPlaza;
        $tolls = $toll_plaza_model->filter_tolls($request->src_lat,$request->src_lng,$request->dest_lat,$request->dest_lng);
        $on_path_tolls = array();
        foreach ($tolls as $toll) {
        $response =  \GeometryLibrary\PolyUtil::isLocationOnPath(
              ['lat' => $toll->lat, 'lng' => -80.190], // point array [lat, lng]
             [ // poligon arrays of [lat, lng]
             ['lat' => 25.774, 'lng' => -80.190], 
             ['lat' => 18.466, 'lng' => -66.118], 
             ['lat' => 32.321, 'lng' => -64.757]
             ]);

            if($response)
                array_push($on_path_tolls, $toll->id);
        }
        return json_encode($on_path_tolls);
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