<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['styliste_id', 'nom', 'description', 'prix', 'categories', 'delai_confection'];

    /** @use HasFactory<\Database\Factories\ProduitFactory> */
    use HasFactory;
}
