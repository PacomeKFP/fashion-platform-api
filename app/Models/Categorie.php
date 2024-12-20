<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['nom'];

    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;
    public  function produits()
    {
        return $this->hasMany(Produit::class);
    }

    public function modeles_stylistes()
    {
        return $this->hasMany(Modele::class);
    }
}
