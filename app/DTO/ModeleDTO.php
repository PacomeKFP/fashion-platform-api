<?php



namespace App\DTO;

use App\Http\Requests\ModeleRequest;
readonly class ModeleDTO
{

    public function __construct(
        public? int $categorie_id,
        public? int $styliste_id,
        public? string $title,
        public? string $description,
        public? string $intervalPrix,

    ) {}

    public static function fromRequest(ModeleRequest $request): self
    {
        return new self(
            categorie_id : $request->get('categorie_id'),
            styliste_id : $request->get('styliste_id'),
            title : $request->get('title'),
            description : $request->get('description'),
            intervalPrix : $request->get('intervalPrix'),

        );
    }
}
