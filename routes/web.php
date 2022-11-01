<?php
namespace App\Http\Controllers;

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

Route::get('/', function () {
    return view('auth.login');
});
//login
Route::get('/login',[Auth\Login\LoginController::class,'index'])->name('sign-up');
Route::post('user-login',[Auth\Login\LoginController::class,'userLogin'])->name('user-login');
Route::get('account_signout',[Auth\Login\LoginController::class,'logOut']);

//sign-up
Route::get('/sign-up',[Auth\SignUp\SignupController::class,'index'])->name('sign-up');
Route::post('/store-sign-up',[Auth\SignUp\SignupController::class,'store'])->name('store-user');

//home
Route::get('home',[Home\HomeController::class,'index'])->name('home.index');
Route::post('/deposite-money',[Home\HomeController::class,'store']);
Route::post('/withdraw-money',[Home\HomeController::class,'withdrawMoney']);
Route::post('/transfer-money',[Home\HomeController::class,'transferMoney']);
