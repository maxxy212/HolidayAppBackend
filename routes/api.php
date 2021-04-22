<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HolidayController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\DepartmentController;
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
Route::get('holidays', [HolidayController::class, 'getAllHolidays']);
Route::get('holidays/{id}', [HolidayController::class, 'getHolidayById']);
Route::get('holidays/{start_date}/{end_date}', [HolidayController::class, 'getHolidayByDate']);
Route::post('holidays', [HolidayController::class, 'createHoliday']);
Route::delete('holidays/{id}',[HolidayController::class, 'deleteHoliday']);
  });
  Route::get('all/depts', [DepartmentController::class, 'getAllDepartments']);

  Route::get('all/roles', [RoleController::class, 'getAllRoles']);
  Route::get('all/users', [AuthController::class, 'all_user']);
 // Route::get('all/users', 'App\Http\Controllers\Api\HolidayController@all_user');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
