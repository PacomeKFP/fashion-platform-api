<?php



namespace App\DTO;

use Carbon\Carbon;
use App\Http\Requests\ProduitRequest;

readonly class ProduitDTO
{

    public function __construct(
        public? int $id,
        public? int $styliste_id,
        public? string $nom,
        public? string $description,
        public? float $prix,
        public? string $categories,
        public? \DateTimeInterface $delai_confection,

    ) {}

    public static function fromRequest(ProduitRequest $request): self
    {
        return new self(
            id : $request->get('id'),
            styliste_id : $request->get('styliste_id'),
            nom : $request->get('nom'),
            description : $request->get('description'),
            prix : $request->get('prix'),
            categories : $request->get('categories'),
            delai_confection : Carbon::parse($request->get('delai_confection')),
        );
    }
}
