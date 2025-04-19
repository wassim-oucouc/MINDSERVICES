<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
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

Route::get('/admin/categories',function(){
    return view('Admin.Dashboard-categorie');
});

Route::get('/admin/services',[AdminController::class,'SelectServices']);


Route::get('/admin/categories',[AdminController::class,'SelectCategories']);
Route::post('/admin/create/categorie',[AdminController::class,'CreateCategorie']);

Route::get('/admin/update/categorie/{id}',[AdminController::class,'update']);

Route::put('/admin/update/categorie/{id}',[AdminController::class,'updatecategorie']);

// Route::get('admin/delete/categorie/{id}',[AdminController::class,'deletecategorie']);


Route::delete('admin/delete/categorie/{id}',[AdminController::class,'DestroyCategorie']);

Route::get('/admin/create/service',[AdminController::class,'AddService']);
Route::post('/admin/create/service',[AdminController::class,'CreateService']);


Route::put('/admin/update/service/{id}',[AdminController::class,'EditService']);


Route::delete('/admin/delete/service/{id}',[AdminController::class,'DeleteService']);

Route::put('/admin/uban/service/{id}',[AdminController::class,'unbanService']);

Route::put('/admin/ban/service/{id}',[AdminController::class,'BanService']);

Route::get('/admin/rendez-vous',[AdminController::class,'Rendez_vous']);


Route::get('/admin/create/categorie',function(){
    return view('/Admin.Dashboard-categorie-creation');
});

Route::get('/admin/avis',[AdminController::class,'SelectAvis']);

Route::delete('/Admin/delete/avis/{id}',[AdminController::class,'DeleteAvis']);

Route::put('/admin/approve/avis/{id}',[AdminController::class,'ApproveAvis']);
Route::put('/admin/refuse/avis/{id}',[AdminController::class,'RefuseAvis']);
Route::put('/admin/update/avis/{id}',[AdminController::class,'UpdateAvis']);

Route::get('/admin/utilisateurs',[AdminController::class,'UtilisateurIndex']);

Route::delete('/admin/delete/user/{id}',[AdminController::class,'DeleteUser']);

Route::put('/admin/update/user/{id}',[AdminController::class,'UpdateUser']);

Route::get('/client/overview',[ClientController::class,'index']);

Route::get('/client/reservation',[ClientController::class,'reservationRead']);

Route::get('/client/reservation/details/{id}',[ClientController::class,'GetReservationDetails']);

Route::get('/client/profile',[ClientController::class,'Profile']);


Route::post('/client/reservation/avis/{id}',[ClientController::class,'CreateFeedbackReservation']);
Route::get('/client/reservation/avis/{id}', [ClientController::class, 'showFeedbackForm']);

Route::post('/client/reservation/details/{id}',[ClientController::class,'StoreFeedbackReservation']);


Route::get('/client/settings',[ClientController::class,'UpdateClientProfile']);
Route::put('/client/settings',[ClientController::class,'UpdateClientProfile']);

Route::get('/service/details/{id}',[HomeController::class,'indexService']);

Route::get('/prestataire/profile/{id}',[HomeController::class,'GetProfile']);

Route::get('/prestataire/avis/{id}',[HomeController::class,'GetProfileAvis']);

Route::get('/prestataire/services/{id}',[HomeController::class,'GetProfileServices']);


Route::get('/services',[HomeController::class,'IndexServiceSearch']);

Route::post('/services',[HomeController::class,'IndexServiceSearch']);

Route::get('/reservation/service/{id}',[HomeController::class,'IndexReservation']);
Route::post('/reservation/{id}',[HomeController::class,'ReservationDateTime']);



Route::post('/reservation/step/complete',[HomeController::class,'IndexReserve']);

Route::get('reservation-confirmation',[HomeController::class,'ConfirmationReservation']);

Route::get('/admin/settings',function(){
    return view('/Admin.Dashboard-settings');
});


Route::get('/web/account-selection',function(){
    return view('account-choose');
});


