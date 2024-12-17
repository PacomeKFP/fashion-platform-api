<?php



namespace App\DTO;

use App\Http\Requests\AvisStylisteRequest;
readonly class AvisStylisteDTO
{

    public function __construct(
        public? int $id,
 public? int $produit_id,
 public? int $user_id,
 public? int $note,
 public? string $commentaire,

    ) {}

    public static function fromRequest(AvisStylisteRequest $request): self
    {
        return new self(
            id : $request->get('id'),
 produit_id : $request->get('produit_id'),
 user_id : $request->get('user_id'),
 note : $request->get('note'),
 commentaire : $request->get('commentaire'),

        );
    }
}