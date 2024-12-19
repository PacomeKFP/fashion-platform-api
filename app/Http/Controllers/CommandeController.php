<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\CommandeRequest;
use App\Models\Commande;
use App\Events\CommandeConfirmee;
use App\Events\CommandeMiseAJour;
use App\Events\NouvelleCommandeStyliste;
use App\Http\Resources\CommandeResource;
use App\Services\CommandeService;
use App\DTO\CommandeDTO;
use Illuminate\Http\Response;

class CommandeController extends Controller
{
    //

    private CommandeService $service;

    public function __construct(CommandeService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $commande = $this->service->getAll();
        return CommandeResource::collection($commande);
    }

    public function store(CommandeRequest $request)
    {
        //Log::info('Store method called', $request->all());
        $dto = CommandeDTO::fromRequest($request);
        $commande = $this->service->create($dto);
        event(new CommandeConfirmee($commande));  // events here
        event(new NouvelleCommandeStyliste($commande));
        return new CommandeResource($commande);
    }

    public function show(Commande $commande)
    {
        return new CommandeResource($commande);
    }

    public function update(CommandeRequest $request, Commande $commande)
    {
        $dto = CommandeDTO::fromRequest($request);
        $updatedCommande = $this->service->update($commande, $dto);
        event(new CommandeMiseAJour($updatedCommande)); // event here
        return new CommandeResource($updatedCommande);
    }

    public function destroy(Commande $commande)
    {
        $this->service->delete($commande);
        return response(null, 204);
    }

}
