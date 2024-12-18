<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Styliste extends Model
{
    protected $fillable = ['user_id', 'biographie', 'specialite', 'disponibilite', 'note_moyenne'];

    /** @use HasFactory<\Database\Factories\StylisteFactory> */
    use HasFactory;
}