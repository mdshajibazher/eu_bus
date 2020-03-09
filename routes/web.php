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

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home', 'HomeController@insert')->name('home.insert');
    Route::get('home/seatreserve/{bus}','HomeController@seatedit')->name('home.seatreserve');
    Route::post('home/seatreserve/{bus}','HomeController@seatupdate')->name('home.seatupdate');

});



Route::get('admin/login', 'Auth\AdminLoginController@adminLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@adminLoginSubmit')->name('admin.login');

Route::group(['prefix'=> 'admin','middleware' => ['auth:admin']], function(){
    Route::get('dashboard', 'adminController@dashboard')->name('admin.dashboard');
    Route::get('busroute/{busroute}/edit', 'BusRouteController@edit')->name('busroute.edit');
    Route::put('busroute/{busroute}', 'BusRouteController@update')->name('busroute.update');
    Route::get('bus/{routeid}/edit', 'BusController@edit')->name('bus.edit');
    Route::put('bus/{routeid}', 'BusController@update')->name('bus.update');
    Route::get('seat', 'SeatReservationController@index')->name('seat.view');
    Route::get('logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');

});




