<?php



namespace App\DTO;

use App\Http\Requests\LigneCommandeRequest;
readonly class LigneCommandeDTO
{

    public function __construct(
        public? int $commande_id,
 public? int $produit_id,
 public? int $quantite,

    ) {}

    public static function fromRequest(LigneCommandeRequest $request): self
    {
        return new self(
            commande_id : $request->get('commande_id'),
 produit_id : $request->get('produit_id'),
 quantite : $request->get('quantite'),

        );
    }
}