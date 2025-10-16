<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Veuillez entrer un nom',
            'email.required' => 'Veuillez entrer une adresse mail valide',
            'email.email' => 'Veuillez entrer une adresse mail au bon format',
            'email.unique' => 'Votre adresse mail est déjà utilisée',
            'password.required' => 'Veuillez entrer un mot de passe',
            'password.min' => 'Votre mot de passe doit contenir au moins 8 caractères',
            'password.confirmed' => 'Veuillez confirmer votre mot de passe'
        ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     throw new HttpResponseException(response());
    // }
}
