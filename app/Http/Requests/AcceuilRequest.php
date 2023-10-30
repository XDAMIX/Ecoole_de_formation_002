<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcceuilRequest extends FormRequest
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
            'titre'   => 'required|min:1|max:255',
            'stitre1' => 'required|min:1|max:255',
            'stitre2' => 'required|min:1|max:255',
            // 'photo' => 'required',
        ];
    }
}
