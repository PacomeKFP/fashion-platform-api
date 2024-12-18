<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = [
        'styliste_id', 
        'nom', 
        'description', 
        'prix', 
        'categorie', 
        'delai_confection', 
        'photos'
    ];

    protected $casts = [
        'photos' => 'array'
    ];

    public function styliste()
    {
        return $this->belongsTo(Styliste::class);
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}