<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PrestataireController;
use App\Http\Controllers\StripePaymentController;
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

Route::get('/',[HomeController::class,'IndexHome']);

Route::get('/categories',[HomeController::class,'IndexCategories']);

Route::get('/categorie/services/{id}',[HomeController::class,'IndexCategorieServices']);





Route::group(['middleware' => 'CheckGuest'], function(){
Route::post('/pro/register', [AuthController::class,'RegisterProfessional'])->name('registerpro');
Route::get('/pro/register',[AuthController::class,'RegisterProfessionalForm']);
Route::get('/web/account-selection',function(){
    return view('account-choose');
});
Route::post('/client/register',[AuthController::class,'RegisterClient']);
Route::get('/client/register',[AuthController::class,'RegisterClientForm']);
Route::post('/login',[AuthController::class,'Login'])->name('login');
Route::get('/login',function(){
    return view('Login.Login');
});
});







Route::group(['middleware' => 'CheckRole:admin'], function(){
    Route::get('/admin/dashboard',[AdminController::class,'IndexHome'])->middleware('CheckRole:admin');
    Route::get('/admin/settings',function(){
    return view('/Admin.Dashboard-settings');
    });
    Route::get('/admin/categories',function(){
        return view('Admin.Dashboard-categorie');
    });

    Route::put('/admin/rendez-vous/details/update',[AdminController::class,'UpdateReservationDetailsAdmin']);
    Route::delete('/admin/rendez-vous/details/delete/{id}',[AdminController::class,'DeleteReservation']);
    Route::get('/admin/services',[AdminController::class,'SelectServices']);
    Route::get('/admin/categories',[AdminController::class,'SelectCategories']);
    Route::put('/admin/categories',[AdminController::class,'updatecategorie']);
    Route::post('/admin/create/categorie',[AdminController::class,'CreateCategorie']);
    Route::get('/admin/update/categorie/{id}',[AdminController::class,'update']);
    // Route::put('/admin/update/categorie/{id}',[AdminController::class,'updatecategorie']);
    // Route::get('admin/delete/categorie/{id}',[AdminController::class,'deletecategorie']);
    Route::delete('admin/delete/categorie/{id}',[AdminController::class,'DestroyCategorie']);
    Route::get('/admin/create/service',[AdminController::class,'AddService']);
    Route::post('/admin/create/service',[AdminController::class,'CreateService']);
    Route::put('/admin/services',[AdminController::class,'EditService']);
    Route::delete('/admin/delete/service/{id}',[AdminController::class,'DeleteService']);
    Route::put('/admin/uban/service/{id}',[AdminController::class,'unbanService']);
    Route::put('/admin/ban/service/{id}',[AdminController::class,'BanService']);
    Route::get('/admin/rendez-vous',[AdminController::class,'ReservationsIndex']);
    Route::put('/admin/rendez-vous/cancel/{id}',[AdminController::class,'CancelReservation']);
    Route::put('/admin/settings',[AdminController::class,'UpdateAdminDetails'])->name('update.admin');
    Route::put('/admin/settings/password',[AdminController::class,'UpdatePassword'])->name('update.password.admin');
    Route::put('/admin/settings/image',[AdminController::class,'UpdateImage'])->name('update.image.admin');
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
    Route::put('/admin/ban/user/{id}', [AdminController::class,'BanUserByid']);
    Route::put('/admin/uban/user/{id}',[AdminController::class,'UbanUserByid']);
    Route::put('/admin/utilisateurs',[AdminController::class,'UpdateUser']);
});





Route::group(['middleware' => 'CheckRole:client'], function(){
Route::get('/client/overview',[ClientController::class,'index']);
Route::get('/client/reservation',[ClientController::class,'reservationRead']);
Route::get('/client/reservation/details/{id}',[ClientController::class,'GetReservationDetails']);
Route::put('/client/reservation/details/update/{id}',[ClientController::class,'UpdateReservationDetails'])->name('Client.UpdateReservation');
Route::get('/client/profile',[ClientController::class,'Profile']);
Route::post('/client/reservation/avis/{id}',[ClientController::class,'CreateFeedbackReservation']);
Route::get('/client/reservation/avis/{id}', [ClientController::class, 'showFeedbackForm']);
Route::post('/client/reservation/details/{id}',[ClientController::class,'StoreFeedbackReservation']);
Route::put('/client/reservation/details/{id}',[ClientController::class,'RequestCancelReservation']);
Route::get('/client/settings',[ClientController::class,'UpdateClientProfile']);
Route::put('/client/settings',[ClientController::class,'UpdateClientProfile']);
});





Route::group(['middleware' => 'CheckRole:prestataire'], function(){
Route::get('/professional/dashboard',[PrestataireController::class,'IndexHome']);
Route::get('/professional/services',[PrestataireController::class,'IndexServices']);
Route::get('/professional/creation/service',[PrestataireController::class,'IndexServiceCreation']);
Route::post('/professional/creation/service',[PrestataireController::class,'ServiceCreation']);
Route::put('/professional/services',[PrestataireController::class,'EditService']);
Route::delete('/professional/delete/service/{id}',[PrestataireController::class,'DeleteService']);
Route::get('/professional/reservation',[PrestataireController::class,'GestionReservationIndex']);
Route::put('/professional/cancel/reservation/details/{id}',[PrestataireController::class,'CancelReservationWithDetails']);
Route::put('/professional/confirm/reservation/{id}',[PrestataireController::class,'ConfirmReservation']);
Route::get('/professional/reservation/details/{id}',[PrestataireController::class,'ReservationDetails']);
Route::put('/professional/reservation/confirmer/{id}',[PrestataireController::class,'ValidationReservation']);
Route::get('/professional/avis/',[PrestataireController::class,'AvisIndex']);
Route::get('/professional/settings',[PrestataireController::class,'ProfileSettingsIndex']);
Route::put('/professional/settings/details',[PrestataireController::class,'UpdatePrestataireDetails'])->name('update.prestataire');
Route::put('/professional/settings/password',[PrestataireController::class,'UpdatePassword'])->name('update.password');
Route::put('/professional/settings/image',[PrestataireController::class,'UpdateImage'])->name('update.image');
});



Route::get('/prestataire/profile/{id}',[HomeController::class,'GetProfile']);
Route::get('/prestataire/avis/{id}',[HomeController::class,'GetProfileAvis']);
Route::get('/prestataires',[HomeController::class,'Prestataires']);
Route::get('/prestataire/services/{id}',[HomeController::class,'GetProfileServices']);
Route::get('/services',[HomeController::class,'IndexServiceSearch']);
Route::post('/services',[HomeController::class,'IndexServiceSearch']);
Route::get('/reservation/service/{id}',[HomeController::class,'IndexReservation']);
Route::post('/reservation/{id}',[HomeController::class,'ReservationDateTime']);
Route::get('/service/details/{id}',[HomeController::class,'indexService']);
Route::get('/logout',[AuthController::class,'Logout']);




Route::group(['middleware' => 'auth'], function(){
Route::post('/reservation/step/store',[HomeController::class,'StoreDateReservation']);
Route::post('/reservation/step/complete',[HomeController::class,'StoreReservation']);
Route::get('/reservation/step/complete',[HomeController::class,'FormReservation']);
Route::get('reservation-confirmation',[HomeController::class,'ConfirmationReservation'])->name('confirmation');
Route::get('/payment',[StripePaymentController::class,'payment'])->name('payment');
Route::post('/payment',[StripePaymentController::class,'payment'])->name('payment');
Route::get('/success',[StripePaymentController::class,'success'])->name('payment.success');
});



// Route::get('/payment/success', function () {
//     return view('success');  
// })->name('payment.success');

Route::get('/payment/cancel', function () {
    return view('cancel');  
})->name('payment.cancel');

// Route::fallback(function () {
//     return redirect('/');
// });   




