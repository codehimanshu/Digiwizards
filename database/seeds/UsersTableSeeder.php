<?php

use Illuminate\Database\Seeder;
use Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=>"user",
        	'email'=>"user@example.com",
        	'password'=>Hash::make("password"),
        	'card_balance'=>8700,
        	'role'=>1,
    	]);
        DB::table('users')->insert([
        	'name'=>"toll",
        	'email'=>"toll@example.com",
        	'password'=>Hash::make("password"),
        	'card_balance'=>8700,
        	'role'=>2,
    	]);
        DB::table('users')->insert([
        	'name'=>"highway",
        	'email'=>"highway@example.com",
        	'password'=>Hash::make("password"),
        	'card_balance'=>8700,
        	'role'=>3,
    	]);
        DB::table('users')->insert([
        	'name'=>"city",
        	'email'=>"city@example.com",
        	'password'=>Hash::make("password"),
        	'card_balance'=>8700,
        	'role'=>4,
    	]);
        DB::table('users')->insert([
        	'name'=>"super",
        	'email'=>"super@example.com",
        	'password'=>Hash::make("password"),
        	'card_balance'=>8700,
        	'role'=>5,
    	]);
    }
}
