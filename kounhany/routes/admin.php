<?php

use App\Http\Controllers\auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ShowOurclient;
use App\Http\Controllers\admin\ShowOurexpert;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ExpertController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\StatistiqueController;
use App\Http\Controllers\admin\ShowOurservice;
use App\Http\Controllers\admin\ServiceController;

// route de admin ====> Show Our clients
Route::get('/ourclients', [ShowOurclient::class, 'index'])->name('ourclients');

// route de admin ====> Show Our experts
Route::get('/experts', [ShowOurexpert::class, 'index'])->name('ourexperts');

Route::get('/ourservices', [ShowOurservice::class, 'index'])->name('ourservices');

/****** Activer et desactiver le compte de client  */
Route::post('/client/{id}/toggle-status', [ClientController::class, 'toggleStatus'])->name('toggleStatus');

/****** Activer et desactiver le compte de expert */
Route::post('/expert/{id}/toggle-status', [ExpertController::class, 'toggleStatus'])->name('toggleExpertStatus');

Route::post('/service/{id}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('toggleStatus');


/* statistique */
Route::get('/dashboard', [StatistiqueController::class, 'index'])->name('dashboard');
/* settings */
Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
Route::put('/settings/email', [SettingsController::class, 'update_email_settings'])->name('email_settings.update');
Route::put('/settings/paypal', [SettingsController::class, 'update_paypal_settings'])->name('paypal_settings.update');
Route::put('/settings/general', [SettingsController::class, 'update_general_settings'])->name('general_settings.update');

//=================================================================================================
Route::post("/logout", [LogoutController::class, "logout"])->name("logout");


