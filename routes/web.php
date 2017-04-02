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
// Route::get('testing', 'GeoLocationController@testing');


Route::get('/', function () {
	return view('welcome');
});
// RFID APIs
Route::group(['prefix' => 'rfid'], function () {
	Route::get('checkpayment', 'RFIDController@check_for_payment');
	Route::get('fetchdata', 'RFIDController@getdata');
});

Route::group(['prefix' => 'app'], function () {
	Route::resource('geolocation','GeoLocationController');
	Route::resource('user','UserController');
	Route::resource('vehicle','VehicleController');

	Route::post('login',array('as'=>'applogin','uses'=>'UserController@login'));
	Route::post('circulate',array('as'=>'circulateCoordinates','uses'=>'GeoLocationController@circulateCoordinates'));

});
Route::get('home',array('as'=>'home','uses'=>'WebController@home'));
/*Route::get('dashboard',array('as'=>'dashboard','uses'=>'WebController@dashboard'));*/

Route::get('logout',array('as'=>'logout','uses'=>'WebController@logout'));
Route::post('log',array('as'=>'login','uses'=>'WebController@log'));

Route::post('storetest', 'GeoLocationController@storetest');
Route::get('dashboard',array('as'=>'dashboard','uses'=>'WebController@dashboard'));



Route::get('storetest', 'GeoLocationController@store');
Route::post('save_settings',array('as'=>'save_settings','uses'=>'WebController@save_settings'));
Route::post('savedetails',array('as'=>'savedetails','uses'=>'AdminController@savedetails'));





Route::post('unblock_vehicle', 'PoliceController@unblock');
Route::post('block_vehicle', 'PoliceController@block');
Route::post('toll_amount','TransactionController@toll_amount');
Route::get('create',array('as'=>'create','uses'=>'AdminController@create'));


Route::get('transaction/show','TransactionController@show');
Route::resource('transaction','TransactionController');
Route::resource('external_transaction','ExternalTransactionController');


Route::get('view_webcam','WebCamController@view');
Route::post('upload_image','WebCamController@postImages');

Route::get('getdetails/{id}',array('as'=>'getdetails','uses'=>'AdminController@getdetails'));
Route::get('delete/{id}',array('as'=>'getdetails','uses'=>'AdminController@delete'));

Route::get('textrecognition', 'GcloudController@index');
Route::post('editdetails',array('as'=>'editdetails','uses'=>'AdminController@editdetails'));

Route::get('checkprice',array('as'=>'checkprice','uses'=>'AdminController@checkprice'));
Route::get('userslist',array('as'=>'userslist','uses'=>'AdminController@userslist'));
Route::post('card_balance',array('as'=>'card_balance','uses'=>'UserController@card_balance'));



