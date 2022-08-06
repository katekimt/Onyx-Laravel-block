<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
            'password'=>['nullable','confirmed', Password::min(8)->mixedCase(), Password::min(8)->numbers()],

        ];
    }

    /*public function messages()
    {
        return [
            'name.required' => 'You need to fill in the field with the name',
        ];
    }*/
}
