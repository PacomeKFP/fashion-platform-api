<?php

namespace App\Http\Requests;

use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Foundation\Http\FormRequest;

class CommandeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'user_id' => 'integer',
            'produit_id' => 'integer',
            'styliste_id' => 'integer',
            'statut_paiement' => 'required|string|in:en_attente,terminé,en cours',
            'prix_total' => 'required',
            'date_commande' => 'date',

        ];
    }
}
