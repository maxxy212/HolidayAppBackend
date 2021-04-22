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
Route::get('holidays', 'App\Http\Controllers\Api\HolidayController@getAllHolidays');
Route::get('holidays/{id}', 'App\Http\Controllers\Api\HolidayController@getHolidayById');
Route::get('holidays/{start_date}/{end_date}', 'App\Http\Controllers\Api\HolidayController@getHolidayByDate');
Route::post('holidays', 'App\Http\Controllers\Api\HolidayController@createHoliday');
Route::delete('holidays/{id}','App\Http\Controllers\Api\HolidayController@deleteHoliday');
  });
  Route::get('all/users', 'App\Http\Controllers\Api\HolidayController@all_user');
Route::post('/login', 'App\Http\Controllers\Api\HolidayController@login');
Route::post('/logout', 'App\Http\Controllers\Api\HolidayController@logout');
