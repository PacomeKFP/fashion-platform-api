<?php

namespace App\Services;

use App\Models\Commande;
use App\DTO\CommandeDTO;

class CommandeService
{
    public function getAll()
    {
        return Commande::all();
    }

    public function create(CommandeDTO $dto)
    {
        return Commande::create((array) $dto);
    }

    public function find($id)
    {
        return Commande::findOrFail($id);
    }

    public function update(Commande $commande, CommandeDTO $dto)
    {
        $commande->update((array) $dto);
        return $commande;
    }

    public function delete(Commande $commande)
    {
        return $commande->delete();
    }
}