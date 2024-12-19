<?php

namespace App\Services;

use App\Models\Photo;
use App\DTO\PhotoDTO;

class PhotoService
{
    public function getAll()
    {
        return Photo::all();
    }

    public function create(PhotoDTO $dto)
    {
        return Photo::create((array) $dto);
    }

    public function find($id)
    {
        return Photo::findOrFail($id);
    }

    public function update(Photo $photo, PhotoDTO $dto)
    {
        $photo->update((array) $dto);
        return $photo;
    }

    public function delete(Photo $photo)
    {
        return $photo->delete();
    }
}