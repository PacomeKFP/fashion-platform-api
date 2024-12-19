<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\CategorieRequest;
use App\Models\Categorie;
use App\Http\Resources\CategorieResource;
use App\Services\CategorieService;
use App\DTO\CategorieDTO;
use Illuminate\Http\Response;

class CategorieController extends Controller
{
    //

    private CategorieService $service;

    public function __construct(CategorieService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $categorie = $this->service->getAll();
        return CategorieResource::collection($categorie);
    }

    public function store(CategorieRequest $request)
    {
        $dto = CategorieDTO::fromRequest($request);
        $categorie = $this->service->create($dto);
        return new CategorieResource($categorie);
    }

    public function show(Categorie $categorie)
    {
        return new CategorieResource($categorie);
    }

    public function update(CategorieRequest $request, Categorie $categorie)
    {
        $dto = CategorieDTO::fromRequest($request);
        $updatedCategorie = $this->service->update($categorie, $dto);
        return new CategorieResource($updatedCategorie);
    }

    public function destroy(Categorie $categorie)
    {
        $this->service->delete($categorie);
        return response(null, 204);
    }

}
