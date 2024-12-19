<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'produit_id', 
        'path', 
        'filename', 
        'mime_type', 
        'size', 
        'is_primary'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }

    public function getUrlAttribute()
    {
        return asset('storage/' . $this->path);
    }
}