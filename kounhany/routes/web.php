<?php

use App\Http\Controllers\auth\HomeController;
use App\Http\Controllers\auth\LoginAdminController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientProfileController;
use App\Http\Controllers\OurServicesController;
use App\Http\Controllers\ExperdetailtController;
use App\Http\Controllers\ExpertAvisController;

use App\Http\Controllers\ClientDemandeController;
use App\Http\Controllers\DemandesClientController;
use App\Http\Controllers\ClientCommentsController;
use App\Models\CommentairesSurClient;
use App\Models\CommentairesSurExpert;
use App\Models\DemandesClient;

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

Route::get('/', [HomeController::class, "index"])->name("home");

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


// contact
Route::post('/contact', [HomeController::class, "contact"])->name("contact");
Route::get('/services/searchByRating', [OurServicesController::class, 'searchByRating'])->name('searchByRating');
Route::get('/services/searchByPrice', [OurServicesController::class, 'searchByPrice'])->name('searchByPrice');
Route::get('/services/searchByCity', [OurServicesController::class, 'searchByCity'])->name('searchByCity');
//=================================================================================================
// services

//Route::get('/services', function () {return view('user.client.services');})->name('services');
Route::get('/services', [OurServicesController::class, 'showServices'])->name('services');
Route::get('/services/categorie/{cat}/filtre', [OurServicesController::class, 'filtreParCat'])->name('catFiltre');

/***  Auth Routes  ********/ //
Route::prefix("client")->name("client.")->middleware("auth:web")->group(function () {
    // url: http://localhost:8080/client/dashboard
    Route::get("/dashboard", function () {
        $demandes = DemandesClient::where("client_id", auth()->user()->id)->count();
        $ratings = CommentairesSurClient::where("client_id", auth()->user()->id)->avg("note") ?? 0;
        $comments = CommentairesSurExpert::where("client_id", auth()->user()->id)->count();
        return view("user.client.dashboard", compact("demandes", "ratings", "comments"));
    })->name("dashboard");
    Route::get('/profile', [ClientProfileController::class, 'show'])->name('profile');
    Route::get('/demande', [ClientDemandeController::class, 'show'])->name('demande_client');

    Route::post("/logout", [LogoutController::class, "logout"])->name("logout");
    Route::get('/profile/{client}/edit', [ClientProfileController::class, "sdk_edit_client"])->name("sdk_edit_client");
    Route::put('/profile/{client}', [ClientProfileController::class, "sdk_update_client"])->name("sdk_stockupdatec");

    Route::post('/demandes-client', [DemandesClientController::class, 'store'])->name('demandes-client.store');


    Route::post('commentaires-sur-expert', [ClientCommentsController::class, 'store'])->name('commentaires-sur-expert.store');

    Route::get('/avis', [ExpertAvisController::class, 'index'])->name('avis.index');




});
Route::get('/expert-detail/{expertId}/{serviceId}', [ExperdetailtController::class, 'showExpertDetails'])->name('expert-detail');


/*************** plus d info sur un expert ..  ****************/
/** route pour envoi d email ( quand le client clique demander ) */

