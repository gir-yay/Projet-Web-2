<?php

use App\Http\Controllers\auth\LogoutController;
use Illuminate\Support\Facades\Route;
/// url: http://localhost:8080/expert/dashboard
Route::get("/dashboard", function(){
    return view("expert.dashboard");
})->name("dashboard");

Route::post("/logout", [LogoutController::class, "logout"])->name("logout");

