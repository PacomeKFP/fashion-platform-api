<?php

namespace App\Services;

use App\Models\AvisClient;
use App\DTO\AvisClientDTO;

class AvisClientService
{
    public function getAll()
    {
        return AvisClient::all();
    }

    public function create(AvisClientDTO $dto)
    {
        return AvisClient::create((array) $dto);
    }

    public function find($id)
    {
        return AvisClient::findOrFail($id);
    }

    public function update(AvisClient $avisclient, AvisClientDTO $dto)
    {
        $avisclient->update((array) $dto);
        return $avisclient;
    }

    public function delete(AvisClient $avisclient)
    {
        return $avisclient->delete();
    }
}