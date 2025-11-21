<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
            'name' => 'required|max:200',
            'email' => 'required|unique:users|max:200',
            'password' => 'required|min:8|max:200',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome é obrigatório!',
            'name.max' => 'O nome deve ter no máximo 200 caracteres!',
            'email.required' => 'O e-mail é obrigatório!',
            'email.unique' => 'O e-mail já está cadastrado!',
            'email.max' => 'O e-mail deve ter no máximo 200 caracteres!',
            'password.required' => 'a senha é obrigatoria!',
            'password.min' => 'A senha deve ter no mínimo 8 caracteres!',
            'password.max' => 'A senha deve ter no máximo 200 caracteres!',
        ];
    }
}

