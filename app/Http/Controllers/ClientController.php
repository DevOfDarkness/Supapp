<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $cliente = new Cliente;

      $cliente->cnpj_cliente = $request->cnpj;
      $cliente->nome_cliente = $request->nome;
      $cliente->endereco_cliente = $request->endereco;
      $cliente->telefone_cliente = $request->telefone;
      $cliente->email_cliente = $request->email;
      $cliente->save();
      return response()->json([$cliente]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cliente = Cliente::findOrFail($id);

      return response()->json([$cliente]);
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
      $cliente = Cliente::findOrFail($id);

      if($request->nome_cliente)
        $fornecedor->nome_cliente = $request->nome_cliente;
      if($request->cnpj_cliente)
        $fornecedor->cnpj_cliente = $request->cnpj_cliente;
      if($request->endereco_cliente)
        $fornecedor->endereco_cliente = $request->endereco_cliente;
      if($request->telefone_cliente)
        $fornecedor->telefone_cliente = $request->telefone_cliente;
      if($request->email_cliente)
        $fornecedor->email_cliente = $request->email_cliente;

      $cliente->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Cliente::destroy($id);
      return response()->json(["DELETADO"]);
    }
}
