<?php

use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\expert\AvisController;
use App\Http\Controllers\expert\DemandesController;
use App\Http\Controllers\ExpertCommentsController;
use App\Http\Controllers\expert\DomainesController;
use App\Http\Controllers\expert\ExpertProfileController;
use App\Http\Controllers\expert\PaymentController;
use Illuminate\Support\Facades\Route;

use App\Models\CommentairesSurClient;
use App\Models\CommentairesSurExpert;
use App\Models\DemandesClient;
use App\Models\ServiceExpert;
use Illuminate\Support\Facades\DB;

/// url: http://localhost:8080/expert/dashboard
Route::get("/dashboard", function(){

    $demandes = DemandesClient::where("expert_id", auth()->user()->id)->count();
    $totalDemandesT = DemandesClient::where('etat', 'traitee')->count();
    $totalDemandesNT = DemandesClient::where('etat', 'non_traitee')->count();
    $earnings = DemandesClient::where("expert_id", auth()->user()->id)->sum(DB::raw("total * duree"));
    $ratings = CommentairesSurExpert::where("expert_id", auth()->user()->id)->avg("note") ?? 0;
    $comments = CommentairesSurClient::where("expert_id", auth()->user()->id)->count();
    $avis = CommentairesSurExpert::where("expert_id", auth()->user()->id)->count();

    $services = ServiceExpert::where("expert_id", auth()->user()->id)->count();

    return view("expert.dashboard", compact("demandes", "earnings", "ratings", "comments", "avis", "services"));
})->name("dashboard");

Route::get('/profile', [ExpertProfileController::class, 'show'])->name('profile');
Route::put('/profile/update', [ExpertProfileController::class, 'update_profile'])->name('profile.update');
Route::put('/profile/update_password', [ExpertProfileController::class, 'update_password'])->name('password.update');

//demandes
Route::get('/demandes', [DemandesController::class, 'index'])->name('demandes.index');
Route::put('/demandes/{id}', [DemandesController::class, 'process'])->name('demande.process');

Route::get('/demandes_treated', [DemandesController::class, 'index_treated'])->name('demandes.index_treated');


// domaines
Route::get('/domaines', [DomainesController::class, 'index'])->name('domaines.index');
Route::get('/domaines/create', [DomainesController::class, 'create'])->name('domaines.create');
Route::post('/domaines', [DomainesController::class, 'store'])->name('domaines.store');

Route::get('/domaines/edit/{id}', [DomainesController::class, 'edit'])->name('domaines.edit');
Route::put('/domaines/switch/{id}', [DomainesController::class, 'switch_status'])->name('domaines.switch');
Route::put('/domaines/{id}', [DomainesController::class, 'update'])->name('domaines.update');



// Avis
Route::get('/avis', [AvisController::class, 'index'])->name('avis.index');

// Payment
Route::get('/paiement', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/paiement/paypal', [PaymentController::class, 'payer_paypal'])->name('payment.paypal');
Route::get('paypal/success', [PaymentController::class, 'success_paypal'])->name('paiement.success');

Route::post("/logout", [LogoutController::class, "logout"])->name("logout");

//commentaires
Route::post('commentaires-sur-client', [ExpertCommentsController::class, 'store'])->name('commentaires-sur-client.store');