<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisStyliste extends Model
{
    protected $fillable = ['id', 'produit_id', 'user_id', 'note', 'commentaire'];

    /** @use HasFactory<\Database\Factories\AvisStylisteFactory> */
    use HasFactory;
}
