<?php



namespace App\DTO;

use App\Http\Requests\CategorieRequest;
readonly class CategorieDTO
{

    public function __construct(
        public? string $nom,

    ) {}

    public static function fromRequest(CategorieRequest $request): self
    {
        return new self(
            nom : $request->get('nom'),

        );
    }
}