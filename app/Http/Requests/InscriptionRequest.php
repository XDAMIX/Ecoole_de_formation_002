<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionRequest extends FormRequest
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
            'sexe'      => 'required|min:1|max:255',
            'nom'       => 'required|min:1|max:255',
            'age'       => 'required|min:1|max:255',
            'wilaya'    => 'required|min:1|max:255',
            'formation' => 'required|min:1|max:255',
            'tel'       => 'required|min:1|max:255',
        ];
    }
}
