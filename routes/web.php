<?php

use Illuminate\Support\Facades\Route;

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
Route::get('test_controller', 'RoomController@fetch_room');


Route::get('/', function () {
    return view('welcome');
});

//front page
Route::prefix('sadyaya')->group(function () {
    Route::get('home', 'FrontViewController@index')->name('home');
	Route::get('rooms', 'FrontViewController@rooms')->name('rooms');
});

//login page
Route::prefix('authentication')->group(function(){
	//viewing
	Route::get('login', 'AuthController@index');
	Route::get('register', 'AuthController@register');

	//posting
	Route::post('register', 'AuthController@registration')->name('registration');
	Route::post('login', 'AuthController@login_trigger')->name('login');

	//logout
	Route::get('logout', 'AuthController@logout');
});



Route::group(['middleware' => ['auth']], function() {
	Route::prefix('reservation')->group(function(){

		Route::get('entry/{room_id}', 'ReservationController@index');

		Route::post('payment_create', 'ReservationController@payment_create');

		Route::post('payment_execute/{room_id}', 'ReservationController@payment_execute');

		Route::post('reservation_info/{room_id}', 'ReservationController@reservation_info');

		Route::post('testing', 'testController@testing');

		Route::get('calendar_data', 'ReservationController@calendar')->name('calendar');
	});
});