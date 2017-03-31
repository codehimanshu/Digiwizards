<?php

use Illuminate\Database\Seeder;

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
        	'password'=>md5("password"),
        	'card_balance'=>8700,
        	'role'=>1,
    	]);
        DB::table('users')->insert([
        	'name'=>"toll",
        	'email'=>"toll@example.com",
        	'password'=>md5("password"),
        	'card_balance'=>8700,
        	'role'=>2,
    	]);
        DB::table('users')->insert([
        	'name'=>"highway",
        	'email'=>"highway@example.com",
        	'password'=>md5("password"),
        	'card_balance'=>8700,
        	'role'=>3,
    	]);
        DB::table('users')->insert([
        	'name'=>"city",
        	'email'=>"city@example.com",
        	'password'=>md5("password"),
        	'card_balance'=>8700,
        	'role'=>4,
    	]);
        DB::table('users')->insert([
        	'name'=>"super",
        	'email'=>"super@example.com",
        	'password'=>md5("password"),
        	'card_balance'=>8700,
        	'role'=>5,
    	]);
    }
}
