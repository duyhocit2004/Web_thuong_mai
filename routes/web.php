<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', function () {
    return view('home');
}) -> middleware('auth');

Route::get('Login',[AuthController::class,'ShowFormLogin']);
Route::post('Login',[AuthController::class,'login'])->name('login');

Route::get('Register',[AuthController::class,'ShowFormRegister']);
Route::post('Register',[AuthController::class,'Register'])->name('Register');

Route::post('Logout',[AuthController::class,'Logout'])->name('Logout');

Route::get('/admin', function () {
    return"day la trang admin"; 
}) -> middleware('auth.admin');
