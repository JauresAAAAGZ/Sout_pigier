<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJurysRequest extends FormRequest
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
            'NumJury'=>'required|unique:jurys|min:6|max:100',
            'President'=>'required',
            'Examinateur'=>'required', 
            'Rapporteur'=>'required'
        ];
    }


    public function messages()
    {
        return [
            'NumJury.unique'=>'Ce numéro de jury est déjà utilisé',
            'NumJury.required'=>'Le numéro de jury est obligatoire',
            'NumJury.min'=>'Le numéro de jury doit contenir au moins 06 caractères. Exemple: Jury 01',
            'NumJury.max'=>'Le numéro de jury doit contenir au maximum 100 caractères',
            

        ];
    }
}
