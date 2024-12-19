<?php

namespace App\Services;

use App\Models\Photo;
use App\Models\Produit;
use Illuminate\Support\Facades\Storage;

class PhotoService
{
    public function uploadPhoto(Produit $produit, $file, $isPrimary = false)
    {
        $path = $file->store('produits/' . $produit->id, 'public');

        return Photo::create([
            'produit_id' => $produit->id,
            'path' => $path,
            'filename' => $file->getClientOriginalName(),
            'mime_type' => $file->getMimeType(),
            'size' => $file->getSize(),
            'is_primary' => $isPrimary
        ]);
    }

    public function deletePhoto(Photo $photo)
    {
        Storage::disk('public')->delete($photo->path);
        $photo->delete();
    }

    public function setPrimaryPhoto(Photo $photo)
    {
        Photo::where('produit_id', $photo->produit_id)
             ->where('is_primary', true)
             ->update(['is_primary' => false]);

        $photo->update(['is_primary' => true]);
    }
}