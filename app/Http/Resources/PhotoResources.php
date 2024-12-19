<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'filename' => $this->filename,
            'url' => $this->url,
            'mime_type' => $this->mime_type,
            'size' => $this->size,
            'is_primary' => $this->is_primary,
            'uploaded_at' => $this->created_at,
        ];
    }
}