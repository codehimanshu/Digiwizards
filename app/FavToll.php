<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FavToll extends Model
{
	protected $fillable = [
	'user_id', 'tollplaza_id'
	];
	public $table = "favtoll";
}
