<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClienteRequest extends FormRequest
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
            'nome_cliente' => 'required|string',
            'cnpj_cliente' => 'required|cnpj',
            'email_cliente' => 'required|email',
            'endereco_cliente' => 'required|string',
            'telefone_cliente' => 'required|telefone',
        ];
    }
    public function messages()
    {
      return [
        'email_cliente.email' => 'Insira um email válido',
        'email_cliente.required' => 'Insira um email',
        'email_cliente.unique' => 'Este e-mail já existe',
        'endereco_cliente.required' => 'Por favor, insira um endereço válido',
        'telefone_cliente.required' => 'Por favor, insira um número de telefone',
        'telefone_cliente.telefone' => 'Por favor, insira um telefone válido',
        'cnpj_cliente.required' => 'Por favor, insira um cnpj',
        'cnpj_cliente.cnpj' => 'Este cnpj já existe',
        'nome_cliente.required' => 'Por favor, insira um nome',

      ];
    }

    protected function failedValidation(Validator $validator)
    {
    throw new
    HttpResponseException(response()->json($validator->errors(),
    422));
    }
}
