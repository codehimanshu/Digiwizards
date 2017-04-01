<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TollPlaza extends Model
{
    protected $fillable = [
	'user_id', 'name','status', 'address','latitude','longitude','next_city','previous_city','type'
	];

	public $table = "tollplazas";

	public function filter_tolls($source_lat,$source_lang,$dest_lat,$dest_lang)
	{
		$min_lat = min($source_lat,$dest_lat);
		$max_lat = max($source_lat,$dest_lat);
		$min_lang = min($source_lang,$dest_lang);
		$max_lang = max($source_lang,$dest_lang);

		$tolls = self::whereBetween('latitude',[$min_lat,$max_lat])->whereBetween('longitude',[$min_lang,$max_lang])->get();
		return $tolls;
	}
}
