<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\PaiementRequest;
use App\Models\Paiement;
use App\Http\Resources\PaiementResource;
use App\Services\PaiementService;
use App\DTO\PaiementDTO;
use Illuminate\Http\Response;

class PaiementController extends Controller
{
    //

    private PaiementService $service;

    public function __construct(PaiementService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $paiement = $this->service->getAll();
        return PaiementResource::collection($paiement);
    }

    public function store(PaiementRequest $request)
    {
        $dto = PaiementDTO::fromRequest($request);
        $paiement = $this->service->create($dto);
        return new PaiementResource($paiement);
    }

    public function show(Paiement $paiement)
    {
        return new PaiementResource($paiement);
    }

    public function update(PaiementRequest $request, Paiement $paiement)
    {
        $dto = PaiementDTO::fromRequest($request);
        $updatedPaiement = $this->service->update($paiement, $dto);
        return new PaiementResource($updatedPaiement);
    }

    public function destroy(Paiement $paiement)
    {
        $this->service->delete($paiement);
        return response(null, 204);
    }

}
