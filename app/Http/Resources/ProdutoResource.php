<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
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
        'validade' => $this->validade,
        'qtd_Estoque' => $this->qtd_Estoque,
        'nome' => $this->nome,
        'categoria' => $this->categoria,
        'preco' => $this->preco,
      ];
    }
}
