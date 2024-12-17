<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\ProduitRequest;
use App\Models\Produit;
use App\Http\Resources\ProduitResource;
use App\Services\ProduitService;
use App\DTO\ProduitDTO;
use Illuminate\Http\Response;

class ProduitController extends Controller
{
    //

    private ProduitService $service;

    public function __construct(ProduitService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $produit = $this->service->getAll();
        return ProduitResource::collection($produit);
    }

    public function store(ProduitRequest $request)
    {
        $dto = ProduitDTO::fromRequest($request);
        $produit = $this->service->create($dto);
        return new ProduitResource($produit);
    }

    public function show(Produit $produit)
    {
        return new ProduitResource($produit);
    }

    public function update(ProduitRequest $request, Produit $produit)
    {
        $dto = ProduitDTO::fromRequest($request);
        $updatedProduit = $this->service->update($produit, $dto);
        return new ProduitResource($updatedProduit);
    }

    public function destroy(Produit $produit)
    {
        $this->service->delete($produit);
        return response(null, 204);
    }

}
