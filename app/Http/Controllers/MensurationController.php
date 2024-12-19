<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\MensurationRequest;
use App\Models\Mensuration;
use App\Http\Resources\MensurationResource;
use App\Services\MensurationService;
use App\DTO\MensurationDTO;
use Illuminate\Http\Response;

class MensurationController extends Controller
{
    //

    private MensurationService $service;

    public function __construct(MensurationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $mensuration = $this->service->getAll();
        return MensurationResource::collection($mensuration);
    }

    public function store(MensurationRequest $request)
    {
        $dto = MensurationDTO::fromRequest($request);
        $mensuration = $this->service->create($dto);
        return new MensurationResource($mensuration);
    }

    public function show(Mensuration $mensuration)
    {
        return new MensurationResource($mensuration);
    }

    public function update(MensurationRequest $request, Mensuration $mensuration)
    {
        $dto = MensurationDTO::fromRequest($request);
        $updatedMensuration = $this->service->update($mensuration, $dto);
        return new MensurationResource($updatedMensuration);
    }

    public function destroy(Mensuration $mensuration)
    {
        $this->service->delete($mensuration);
        return response(null, 204);
    }

}
