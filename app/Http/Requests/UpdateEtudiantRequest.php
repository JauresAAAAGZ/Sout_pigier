<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEtudiantRequest extends FormRequest
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
            'Matricule'=> 'required|min:3|max:100',
            'Nom' => 'required|min:3|max:100',
            'Prenom' => 'required|min:3|max:100',
            'Niveau_Etude' => 'required|min:6', 
            'Date_Naissance' => [
                'required',
                'date', // Assurez-vous que c'est une date valide
                function ($attribute, $value, $fail) {
                    // Vérifiez la cohérence de la date de naissance ici
                    $dateDeNaissance = \Carbon\Carbon::parse($value);
                    $aujourdhui = \Carbon\Carbon::now();
                    $ageMaximum = 80; // Âge maximum autorisé
                    $ageMinimum=16; // âge minimum autorisé
                    if ($dateDeNaissance->diffInYears($aujourdhui) > $ageMaximum) {
                        $fail('La date de naissance n\'est pas cohérente.');
                    }
                    if ($dateDeNaissance->diffInYears($aujourdhui) < $ageMinimum) {
                        $fail('La date de naissance n\'est pas cohérente.');
                    }
                },
            ], 
            'Lieu_Naissance' => 'required|min:3|max:100',
        ];
    }

    public function messages()
    {
        return [
           
            'Matricule.min' => 'Le champ matricule doit contenir au moins 3 caractères.',
            'Matricule.max' => 'Le champ matricule doit contenir au maximum 100 caractères.',
            'Nom.required' => 'Le champ nom est obligatoire.',
            'Nom.min' => 'Le champ nom doit contenir au moins 3 caractères.',
            'Nom.max' => 'Le champ nom doit contenir au maximum 100 caractères.',
            'Prenom.required' => 'Le champ prénom est obligatoire.',
            'Prenom.min' => 'Le champ prénom doit contenir au moins 3 caractères.',
            'Prenom.max' => 'Le champ prénom doit contenir au maximum 100 caractères.',
            'Date_Naissance.required' => 'Le champ date de naissance est obligatoire.',
            'Date_Naissance.date' => 'Le champ date de naissance doit être une date valide.',
            'Niveau_Etude.required' => 'Le champ niveau est obligatoire.',
            'Niveau_Etude.min' => 'Le champ niveau doit contenir au moins 6.',
        ];
    }
}
