<?php

namespace App\Http\Resources;

use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'statut' => $this->statut,
            'prix_total' => $this->prix_total,
            'date_commande' => $this->date_commande,
            'user' => new UserResource( $this->user),
            'styliste' =>new StylisteResource($this->styliste),
            // 'produits'=>ProduitResource::collection($this->produits),
            'produits' => $this->produits->map(function ($produit) {
                return [
                    'id' => $produit->id,
                    'nom' => $produit->nom,
                    'prix' => $produit->prix,
                    'quantite' => $produit->pivot->quantite,
                    'total' => $produit->pivot->quantite * $produit->prix,
                    'categories' => $produit->categories,
                    'delai_confection' => $produit->delai_confection,
                    'mensuration'=> new MensurationResource($produit->mensuration),
                ];
            }),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
