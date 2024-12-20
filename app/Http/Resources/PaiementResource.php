<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaiementResource extends JsonResource
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
            'commande' =>new CommandeResource($this->commande),
            'montant' => $this->montant,
            'date_paiement' => $this->date_paiement,
            'statut_paiement' => $this->statut_paiement,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
