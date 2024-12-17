<?php

namespace App\Enum;

enum StatutPaiement: string
{
    case EnAttente = 'en_attente';
    case Termine = 'terminé';
    case Echec = 'echec';

}
