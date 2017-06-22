<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
            'nome.required' => 'Informe o nome',
            'email.required' => 'Informe o e-mail',
            'email.email' => 'Informe um e-mail válido',
            'telefone.required' => 'Informe o telefone',
            'telefone.numeric' => 'Informe somente números'
        ];
    }
}
