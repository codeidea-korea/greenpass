<?php

use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\AdminController;
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
Route::get('/', [UserController::class, 'intro']) ->name('user.intro');
Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
Route::get('/user/login', [UserController::class, 'login'])->name('user.login');
Route::get('/user/register_certify', [UserController::class, 'register_certify'])->name('user.register_certify');
Route::get('/user/register_certify2', [UserController::class, 'register_certify2'])->name('user.register_certify2');
Route::get('/user/link', [UserController::class, 'register_certify'])->name('user.link');

Route::get('/login/oauth/google', [UserController::class, 'sns_google'])->name('user.google');
Route::post('/login/oauth/apple', [UserController::class, 'sns_apple'])->name('user.apple');
Route::get('/login/oauth/kakao', [UserController::class, 'sns_kakao'])->name('user.kakao');
Route::get('/login/oauth/naver', [UserController::class, 'sns_naver'])->name('user.naver');
Route::get('/login/oauth/facebook', [UserController::class, 'sns_facebook'])->name('user.facebook');
Route::get('/login/oauth/zalo', [UserController::class, 'sns_zalo'])->name('user.zalo');
Route::get('/login/cookie-check', [UserController::class, 'sns_cookie_check'])->name('user.cookie_check');

Route::get('/terms/privacy', [UserController::class, 'privacy']) ->name('terms.privacy');
Route::get('/terms/usage', [UserController::class, 'usage']) ->name('terms.usage');


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/index', [AdminController::class, 'index']);
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin.login.index');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.login.logout');
    Route::get('find/password', [AdminController::class, 'find_password'])->name('admin.login.find_password');
    Route::get('send/password', [AdminController::class, 'send_password'])->name('admin.login.send_password');
    
    Route::get('join/terms', [AdminController::class, 'join_terms'])->name('admin.join.terms');
    Route::get('join/regist', [AdminController::class, 'join_regist'])->name('admin.join.regist');
    Route::get('join/complete', [AdminController::class, 'join_complete'])->name('admin.join.complete');
    
    Route::get('terms/privacy', [AdminController::class, 'terms_privacy'])->name('admin.terms.privacy');
    Route::get('terms/usage', [AdminController::class, 'terms_usage'])->name('admin.terms.usage');
    
    Route::get('buyers', [AdminController::class, 'buyer_list'])->name('admin.buyer.list');
    Route::get('buyer', [AdminController::class, 'buyer_detail'])->name('admin.buyer.detail');
    Route::get('buyer-add', [AdminController::class, 'buyer_add'])->name('admin.buyer.add');
    
    Route::get('branchs', [AdminController::class, 'branch_list'])->name('admin.branch.list');
    Route::get('branch', [AdminController::class, 'branch_detail'])->name('admin.branch.detail');
    Route::get('branch-modify', [AdminController::class, 'branch_modify'])->name('admin.branch.modify');
    Route::get('branchs/accepts', [AdminController::class, 'branch_accept_list'])->name('admin.branch.accept.list');
    Route::get('branchs/accept', [AdminController::class, 'branch_accept_detail'])->name('admin.branch.accept.detail');

    Route::get('auths/branch-name', [AdminController::class, 'auth_comp_list'])->name('admin.auth.comp.list');
    Route::get('auths/branch-name/detail', [AdminController::class, 'auth_comp_detail'])->name('admin.auth.comp.detail');
    Route::get('auths/visitors', [AdminController::class, 'auth_visitor_list'])->name('admin.auth.visitor.list');
    Route::get('auths/visitors/detail', [AdminController::class, 'auth_visitor_detail'])->name('admin.auth.visitor.detail');

    Route::get('auths/graph', [AdminController::class, 'auth_auth_graph_index'])->name('admin.auth_graph.index');
    
    Route::get('auths/branch-name/excel', [AdminController::class, 'auth_comp_exceldownload'])->name('admin.auth.comp.excel');
    Route::get('auths/visitors/excel', [AdminController::class, 'auth_visitor_exceldownload'])->name('admin.auth.visitor.excel');
});
