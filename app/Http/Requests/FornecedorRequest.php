<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FornecedorRequest extends FormRequest
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
          'nome' => 'required|string',
          'email' => 'required|email',
          'endereco' => 'required|string',
          'telefone' => 'required|string',
          'cnpj' => 'required|cnpj',
      ];
    }
    public function messages()
      {
        return [
          'email.required' => 'Insira um email válido',
          'endereco.required' => 'Por favor, insira um endereço válido',
          'telefone.required' => 'Por favor, insira um telefone válido',
          'nome.required' => 'Insira um nome válido',
          'cnpj.required.unique' => 'Insira um cnpj válido',
        ];
      }


    protected function failedValidation(Validator $validator)
    {
    throw new
    HttpResponseException(response()->json($validator->errors(),
    422));
    }


}
