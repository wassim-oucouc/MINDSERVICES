<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
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
    return view('home');
});


Route::post('pro/register', [AuthController::class, 'RegisterProfessional'])->name('registerpro');

Route::post('/client/register',[AuthController::class,'RegisterClient']);

Route::get('/client/register',function(){
    return view('Register.Register-client');
});

Route::post('/login',[AuthController::class,'Login']);
Route::get('/login',function(){
    return view('Login.Login');
});
Route::get('/pro/register',function(){
    return view('Register.Register-Professional');
});

Route::get('/admin/dashboard',function(){
    return view('Admin.Dashboard-home');
});

Route::get('/admin/settings',function(){
    return view('/Admin.Dashboard-settings');
});
