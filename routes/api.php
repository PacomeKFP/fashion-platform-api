<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('styliste', App\Http\Controllers\StylisteController::class);
Route::apiResource('produit', App\Http\Controllers\ProduitController::class);
Route::apiResource('commande', App\Http\Controllers\CommandeController::class);
Route::apiResource('paiement', App\Http\Controllers\PaiementController::class);
Route::apiResource('avis-styliste', App\Http\Controllers\AvisStylisteController::class);
Route::apiResource('avis-client', App\Http\Controllers\AvisClientController::class);


