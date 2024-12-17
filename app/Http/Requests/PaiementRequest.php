<?php

namespace App\Http\Requests;

use App\Enum\StatutPaiement;
use Illuminate\Foundation\Http\FormRequest;

class PaiementRequest extends FormRequest
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
            'commande_id' => 'integer',
            'montant' => 'numeric',
            'date_paiement' => 'date',
            'statut_paiement' => 'required|string|in:en_attente,terminé,echec',



        ];
    }
}
