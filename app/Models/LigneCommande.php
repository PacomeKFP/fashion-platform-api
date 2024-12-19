<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LigneCommande extends Model
{
    protected $fillable = ['commande_id', 'produit_id', 'quantite'];
    protected $table = 'commande_produit';
    /** @use HasFactory<\Database\Factories\LigneCommandeFactory> */
    use HasFactory;

    public function commande(): BelongsTo
    {
        return $this->belongsTo(Commande::class);
    }

    public function produit(): BelongsTo
    {
        return $this->belongsTo(Produit::class);
    }
}
