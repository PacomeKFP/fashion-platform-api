<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Photo;
use App\Models\Produit;

class PhotoPolicy
{
    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Photo $photo)
    {
        return true;
    }

    public function create(User $user, Produit $produit)
    {
        return $user->id === $produit->styliste_id || $user->hasRole('admin');
    }

    public function update(User $user, Photo $photo)
    {
        return $user->id === $photo->produit->styliste_id || $user->hasRole('admin');
    }

    public function delete(User $user, Photo $photo)
    {
        return $user->id === $photo->produit->styliste_id || $user->hasRole('admin');
    }
}