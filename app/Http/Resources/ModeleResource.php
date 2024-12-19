<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ModeleResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'intervalPrix' => $this->intervalPrix,
            'categorie' => new CategorieResource($this->categorie),
            'styliste'=> new StylisteResource($this->styliste),
            'pictures' => PhotoResource::collection($this->photos)

        ];
    }
}
