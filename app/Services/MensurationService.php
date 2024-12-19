<?php

namespace App\Services;

use App\Models\Mensuration;
use App\DTO\MensurationDTO;

class MensurationService
{
    public function getAll()
    {
        return Mensuration::all();
    }

    public function create(MensurationDTO $dto)
    {
        return Mensuration::create((array) $dto);
    }

    public function find($id)
    {
        return Mensuration::findOrFail($id);
    }

    public function update(Mensuration $mensuration, MensurationDTO $dto)
    {
        $mensuration->update((array) $dto);
        return $mensuration;
    }

    public function delete(Mensuration $mensuration)
    {
        return $mensuration->delete();
    }
}