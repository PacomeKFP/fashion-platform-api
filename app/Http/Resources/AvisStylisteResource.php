<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AvisStylisteResource extends JsonResource
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
            'note' => $this->note,
            'commentaire' => $this->commentaire,
            'user' =>new UserResource( $this->user),
            'styliste' => new StylisteResource($this->styliste),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
