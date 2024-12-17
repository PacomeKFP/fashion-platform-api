<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\AvisStylisteRequest;
use App\Models\AvisStyliste;
use App\Http\Resources\AvisStylisteResource;
use App\Services\AvisStylisteService;
use App\DTO\AvisStylisteDTO;
use Illuminate\Http\Response;

class AvisStylisteController extends Controller
{
    //

    private AvisStylisteService $service;

    public function __construct(AvisStylisteService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $avisstyliste = $this->service->getAll();
        return AvisStylisteResource::collection($avisstyliste);
    }

    public function store(AvisStylisteRequest $request)
    {
        $dto = AvisStylisteDTO::fromRequest($request);
        $avisstyliste = $this->service->create($dto);
        return new AvisStylisteResource($avisstyliste);
    }

    public function show(AvisStyliste $avisstyliste)
    {
        return new AvisStylisteResource($avisstyliste);
    }

    public function update(AvisStylisteRequest $request, AvisStyliste $avisstyliste)
    {
        $dto = AvisStylisteDTO::fromRequest($request);
        $updatedAvisStyliste = $this->service->update($avisstyliste, $dto);
        return new AvisStylisteResource($updatedAvisStyliste);
    }

    public function destroy(AvisStyliste $avisstyliste)
    {
        $this->service->delete($avisstyliste);
        return response(null, 204);
    }

}
