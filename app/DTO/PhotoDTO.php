<?php



namespace App\DTO;

use App\Http\Requests\PhotoRequest;
readonly class PhotoDTO
{

    public function __construct(
        public? int $forein_id,
 public? string $path,

    ) {}

    public static function fromRequest(PhotoRequest $request): self
    {
        return new self(
            forein_id : $request->get('forein_id'),
 path : $request->get('path'),

        );
    }
}