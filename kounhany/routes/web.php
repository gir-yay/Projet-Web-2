<?php

use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\ShowOurclient;
use App\Http\Controllers\admin\ShowOurexpert;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ExpertController;
use App\Http\Controllers\admin\StatistiqueController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

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


///*****   Guest Routes  ********////
/*
Route::get('/', function () {
    return "Home Page";
});
*/
Route::get('/',[HomeController::class, "index"]);

// connecter un client ou un expert
Route::get('/login', [LoginController::class, "index"]);
Route::post('/login', [LoginController::class, "login"])->name("login");

// connecter un admin
Route::get('/login_admin', [LoginAdminController::class, "index"]);
Route::post('/login_admin', [LoginAdminController::class, "login"])->name("login_admin");


Route::get('/inscrire', [RegisterController::class, "index"])->name("inscription");

//=================================================================================================

/********* Admin Route *********** */

// route de admin ====> Show Our clients
Route::get('/admin/ourclients', [ShowOurclient::class, 'index'])->name('admin.ourclients');

// route de admin ====> Show Our experts
Route::get('/admin/experts', [ShowOurexpert::class, 'index'])->name('admin.ourexperts');

/****** Activer et desactiver le compte de client  */
Route::post('/client/{id}/toggle-status', [ClientController::class, 'toggleStatus'])->name('toggleStatus');

/****** Activer et desactiver le compte de expert */
Route::post('/expert/{id}/toggle-status', [ExpertController::class, 'toggleStatus'])->name('toggleExpertStatus');

/* statistique */
Route::get('/admin/dashboard', [StatistiqueController::class, 'index'])->name('admin.dashboard');
//=================================================================================================

/***  Auth Routes  ********///
Route::prefix("client")->name("client.")->middleware("auth:web")->group(function () {
    // url: http://localhost:8080/client/dashboard
    Route::get("/dashboard", function(){
        return view("user.client.dashboard");
    })->name("dashboard");

    Route::post("/logout", [LogoutController::class, "logout"])->name("logout");


});
