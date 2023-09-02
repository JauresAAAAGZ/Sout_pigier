<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemoireRequest extends FormRequest
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
            'Theme'=>'required|unique:memoires|min:6|max:100',
            
            'Date_Depot'=>'required'
            
        ];
    }


    public function messages()
    {
        return [
            'Theme.unique'=>'Ce theme est déjà utilisé',
            'Theme.required'=>'Le theme est obligatoire',
            'Theme.min'=>'Le theme doit contenir au moins 6 caractères. Exemple: Memoire 01',
            'Theme.max'=>'Le theme doit contenir au maximum 100 caractères',
            
            'Date_Depot.required'=>'La date de dépot est obligatoire',
            
           
            

        ];
    }
}
