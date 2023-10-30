<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'name'       => 'required|min:1|max:255',
            'email'      => 'required|min:1|max:255',
            'tel'        => 'required|min:1|max:255',
            'subject'    => 'required|min:1|max:255',
            'texte'      => 'required|min:1|max:16383',
        ];
    }
}
