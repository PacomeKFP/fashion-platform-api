<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitUploadController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::post('/produits/{produitId}/upload-photos', [ProduitUploadController::class, 'uploadPhotos']);
Route::delete('/produits/{produitId}/delete-photo', [ProduitUploadController::class, 'deletePhoto']);

// Add these lines to the existing routes
Route::apiResource('produits.photos', PhotoController::class)
    ->except(['update'])
    ->middleware(['auth']);

Route::post('/photos/{photo}/primary', [PhotoController::class, 'setPrimary'])
    ->middleware(['auth']);