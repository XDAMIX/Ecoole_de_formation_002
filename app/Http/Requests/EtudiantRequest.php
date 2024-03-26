<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
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
            'nom'    => 'required|min:1|max:255',
            'prenom' => 'required|min:1|max:255',
            'date_naissance'    => 'required',
            'lieu_naissance'    => 'required|min:1|max:255',
            'session'=> 'required|min:1|max:255',
            'tarif'=> 'required|min:1|max:255',
            // 'photo' => 'required',

            // 'sexe'   => 'required|min:1|max:255',
            // 'wilaya' => 'required|min:1|max:255',
            'adresse'  => 'required|min:1|max:255',
            'tel'  => 'required|min:1|max:255',
            'email'  => 'required|min:1|max:255',
        ];
    }
}
