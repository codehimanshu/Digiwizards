<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
	'user_id', 'vehicle_id', 'amount','status', 'mode_of_payment','route'
	];
	public $table = "transactions";    
}
