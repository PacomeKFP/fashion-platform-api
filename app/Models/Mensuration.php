<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensuration extends Model
{
    protected $fillable = ['client_id', 'label', 'description', 'mesures', 'taille'];

    /** @use HasFactory<\Database\Factories\MensurationFactory> */
    use HasFactory;
}
