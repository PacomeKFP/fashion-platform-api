<?php

namespace App\Services;

use App\Models\Categorie;
use App\DTO\CategorieDTO;

class CategorieService
{
    public function getAll()
    {
        return Categorie::all();
    }

    public function create(CategorieDTO $dto)
    {
        return Categorie::create((array) $dto);
    }

    public function find($id)
    {
        return Categorie::findOrFail($id);
    }

    public function update(Categorie $categorie, CategorieDTO $dto)
    {
        $categorie->update((array) $dto);
        return $categorie;
    }

    public function delete(Categorie $categorie)
    {
        return $categorie->delete();
    }
}