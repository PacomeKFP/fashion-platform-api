<?php

namespace App\Services;

use App\Models\AvisStyliste;
use App\DTO\AvisStylisteDTO;

class AvisStylisteService
{
    public function getAll()
    {
        return AvisStyliste::all();
    }

    public function create(AvisStylisteDTO $dto)
    {
        return AvisStyliste::create((array) $dto);
    }

    public function find($id)
    {
        return AvisStyliste::findOrFail($id);
    }

    public function update(AvisStyliste $avisstyliste, AvisStylisteDTO $dto)
    {
        $avisstyliste->update((array) $dto);
        return $avisstyliste;
    }

    public function delete(AvisStyliste $avisstyliste)
    {
        return $avisstyliste->delete();
    }
}