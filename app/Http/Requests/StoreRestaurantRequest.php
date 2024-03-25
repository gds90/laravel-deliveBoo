<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:100|unique:restaurants',
            'p_iva' => 'required|size:11',
            'address' => 'required|min:3|max:100',
            'cover_image' => 'nullable|image|max:2048', // max 2MB
            'type_id' => 'required|exists:types,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il campo nome è obbligatorio!',
            'name.min' => 'Il campo nome deve contenere almeno 3 caratteri',
            'name.max' => 'Il campo nome non può superare i 100 caratteri',
            'name.unique' => "Esiste già un ristorante con questo nome",

            'p_iva.required' => 'Il campo Partita IVA è obbligatorio!',
            'p_iva.size' => 'Il campo Partita IVA deve essere di 11 cifre',

            'address.required' => 'Il campo Indirizzo è obbligatorio!',
            'address.min' => 'Il campo Indirizzo deve contenere almeno 3 caratteri',
            'address.max' => 'Il campo Indirizzo non può superare i 100 caratteri',

            'type_id.required' => 'Devi selezionare almeno una tipologia di ristorante!',
            'type_id.exists' => 'La tipologia scelta non esiste più nel database'
        ];
    }
}
