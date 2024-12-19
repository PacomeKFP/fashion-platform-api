<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['forein_id', 'path'];

    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory;
}
