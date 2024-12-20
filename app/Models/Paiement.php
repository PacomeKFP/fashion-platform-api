<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $fillable = ['id', 'commande_id', 'montant', 'date_paiement', 'statut_paiement'];

    /** @use HasFactory<\Database\Factories\PaiementFactory> */
    use HasFactory;

    public function commande ()
    {
        return $this->belongsTo(Commande::class);
    }
}
