<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Styliste;

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

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function styliste()
    {
        return $this->belongsTo(User::class, "styliste_id", "id");
    }


}
