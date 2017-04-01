<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('welcome');
});

// RFID APIs
Route::group(['prefix' => 'rfid'], function () {
	Route::get('checkpayment', 'RFIDController@check_for_payment');
});

Route::group(['prefix' => 'app'], function () {
	Route::resource('geolocation','GeoLocationController');
	Route::resource('user','UserController');
	Route::post('login',array('as'=>'applogin','uses'=>'UserController@login'));
	Route::post('circulate',array('as'=>'circulateCoordinates','uses'=>'GeoLocationController@circulateCoordinates'));

});
Route::get('home',array('as'=>'home','uses'=>'WebController@home'));
/*Route::get('dashboard',array('as'=>'dashboard','uses'=>'WebController@dashboard'));*/

Route::get('logout',array('as'=>'logout','uses'=>'WebController@logout'));
Route::post('log',array('as'=>'login','uses'=>'WebController@log'));

Route::get('storetest', 'GeoLocationController@store');
