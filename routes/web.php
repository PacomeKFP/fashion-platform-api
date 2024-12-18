<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitUploadController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::post('/produits/{produitId}/upload-photos', [ProduitUploadController::class, 'uploadPhotos']);
Route::delete('/produits/{produitId}/delete-photo', [ProduitUploadController::class, 'deletePhoto']);