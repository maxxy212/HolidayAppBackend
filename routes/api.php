<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
Route::get('holidays', 'Api\HolidayController@getAllHolidays');
Route::get('holidays/{id}', 'Api\HolidayController@getHolidayById');
Route::get('holidays/{start_date}/{end_date}', 'Api\HolidayController@getHolidayByDate');
Route::post('holidays', 'Api\HolidayController@createHoliday');
Route::delete('holidays/{id}','Api\HolidayController@deleteHoliday');
  });
  Route::get('all/users', 'Api\AuthController@all_user');
Route::post('/login', 'Api\AuthController@login');
Route::post('/logout', 'Api\AuthController@logout');
