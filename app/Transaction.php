<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $fillable = [
	'user_id', 'vehicle_id', 'amount','staus', 'mode_of_payment','route','toll_user_id'
	];
	public $table = "transactions";    
}
