<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\collaborateurController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\SocieteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FamilleController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\InfoDepotController;
use App\Http\Controllers\PivotFournisseurArticleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UniteAchatVenteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Route société
Route::prefix("societe")->group(function () {
    Route::post('create', [SocieteController::class, 'store']);
    Route::get('read', [SocieteController::class, 'getSociete']);
    Route::put('update/{id}', [SocieteController::class, 'updateSociete']);
    Route::delete('delete/{id}', [SocieteController::class, 'supprimer']);
});


//  Route FAMILLE
Route::prefix("famille")->group(function () {
    Route::post('/create', [FamilleController::class, 'store']);
    Route::get('/read', [FamilleController::class, 'getFamille']);
    Route::put('/update/{id}', [FamilleController::class, 'updateFamille']);
    Route::delete('/delete/{id}', [FamilleController::class, 'supprimer']);
    Route::get('findnom/{nom}', [FamilleController::class, 'findByName']);
    Route::get('find/{id}', [FamilleController::class, 'findByid']);
    Route::get('list-articles/{id}', [FamilleController::class, 'getArticlesByFamille']);
    Route::get('/count', [FamilleController::class, 'countFamilles']);
});




// //Route Fournisseur
Route::prefix("fournisseur")->group(function () {
    Route::post('create', [FournisseurController::class, 'store']);
    Route::get('read', [FournisseurController::class, 'getFournisseur']);
    Route::put('update/{id}', [FournisseurController::class, 'updateFournisseur']);
    Route::delete('delete/{id}', [FournisseurController::class, 'supprimer']);
    Route::get('findnom/{nom}', [FournisseurController::class, 'findByName']);
    Route::get('find/{id}', [FournisseurController::class, 'findByid']);
    Route::get('/count', [FournisseurController::class, 'countFournisseur']);
});


//Route pour Depot
Route::prefix("depot")->group(function () {
    Route::post('create', [DepotController::class, 'store']);
    Route::get('read', [DepotController::class, 'getdepot']);
    Route::put('update/{id}', [DepotController::class, 'updatedepot']);
    Route::delete('delete/{id}', [DepotController::class, 'supprimer']);
    Route::get('findnom/{nom}', [DepotController::class, 'findByName']);
    Route::get('find/{id}', [DepotController::class, 'findByid']);

});


// //Route pour informations_depot
// Route::prefix("info-depot")->group(function () {
//     Route::post('create', [InfoDepotController::class, 'store']);
//     Route::get('read', [InfoDepotController::class, 'getdepot']);
//     Route::put('update/{id}', [InfoDepotController::class, 'updatedepot']);
//     Route::delete('delete/{id}', [InfoDepotController::class, 'supprimer']);
//     Route::get('findnom/{nom}', [InfoDepotController::class, 'findByName']);
//     Route::get('find/{id}', [InfoDepotController::class, 'findByid']);

// });


//Route pour Service
Route::prefix("service")->group(function () {
    Route::post('create', [ServiceController::class, 'store']);
    Route::get('read', [ServiceController::class, 'getservice']);
    Route::put('update/{id}', [ServiceController::class, 'updateservice']);
    Route::delete('delete/{id}', [ServiceController::class, 'supprimer']);
    Route::get('find/{id}', [ServiceController::class, 'findByid']);
});



//Route pour les articles
Route::prefix("article")->group(function () {
    Route::post('create', [ArticleController::class, 'store']);
    Route::get('read', [ArticleController::class, 'getarticle']);
    Route::put('update/{id}', [ArticleController::class, 'updatearticle']);
    Route::delete('delete/{id}', [ArticleController::class, 'supprimer']);
    Route::get('findnom/{nom}', [ArticleController::class, 'findByName']);
    Route::get('find/{id}', [ArticleController::class, 'findByid']);
    Route::get('/count', [ArticleController::class, 'countFournisseur']);

});



//Route pour Collaborateur
Route::prefix("collaborateurs")->group(function () {
    Route::post('create', [collaborateurController::class, 'store']);
    Route::get('read', [collaborateurController::class, 'getcollaborateurs']);
    Route::put('update/{id}', [collaborateurController::class, 'updatecollaborateurs']);
    Route::delete('delete/{id}', [collaborateurController::class, 'supprimer']);
    Route::get('findnom/{nom}', [collaborateurController::class, 'findByName']);
    Route::get('find/{id}', [collaborateurController::class, 'findByid']);
});




//Route pour unite_achat_vente
    Route::prefix("UAV")->group(function(){
        Route::post('create', [UniteAchatVenteController::class, 'store']);
        Route::get('read', [UniteAchatVenteController::class, 'getuniteAchatVente']);
        Route::put('update/{id}', [UniteAchatVenteController::class, 'updateuniteAchatVente']);
        Route::delete('delete/{id}', [UniteAchatVenteController::class, 'supprimer']);
        Route::get('find/{id}', [collaborateurController::class, 'findByid']);

        });



        //Route pour pivot_fournisseur_article
    Route::prefix("pivot")->group(function(){
        // Route::post('create', [UniteAchatVenteController::class, 'store']);
        Route::get('read', [PivotFournisseurArticleController::class, 'index']);
        // Route::put('update/{id}', [UniteAchatVenteController::class, 'updateuniteAchatVente']);
        // Route::delete('delete/{id}', [UniteAchatVenteController::class, 'supprimer']);

        });



// //Route client
Route::prefix("client")->group(function () {
    Route::post('create', [ClientController::class, 'store']);
    Route::get('read', [ClientController::class, 'getClient']);
    Route::put('update/{id}', [ClientController::class, 'updateClient']);
    Route::delete('delete/{id}', [ClientController::class, 'supprimer']);
    Route::get('findnom/{nom}', [ClientController::class, 'findByName']);
    Route::get('find/{id}', [ClientController::class, 'findByid']);
    Route::get('/count', [ClientController::class, 'countFournisseur']);

});
