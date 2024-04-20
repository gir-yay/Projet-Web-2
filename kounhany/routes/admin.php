<?php

use App\Http\Controllers\auth\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ShowOurclient;
use App\Http\Controllers\admin\ShowOurexpert;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\ExpertController;
use App\Http\Controllers\admin\StatistiqueController;

// route de admin ====> Show Our clients
Route::get('/ourclients', [ShowOurclient::class, 'index'])->name('ourclients');

// route de admin ====> Show Our experts
Route::get('/experts', [ShowOurexpert::class, 'index'])->name('ourexperts');

/****** Activer et desactiver le compte de client  */
Route::post('/client/{id}/toggle-status', [ClientController::class, 'toggleStatus'])->name('toggleStatus');

/****** Activer et desactiver le compte de expert */
Route::post('/expert/{id}/toggle-status', [ExpertController::class, 'toggleStatus'])->name('toggleExpertStatus');

/* statistique */
Route::get('/dashboard', [StatistiqueController::class, 'index'])->name('dashboard');
//=================================================================================================
Route::post("/logout", [LogoutController::class, "logout"])->name("logout");


