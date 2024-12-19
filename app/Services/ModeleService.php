<?php

namespace App\Services;

use App\Models\Modele;
use App\DTO\ModeleDTO;

class ModeleService
{
    public function getAll()
    {
        return Modele::all();
    }

    public function create(ModeleDTO $dto)
    {
        return Modele::create((array) $dto);
    }

    public function find($id)
    {
        return Modele::findOrFail($id);
    }

    public function update(Modele $modele, ModeleDTO $dto)
    {
        $modele->update((array) $dto);
        return $modele;
    }

    public function delete(Modele $modele)
    {
        return $modele->delete();
    }
}