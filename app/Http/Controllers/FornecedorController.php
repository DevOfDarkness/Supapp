<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;
use App\Http\Resources\FornecedorResource;
use App\Http\Requests\FornecedorRequest;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Fornecedor::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(FornecedorRequest $request)
    {
        $fornecedor = new Fornecedor;

        $fornecedor->cnpj = $request->cnpj;
        $fornecedor->nome = $request->nome;
        $fornecedor->endereco = $request->endereco;
        $fornecedor->telefone = $request->telefone;
        $fornecedor->email = $request->email;
        $fornecedor->save();
        return response()->json([$fornecedor]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);

        return new FornecedorResource($fornecedor);
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
        $fornecedor = Fornecedor::findOrFail($id);

        if($request->nome)
          $fornecedor->nome = $request->nome;
        if($request->cnpj)
          $fornecedor->cnpj = $request->cnpj;
        if($request->endereco)
          $fornecedor->endereco = $request->endereco;
        if($request->telefone)
          $fornecedor->telefone = $request->telefone;
        if($request->email)
          $fornecedor->email = $request->email;

        $fornecedor->save();
        return response()->json([$fornecedor]);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fornecedor::destroy($id);
        return response()->json(["DELETADO"]);
    }
}
