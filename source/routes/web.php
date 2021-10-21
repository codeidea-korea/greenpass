<?php

/*
use App\Http\Controllers\Admin\BoardController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MasterController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
*/

use App\Http\Controllers\Web\UserController;
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
Route::get('/user/register_certify2', [UserController::class, 'register_certify'])->name('user.register_certify2');
Route::get('/user/link', [UserController::class, 'register_certify'])->name('user.link');

Route::fallback(function () {
    return view('user.notfound');
});