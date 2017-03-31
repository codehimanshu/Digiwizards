<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocking extends Model
{
    protected $fillable = [
	'blocked_id', 'blocked_vehicle', 'blocked_by'
	];
	public $table = "blocking"; 
}
