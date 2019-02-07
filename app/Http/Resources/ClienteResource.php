<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          'cnpj_cliente' => $this->cnpj_cliente,
          'nome_cliente' => $this->nome_cliente,
          'email_cliente' => $this->email_cliente,
        ];
    }
}
