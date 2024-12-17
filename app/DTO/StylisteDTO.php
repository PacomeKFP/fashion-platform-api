<?php



namespace App\DTO;

use App\Http\Requests\StylisteRequest;
readonly class StylisteDTO
{

    public function __construct(
        public? int $user_id,
        public? string $biographie,
        public? string $specialite,
        public? string $disponibilite,
        public? float $note_moyenne,

    ) {}

    public static function fromRequest(StylisteRequest $request): self
    {
        return new self(
            user_id : $request->get('user_id'),
            biographie : $request->get('biographie'),
            specialite : $request->get('specialite'),
            disponibilite : $request->get('disponibilite'),
            note_moyenne : $request->get('note_moyenne'),

        );
    }
}
