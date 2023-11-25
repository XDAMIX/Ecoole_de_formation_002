<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
            'titre'       => 'required|min:1|max:255',
            'description' => 'required|min:1|max:16383',
            'dure'        => 'required|min:1|max:255',
            'publique'    => 'required|min:1|max:16383',
            'objectifs'   => 'required|min:1|max:16383',
            // 'photo'       => 'required',
        ];
    }
}
