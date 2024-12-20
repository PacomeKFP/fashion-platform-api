<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StylisteResource extends JsonResource
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
            'biographie' => $this->biographie,
            'specialite' => $this->specialite,
            'disponibilite' => $this->disponibilite,
            'note_moyenne' => $this->note_moyenne,
            'user' => new UserResource($this->user),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at

        ];
    }
}
