<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\LigneCommandeRequest;
use App\Models\LigneCommande;
use App\Http\Resources\LigneCommandeResource;
use App\Services\LigneCommandeService;
use App\DTO\LigneCommandeDTO;
use Illuminate\Http\Response;

class LigneCommandeController extends Controller
{
    //

    private LigneCommandeService $service;

    public function __construct(LigneCommandeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $lignecommande = $this->service->getAll();
        return LigneCommandeResource::collection($lignecommande);
    }

    public function store(LigneCommandeRequest $request)
    {
        $dto = LigneCommandeDTO::fromRequest($request);
        $lignecommande = $this->service->create($dto);
        return new LigneCommandeResource($lignecommande);
    }

    public function show(LigneCommande $lignecommande)
    {
        return new LigneCommandeResource($lignecommande);
    }

    public function update(LigneCommandeRequest $request, LigneCommande $lignecommande)
    {
        $dto = LigneCommandeDTO::fromRequest($request);
        $updatedLigneCommande = $this->service->update($lignecommande, $dto);
        return new LigneCommandeResource($updatedLigneCommande);
    }

    public function destroy(LigneCommande $lignecommande)
    {
        $this->service->delete($lignecommande);
        return response(null, 204);
    }

}
