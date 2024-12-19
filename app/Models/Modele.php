<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Modele extends Model
{
    protected $fillable = ['categorie_id', 'styliste_id', 'title', 'description', 'intervalPrix',];

    /** @use HasFactory<\Database\Factories\ModeleFactory> */
    use HasFactory;

    public function styliste(): BelongsTo
    {
        return $this->belongsTo(Styliste::class);
    }

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function photos():HasMany
    {
        return $this->hasMany(Photo::class,'forein_id');
    }
}
