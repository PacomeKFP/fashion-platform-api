<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\StylisteRequest;
use App\Models\Styliste;
use App\Http\Resources\StylisteResource;
use App\Services\StylisteService;
use App\DTO\StylisteDTO;
use Illuminate\Http\Response;

class StylisteController extends Controller
{
    //

    private StylisteService $service;

    public function __construct(StylisteService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $styliste = $this->service->getAll();
        return StylisteResource::collection($styliste);
    }

    public function store(StylisteRequest $request)
    {
        $dto = StylisteDTO::fromRequest($request);
        $styliste = $this->service->create($dto);
        return new StylisteResource($styliste);
    }

    public function show(Styliste $styliste)
    {
        return new StylisteResource($styliste);
    }

    public function update(StylisteRequest $request, Styliste $styliste)
    {
        $dto = StylisteDTO::fromRequest($request);
        $updatedStyliste = $this->service->update($styliste, $dto);
        return new StylisteResource($updatedStyliste);
    }

    public function destroy(Styliste $styliste)
    {
        try {
            $this->service->delete($styliste);
            return response($styliste, 204);
        } catch (\Throwable $th) {
            throw $th;
        }

    }

}
