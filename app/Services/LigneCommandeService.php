<?php

namespace App\Services;

use App\Models\LigneCommande;
use App\DTO\LigneCommandeDTO;

class LigneCommandeService
{
    public function getAll()
    {
        return LigneCommande::all();
    }

    public function create(LigneCommandeDTO $dto)
    {
        return LigneCommande::create((array) $dto);
    }

    public function find($id)
    {
        return LigneCommande::findOrFail($id);
    }

    public function update(LigneCommande $lignecommande, LigneCommandeDTO $dto)
    {
        $lignecommande->update((array) $dto);
        return $lignecommande;
    }

    public function delete(LigneCommande $lignecommande)
    {
        return $lignecommande->delete();
    }
}