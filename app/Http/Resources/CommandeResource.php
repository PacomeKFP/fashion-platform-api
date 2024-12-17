<?php

namespace App\Http\Resources;

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
            'user_id' => $this->user_id,
            'produit_id' => $this->produit_id,
            'styliste_id' => $this->styliste_id,
            'statut' => $this->statut,
            'prix_total' => $this->prix_total,
            'date_commande' => $this->date_commande,
            
        ];
    }
}
