<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicles')->insert([
        	'user_id'=>1,
        	'vehicle_no'=>"DL7SAC0338",
        	'type'=>"domestic",
        	'status'=>0
    	]);
    }
}
