<?php

use Illuminate\Database\Seeder;

class RTOTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rto')->insert([
        	'vehicle_no'=>"DL7SAC0338",
        	'type'=>"domestic",
        	'classification'=>"car",
    	]);
        DB::table('rto')->insert([
        	'vehicle_no'=>"DL2SAB1338",
        	'type'=>"commercial",
        	'classification'=>"bus",
    	]);
        DB::table('rto')->insert([
        	'vehicle_no'=>"HR7SAC0334",
        	'type'=>"domestic",
        	'classification'=>"bike",
    	]);
    }
}
