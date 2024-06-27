<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required','present','email','unique:users,email','max:255'],
            'password' => ['required','confirmed','max:255','min:5'],
            'phone' => 'required',
            'name' => ['required','max:255'],
        ];
    }
}
