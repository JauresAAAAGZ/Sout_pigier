<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEtudiantRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Matricule'=> 'required|unique:etudiants|min:3|max:100',
            'Nom' => 'required|min:3|max:100',
            'Prenom' => 'required|min:3|max:100',
            'Niveau_Etude' => 'required', 
            'Date_Naissance' => 'required', 
            'Lieu_Naissance' => 'required'
        ];
    }
}
