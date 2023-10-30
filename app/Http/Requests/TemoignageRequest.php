<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemoignageRequest extends FormRequest
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
            'nom'       => 'required|min:1|max:255',
            'poste'     => 'required|min:1|max:255',
            'mot'       => 'required|min:1|max:16383',
            // 'photo'       => 'required',
        ];
    }
}
