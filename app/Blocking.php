<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocking extends Model
{
    protected $fillable = [
	'blocked_id', 'blocked_vehicle', 'blocked_by'
	];
	public $table = "blocking"; 

	public function getAllBlocked()
	{
		$vehicles = self::join('users','users.id','=','blocking.blocked_id')->join('vehicles','vehicles.id','=','blocking.blocked_vehicle')->select('blocking.id','vehicles.vehicle_no')->get();
		return $vehicles;
	}
}
