<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MensurationResource extends JsonResource
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
            'label' => $this->label,
            'description' => $this->description,
            'mesures' => $this->mesures,
            'taille' => $this->taille,
            'user'=> new UserResource($this->user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
