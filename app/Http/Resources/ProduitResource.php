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
            'nom' => $this->nom,
            'description' => $this->description,
            'prix' => $this->prix,
            'categories' => [
                'id' => $this->categorie->id,
                'nom' => $this->categorie->nom,
                ],
            'delai_confection' => $this->delai_confection,
            'styliste' => new StylisteResource($this->styliste),
            'mensuration'=> new MensurationResource($this->mensuration),
            'modele'=> [
                'id' => $this->modele->id,
                'title' => $this->modele->title,
                'description' => $this->modele->description,
                'intervalPrix' => $this->modele->intervalPrix,
                'pictures' => PhotoResource::collection($this->modele->photos),
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
