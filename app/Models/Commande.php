<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Styliste;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Commande extends Model
{
    protected $dispatchesEvents = [
        'updated' => \App\Events\CommandeConfirmee::class,
        'updated' => \App\Events\NouvelleCommandeStyliste::class,
        'updated' => \App\Events\CommandeMiseAJour::class,
    ];

    protected $fillable = ['user_id', 'produit_id', 'styliste_id', 'statut', 'prix_total', 'date_commande'];

    /** @use HasFactory<\Database\Factories\CommandeFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function styliste()
    {
        return $this->belongsTo(Styliste::class);
    }

    public function produits(): BelongsToMany
    {
        return $this->belongsToMany(Produit::class, 'commande_produit', 'commande_id', 'produit_id')
                    ->withPivot('quantite')
                    ->as('pivot')
                    ->withTimestamps();
    }




}
