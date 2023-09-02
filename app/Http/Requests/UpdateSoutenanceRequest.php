<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSoutenanceRequest extends FormRequest
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
            'Nom_Soutenance'=>'required|min:12|max:100',
            'Date_Soutenance'=>'required',
            'Heure_Soutenance'=>'required',
            'Salle_Soutenance'=>'required|min:7|max:100'
        ];
    }


    public function messages()
    {
        return [
            
            'Nom_Soutenance.min' => 'Le champ nom de soutenance doit contenir au moins 12 caractères. (Exemple: "Soutenance 01")',
            'Nom_Soutenance.max' => 'Le champ nom de soutenance doit contenir au maximum 100 caractères.',
            'Date_Soutenance.required' => 'Le champ date de soutenance est obligatoire.',
            
            'Heure_Soutenance.required' => 'Le champ heure de soutenance est obligatoire.',
           
            'Salle_Soutenance.required' => 'Le champ salle de soutenance est obligatoire.',
            'Salle_Soutenance.min' => 'Le champ salle de soutenance doit contenir au moins 7 caractères. (Exemple: "Salle 01")',

        ];
    }
}
