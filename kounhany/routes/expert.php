<?php

use App\Http\Controllers\auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpertProfileController;

/// url: http://localhost:8080/expert/dashboard
Route::get("/dashboard", function(){
    return view("expert.dashboard");
})->name("dashboard");

Route::get('/profile', [ExpertProfileController::class, 'show'])->name('profile');

Route::post("/logout", [LogoutController::class, "logout"])->name("logout");
Route::get('/profile/{expert}/edit', [ExpertProfileController::class, "sdk_edit_expert"])->name("sdk_edit_expert");
Route::put('/profile/{expert}', [ExpertProfileController::class, "sdk_update_expert"])->name("sdk_stockupdatex");

