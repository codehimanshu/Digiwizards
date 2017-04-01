<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TollPlazaFares extends Model
{
     protected $fillable = [
	'tollplaza_id', 'fare', 'status', 'returnfare', 'vehicle_type'
	];
	public $table = "tollplazafares";
}
