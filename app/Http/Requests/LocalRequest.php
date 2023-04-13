<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequest extends FormRequest
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
            "nome" => ["required", "string", "max:255", "min:3"],
            "endereco" => ["required", "string", "max:255", "min:3"],
            "contato" => ["required", "string", "max:255", "min:3"],
            "descricao" => ["max:255"],
            "usuario.nome" => ["required", "string", "max:255", "min:3"],
            "usuario.email" => ["required", "string", "email", "max:255", "min:3" ,"unique:users"],
            "usuario.password" => ["required", "string", "confirmed"],
            "usuario.password_confirmation" => ["required", "string"],
        ];
    }
}
