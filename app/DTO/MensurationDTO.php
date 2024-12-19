<?php



namespace App\DTO;

use App\Http\Requests\MensurationRequest;
readonly class MensurationDTO
{

    public function __construct(
        public? int $client_id,
 public? string $label,
 public? string $description,
 public? json $mesures,
 public? string $taille,

    ) {}

    public static function fromRequest(MensurationRequest $request): self
    {
        return new self(
            client_id : $request->get('client_id'),
 label : $request->get('label'),
 description : $request->get('description'),
 mesures : $request->get('mesures'),
 taille : $request->get('taille'),

        );
    }
}