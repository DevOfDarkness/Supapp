<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Http\Resources\ProdutoResource;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $produto = new Produto;

      $produto->categoria = $request->categoria;
      $produto->nome = $request->nome;
      $produto->validade = $request->validade;
      $produto->qtd_Estoque = $request->qtd_Estoque;
      $produto->preco = $request->preco;
      $produto->medida = $request->medida;
      $produto->save();
      return response()->json([$produto]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $produto = Produto::findOrFail($id);

      return new ProdutoResource($produto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $produto = Produto::findOrFail($id);

      if($request->nome)
        $produto->nome = $request->nome;
      if($request->categoria)
        $produto->categoria = $request->categoria;
      if($request->validade)
        $produto->validade = $request->validade;
      if($request->qtd_Estoque)
        $produto->qtd_Estoque = $request->qtd_Estoque;
      if($request->preco)
        $produto->preco = $request->preco;

      $produto->save();
      return response()->json([$produto]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Produto::destroy($id);
      return response()->json(["DELETADO"]);
    }
}
