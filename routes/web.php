<?php
namespace App\Http\Controllers\Auth;

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
Route::get('/login',[Login\LoginController::class,'index'])->name('sign-up');
Route::post('user-login',[Login\LoginController::class,'userLogin'])->name('user-login');

//sign-up
Route::get('/sign-up',[SignUp\SignupController::class,'index'])->name('sign-up');
Route::post('/store-sign-up',[SignUp\SignupController::class,'store'])->name('store-user');
