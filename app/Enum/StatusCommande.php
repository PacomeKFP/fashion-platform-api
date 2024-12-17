<?php

namespace App\Enum;

enum StatusCommande:string
{
    case EnAttente = 'en attente';
    case EnCours = 'en cours';
    case Termine = 'termine';
}
