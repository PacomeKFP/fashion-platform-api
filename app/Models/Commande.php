<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $dispatchesEvents = [
        'updated' => \App\Events\CommandeConfirmee::class,
        'updated' => \App\Events\NouvelleCommandeStyliste::class,
        'updated' => \App\Events\CommandeMiseAJour::class,
    ];

    protected $fillable = ['id', 'user_id', 'produit_id', 'styliste_id', 'statut', 'prix_total', 'date_commande'];

    /** @use HasFactory<\Database\Factories\CommandeFactory> */
    use HasFactory;
}
