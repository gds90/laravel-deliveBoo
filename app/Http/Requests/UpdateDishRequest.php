<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDishRequest extends FormRequest
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
        $restaurantId = auth()->user()->restaurant->id; // Ottieni l'ID del ristorante dell'utente corrente

        return [
            'name' => [
                'required',
                'min:3',
                'max:50',
                Rule::unique('dishes')->where(function ($query) use ($restaurantId) {
                    return $query->where('restaurant_id', $restaurantId);
                })->ignore($this->dish->id),
            ],
            'description' => 'required|string|min:10|max:255',
            'cover_image' => 'nullable|image|max:2048', // 2MB Max
            'price' => 'required|numeric|between:0,99.99',
            'category_id' => 'nullable',
            'visible' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Il campo nome è obbligatorio",
            'name.min' => "Il campo nome deve contenere almeno 3 caratteri",
            'name.max' => "Il campo nome non può superare i 50 caratteri",

            'description.required' => "La descrizione del piatto è richiesta",
            'description.string' => "La descrizione deve essere un testo",
            'description.min' => "La descrizione deve avere almeno 10 caratteri",
            'description.max' => "La descrizione non può superare i 255 caratteri",

            'cover_img.image' => "Il file selezionato deve essere un\'immagine",
            'cover_img.max' => "L\'immagine di copertina non può pesare più di 2048 KB",

            'price.required' => "Il prezzo è obbligatorio",
            'price.numeric' => "Il prezzo deve essere numerico",
            'price.between' => "Il prezzo deve essere compreso tra :min e :max",
        ];
    }
}
