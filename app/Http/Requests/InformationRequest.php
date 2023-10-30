<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequest extends FormRequest
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
            'nom'          => 'required|min:1|max:255',
            'adresse'      => 'required|min:1|max:255',
            'localisation' => 'required|min:1|max:16383',
            'email'        => 'required|min:1|max:255',
            'heure_travail'=> 'required|min:1|max:255',
            // 'logo'         => 'required',
        ];
    }
}
