<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\ModeleRequest;
use App\Models\Modele;
use App\Http\Resources\ModeleResource;
use App\Services\ModeleService;
use App\DTO\ModeleDTO;
use Illuminate\Http\Response;

class ModeleController extends Controller
{
    //

    private ModeleService $service;

    public function __construct(ModeleService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $modele = $this->service->getAll();
        return ModeleResource::collection($modele);
    }

    public function store(ModeleRequest $request)
    {
        $dto = ModeleDTO::fromRequest($request);
        $modele = $this->service->create($dto);
        return new ModeleResource($modele);
    }

    public function show(Modele $modele)
    {
        return new ModeleResource($modele);
    }

    public function update(ModeleRequest $request, Modele $modele)
    {
        $dto = ModeleDTO::fromRequest($request);
        $updatedModele = $this->service->update($modele, $dto);
        return new ModeleResource($updatedModele);
    }

    public function destroy(Modele $modele)
    {
        $this->service->delete($modele);
        return response(null, 204);
    }

}
