<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
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
            'styliste_id' => $this->styliste_id,
            'nom' => $this->nom,
            'description' => $this->description,
            'prix' => $this->prix,
            'categories' => $this->categories,
            'delai_confection' => $this->delai_confection,
            
        ];
    }
}
