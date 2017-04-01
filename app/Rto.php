<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rto extends Model
{
     protected $fillable = [
	'vehicle_no', 'type','classification'
	];
	public $table = "rto";
}
