<?php



namespace App\DTO;

use DateTime;
use Carbon\Carbon;
use App\Http\Requests\CommandeRequest;

readonly class CommandeDTO
{

    public function __construct(
        public? int $id,
 public? int $user_id,
 public? int $produit_id,
 public? int $styliste_id,
 public? string $statut,
 public? float $prix_total,
 public? \DateTimeInterface $date_commande = null,

    ) {}

    public static function fromRequest(CommandeRequest $request): self
    {
        return new self(
            id : $request->get('id'),
            user_id : $request->get('user_id'),
            produit_id : $request->get('produit_id'),
            styliste_id : $request->get('styliste_id'),
            statut : $request->get('statut'),
            prix_total : $request->get('prix_total'),
            date_commande : $request->has('date_commande') ? Carbon::parse($request->get('date_commande')) : null,

        );
    }
}
