<?php

use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientProfileController;

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

Route::get('/',[HomeController::class, "index"])->name("home");

// connecter un client ou un expert
Route::get('/login', [LoginController::class, "index"]);
Route::post('/login', [LoginController::class, "login"])->name("login");

// connecter un admin
Route::get('/login_admin', [LoginAdminController::class, "index"]);
Route::post('/login_admin', [LoginAdminController::class, "login"])->name("login_admin");


//routes pour les formulaires d'inscription :
Route::get('/insclient', [RegisterController::class, "sdk_client"])->name("sdk_client");
Route::get('/insexpert', [RegisterController::class, "sdk_expert"])->name("sdk_expert");
Route::get('/ins', [RegisterController::class, "sdk_signup"])->name("sdk_signup");
//routes pour stockage a partir des formulaires :
Route::post('/stockclient', [RegisterController::class, "sdk_stock_client"])->name("sdk_stock_client");
Route::post('/stockexpert', [RegisterController::class, "sdk_stock_expert"])->name("sdk_stock_expert");

//=================================================================================================

/********* Admin Route *********** */



/***  Auth Routes  ********///
Route::prefix("client")->name("client.")->middleware("auth:web")->group(function () {
    // url: http://localhost:8080/client/dashboard
    Route::get("/dashboard", function(){
        return view("user.client.dashboard");
    })->name("dashboard");
    Route::get('/profile', [ClientProfileController::class, 'show'])->name('profile');
    Route::post("/logout", [LogoutController::class, "logout"])->name("logout");


});


/***************Client Profile****************/
