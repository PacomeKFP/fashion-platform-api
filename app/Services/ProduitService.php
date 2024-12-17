<?php

namespace App\Services;

use App\Models\Produit;
use App\DTO\ProduitDTO;

class ProduitService
{
    public function getAll()
    {
        return Produit::all();
    }

    public function create(ProduitDTO $dto)
    {
        return Produit::create((array) $dto);
    }

    public function find($id)
    {
        return Produit::findOrFail($id);
    }

    public function update(Produit $produit, ProduitDTO $dto)
    {
        $produit->update((array) $dto);
        return $produit;
    }

    public function delete(Produit $produit)
    {
        return $produit->delete();
    }
}
