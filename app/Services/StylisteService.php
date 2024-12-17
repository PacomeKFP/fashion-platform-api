<?php

namespace App\Services;

use App\Models\Styliste;
use App\DTO\StylisteDTO;

class StylisteService
{
    public function getAll()
    {
        return Styliste::all();
    }

    public function create(StylisteDTO $dto)
    {
        return Styliste::create((array) $dto);
    }

    public function find($id)
    {
        return Styliste::findOrFail($id);
    }

    public function update(Styliste $model, StylisteDTO $dto)
    {
        $model->update((array) $dto);
        return $model;
    }

    public function delete(Styliste $model)
    {
        return $model->delete();
    }
}