<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Photo;
use App\Http\Resources\PhotoResource;
use App\Services\PhotoService;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    protected $photoService;

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function index(Produit $produit)
    {
        $this->authorize('viewAny', Photo::class);
        return PhotoResource::collection($produit->photos);
    }

    public function store(Request $request, Produit $produit)
    {
        $this->authorize('create', [Photo::class, $produit]);

        $request->validate([
            'photo' => 'required|image|max:5120'
        ]);

        $photo = $this->photoService->uploadPhoto(
            $produit, 
            $request->file('photo'), 
            $request->boolean('is_primary', false)
        );

        return new PhotoResource($photo);
    }

    public function destroy(Photo $photo)
    {
        $this->authorize('delete', $photo);

        $this->photoService->deletePhoto($photo);

        return response()->json(['message' => 'Photo deleted successfully']);
    }

    public function setPrimary(Photo $photo)
    {
        $this->authorize('update', $photo);

        $this->photoService->setPrimaryPhoto($photo);

        return new PhotoResource($photo);
    }
}