<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TollPlaza extends Model
{
    protected $fillable = [
	'user_id', 'name','status', 'address','latitude','longitude','next_city','previous_city','type'
	];
	public $table = "tollplazas";
}
