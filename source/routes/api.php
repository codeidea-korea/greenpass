<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthSmsController;
use App\Http\Controllers\AuthMailController;
;
use App\Http\Controllers\GreenPassController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BuyerController;

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

    Route::post('auth/mail/send', [AuthMailController::class, 'send']);
    Route::get('auth/mail/check', [AuthMailController::class, 'check']);
    Route::get('auth/mail/sends', [AuthMailController::class, 'index']);

    
    Route::get('user/info', [UserController::class, 'user']);
    Route::post('user/auth-add', [UserController::class, 'auth_add']);
    Route::post('user/auth-remove', [UserController::class, 'auth_remove']);

    Route::get('user/auths', [UserController::class, 'auth_list']);
    Route::post('user/favorite', [UserController::class, 'favorit_toggle']);
    
    Route::get('gps/list', [GreenPassController::class, 'gpslist']);
    Route::get('admin/partners/map', [GreenPassController::class, 'getPartnerMaplist']);

    Route::post('login/sns', [UserController::class, 'sns_login']);

    
    Route::post('admin/login', [AdminController::class, 'login']);
    Route::post('admin/find-password', [AdminController::class, 'findPassword']);
    Route::post('admin/conf/language', [AdminController::class, 'configureLanguage']);
    Route::post('admin/main/branch', [AdminController::class, 'mainByBranch']);
    Route::post('admin/main/staff', [AdminController::class, 'mainByStaff']);

    Route::post('admin/graph/auth', [AdminController::class, 'getAuthGraph']);
    
    Route::get('admin/check/duplicate-id', [BranchController::class, 'isDuplicatedId']);
    Route::post('admin/check/password', [BranchController::class, 'confirmPasswordByAdmin']);
    Route::post('admin/upload', [BranchController::class, 'uploadCompanyNumber']);
    Route::post('admin/branch/add', [BranchController::class, 'addBranch']);
    Route::post('admin/branch/edit', [BranchController::class, 'modifyBranch']);
    Route::get('admin/approve-branches', [BranchController::class, 'getAuthByBranchs']);
    Route::get('admin/approve-branch', [BranchController::class, 'getAuthByBranch']);
    Route::get('admin/branches', [BranchController::class, 'getBranchs']);
    Route::get('admin/branch', [BranchController::class, 'getBranch']);
    Route::post('admin/branch/reject', [BranchController::class, 'deniedBranch']);
    Route::post('admin/branch/approve', [BranchController::class, 'apploveBranch']);
    
    Route::post('admin/buyer/add', [BuyerController::class, 'addBuyer']);
    Route::post('admin/buyer/edit', [BuyerController::class, 'modifyBranch']);
    Route::get('admin/buyers', [BuyerController::class, 'getBuyers']);
    Route::get('admin/buyer', [BuyerController::class, 'getBuyer']);

    
//});

