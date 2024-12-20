<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AvisStyliste extends Model
{
    protected $fillable = ['id', 'styliste_id', 'user_id', 'note', 'commentaire'];

    /** @use HasFactory<\Database\Factories\AvisStylisteFactory> */
    use HasFactory;

    public function styliste():BelongsTo
    {
        return $this->belongsTo(Styliste::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
