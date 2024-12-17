<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\AvisClientRequest;
use App\Models\AvisClient;
use App\Http\Resources\AvisClientResource;
use App\Services\AvisClientService;
use App\DTO\AvisClientDTO;
use Illuminate\Http\Response;

class AvisClientController extends Controller
{
    //

    private AvisClientService $service;

    public function __construct(AvisClientService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $avisclient = $this->service->getAll();
        return AvisClientResource::collection($avisclient);
    }

    public function store(AvisClientRequest $request)
    {
        $dto = AvisClientDTO::fromRequest($request);
        $avisclient = $this->service->create($dto);
        return new AvisClientResource($avisclient);
    }

    public function show(AvisClient $avisclient)
    {
        return new AvisClientResource($avisclient);
    }

    public function update(AvisClientRequest $request, AvisClient $avisclient)
    {
        $dto = AvisClientDTO::fromRequest($request);
        $updatedAvisClient = $this->service->update($avisclient, $dto);
        return new AvisClientResource($updatedAvisClient);
    }

    public function destroy(AvisClient $avisclient)
    {
        $this->service->delete($avisclient);
        return response(null, 204);
    }

}
