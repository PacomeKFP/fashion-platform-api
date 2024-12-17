<?php



namespace App\DTO;

use Carbon\Carbon;
use App\Http\Requests\PaiementRequest;

readonly class PaiementDTO
{

    public function __construct(
        public? int $id,
        public? int $commande_id,
        public? float $montant,
        public? \DateTimeInterface $date_paiement,
        public? string $statut_paiement,

    ) {}

    public static function fromRequest(PaiementRequest $request): self
    {
        return new self(
            id : $request->get('id'),
            commande_id : $request->get('commande_id'),
            montant : $request->get('montant'),
            date_paiement : Carbon::parse($request->get('date_paiement')),
            statut_paiement : $request->get('statut_paiement'),

        );
    }
}
