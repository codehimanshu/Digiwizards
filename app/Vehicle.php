<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
	protected $fillable = [
	'user_id', 'address', 'contact','vehicle_no'
	];
	public $table = "vehicles";
    
    public function getVehicleId($vehicle_no){
		$vehicle = self::where('vehicle_no',$vehicle_no)->get();
		if(!empty($vehicle))
    		return $vehicle[0]->id;
    	else
    		return 0;
    }

    public function getUserId($vehicle_no){
		$vehicle = self::where('vehicle_no',$vehicle_no)->get();
    	return $vehicle[0]->user_id;
    }

}
