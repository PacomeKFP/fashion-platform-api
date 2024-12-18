<?php
namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitFilterController extends Controller
{
    public function index(Request $request)
    {
        // Requête de base
        $query = Produit::query();

        // Filtrage par catégorie
        if ($request->has('categorie')) {
            $query->where('categorie', $request->input('categorie'));
        }

        // Filtrage par plage de prix
        if ($request->has('prix_min')) {
            $query->where('prix', '>=', $request->input('prix_min'));
        }

        if ($request->has('prix_max')) {
            $query->where('prix', '<=', $request->input('prix_max'));
        }

        // Filtrage par styliste
        if ($request->has('styliste_id')) {
            $query->where('styliste_id', $request->input('styliste_id'));
        }

        // Filtrage par délai de confection
        if ($request->has('delai_min')) {
            $query->where('delai_confection', '>=', $request->input('delai_min'));
        }

        if ($request->has('delai_max')) {
            $query->where('delai_confection', '<=', $request->input('delai_max'));
        }

        // Tri
        if ($request->has('sort')) {
            $sortField = $request->input('sort');
            $sortDirection = $request->input('direction', 'asc');
            
            // Validation des champs de tri
            $allowedFields = ['prix', 'delai_confection', 'created_at'];
            $allowedDirections = ['asc', 'desc'];

            if (in_array($sortField, $allowedFields) && in_array($sortDirection, $allowedDirections)) {
                $query->orderBy($sortField, $sortDirection);
            }
        }

        // Pagination
        $perPage = $request->input('per_page', 10);
        $produits = $query->paginate($perPage);

        return response()->json([
            'data' => $produits->items(),
            'meta' => [
                'current_page' => $produits->currentPage(),
                'total_pages' => $produits->lastPage(),
                'total_items' => $produits->total(),
                'per_page' => $produits->perPage()
            ]
        ]);
    }

    // Méthode pour récupérer les filtres disponibles
    public function getFilterOptions()
    {
        return response()->json([
            'categories' => Produit::distinct('categorie')->pluck('categorie'),
            'prix_range' => [
                'min' => Produit::min('prix'),
                'max' => Produit::max('prix')
            ],
            'delai_range' => [
                'min' => Produit::min('delai_confection'),
                'max' => Produit::max('delai_confection')
            ]
        ]);
    }
}use App\Http\Controllers\ProduitFilterController;

// Ajouter ces lignes à la fin du fichier
Route::get('/produits/filter', [ProduitFilterController::class, 'index']);
Route::get('/produits/filter-options', [ProduitFilterController::class, 'getFilterOptions']);