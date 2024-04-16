<?php

use App\Http\Controllers\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
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


//// Guest Routes
Route::get('/', function () {
    return "Home Page";
});


// connecter un client ou un expert
Route::get('/login', [LoginController::class, "index"]);
Route::post('/login', [LoginController::class, "login"])->name("login");

// connecter un admin
Route::get('/login_admin', [LoginAdminController::class, "index"]);
Route::post('/login_admin', [LoginAdminController::class, "login_admin"])->name("login_admin");



Route::get('/inscrire', [RegisterController::class, "index"])->name("inscription");

/// Auth Routes
Route::prefix("client")->name("client.")->middleware("auth:web")->group(function () {
    // url: http://localhost:8080/client/dashboard
    Route::get("/dashboard", function(){
        return "dashboard client";
    })->name("dashboard");

    Route::get("/logout", [LogoutController::class, "logout"])->name("logout");


});
