<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitUploadController extends Controller
{
    public function uploadPhotos(Request $request, $produitId)
    {
        $request->validate([
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $produit = Produit::findOrFail($produitId);
        $photoPaths = [];

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('produits', 'public');
            $photoPaths[] = $path;
        }

        $produit->update([
            'photos' => $photoPaths
        ]);

        return response()->json([
            'message' => 'Photos uploaded successfully',
            'photos' => $photoPaths
        ]);
    }

    public function deletePhoto(Request $request, $produitId)
    {
        $request->validate([
            'photo_path' => 'required|string'
        ]);

        $produit = Produit::findOrFail($produitId);
        
        Storage::disk('public')->delete($request->input('photo_path'));

        $photos = $produit->photos;
        $photos = array_diff($photos, [$request->input('photo_path')]);
        
        $produit->update([
            'photos' => $photos
        ]);

        return response()->json([
            'message' => 'Photo deleted successfully'
        ]);
    }
}