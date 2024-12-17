<?php

namespace App\Services;

use App\Models\Paiement;
use App\DTO\PaiementDTO;

class PaiementService
{
    public function getAll()
    {
        return Paiement::all();
    }

    public function create(PaiementDTO $dto)
    {
        return Paiement::create((array) $dto);
    }

    public function find($id)
    {
        return Paiement::findOrFail($id);
    }

    public function update(Paiement $paiement, PaiementDTO $dto)
    {
        $paiement->update((array) $dto);
        return $paiement;
    }

    public function delete(Paiement $paiement)
    {
        return $paiement->delete();
    }
}