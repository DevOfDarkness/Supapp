<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoRequest extends FormRequest
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
            'preco' => 'required|float',
            'qtd_Estoque' => 'required|integer',
            'validade' => 'required|string',
            'categoria' => 'required|string',
            'medida' => 'required|string',
        ];
    }
    public function messages()
    {
      return [
        'preco.required' => 'Por favor insira o preço do produto',
        'qtd_Estoque.required' => 'Por favor, insira um endereço válido',
        'validade.required' => 'Por favor, insira a validade do produto',
        'categoria.unique' => 'Por favor, insira uma categoria de produto'
      ];
    }
    protected function failedValidation(Validator $validator)
    {
    throw new
    HttpResponseException(response()->json($validator->errors(),
    422));
    }

}
