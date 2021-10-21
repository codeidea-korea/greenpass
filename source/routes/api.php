<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthSmsController;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
//Route::group(['middleware' => 'auth:api'], function () {
    Route::get('sms/result', [AuthSmsController::class, 'saveSmsHistory']);
    Route::post('auth/sms/send', [AuthSmsController::class, 'send']);
    Route::get('auth/sms/check', [AuthSmsController::class, 'check']);
    Route::get('auth/sms/sends', [AuthSmsController::class, 'index']);

    
    Route::get('user/info', [UserController::class, 'user']);
    Route::post('user/auth-add', [UserController::class, 'auth_add']);
    Route::get('user/auths', [UserController::class, 'auth_list']);
    
//});

