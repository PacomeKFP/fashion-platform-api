<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LigneCommandeResource extends JsonResource
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
            // 'commande' => new CommandeResource($this->commande),
            'produit' => new ProduitResource($this->produit),
            'quantite' => $this->quantite,

        ];
    }
}
