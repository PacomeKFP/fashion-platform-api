<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produit extends Model
{
    protected $fillable = ['mensuration_id','modele_id','styliste_id', 'nom', 'description', 'prix', 'categorie_id', 'delai_confection'];

    /** @use HasFactory<\Database\Factories\ProduitFactory> */
    use HasFactory;

    public function mensuration():BelongsTo
    {
        return $this->belongsTo(Mensuration::class);
    }

    public function commandes(): BelongsToMany
    {
        return $this->belongsToMany(Commande::class, 'commande_produit', 'produit_id', 'commande_id')
                    ->withPivot('quantite')
                    ->as('pivot')
                    ->withTimestamps();
    }

    public function photos():HasMany
    {
        return $this->hasMany(Photo::class,'forein_id');
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function styliste():BelongsTo
    {
        return $this->belongsTo(Styliste::class);
    }

    public function modele():BelongsTo
    {
        return $this->belongsTo(Modele::class);
    }
}
