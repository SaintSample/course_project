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

Route::group([
    'prefix' => 'auth',
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers'
], function () {


    Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('registration', [\App\Http\Controllers\AuthController::class, 'registration']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::post('me', [\App\Http\Controllers\AuthController::class, 'me']);

});

Route::group([
    'middleware' => ['jwt.auth'],
], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [\App\Http\Controllers\UserController::class, 'index']);
        Route::get('{user}', [\App\Http\Controllers\UserController::class, 'show']);
    });

    Route::apiResource('department', \App\Http\Controllers\DepartmentController::class);
    Route::apiResource('passport', \App\Http\Controllers\PassportController::class);
    Route::apiResource('address', \App\Http\Controllers\UserAddressController::class);
    Route::apiResource('phone', \App\Http\Controllers\UserPhoneController::class);
    Route::apiResource('vacation', \App\Http\Controllers\VacationController::class);
    Route::apiResource('work_condition', \App\Http\Controllers\WorkConditionController::class);
    //Route::apiResource('user', \App\Http\Controllers\UserController::class);
});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
