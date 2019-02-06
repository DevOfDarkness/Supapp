<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*Rotas Clientes*/
Route::apiResource('clientes', 'ClientController');
/*Rotas Produtos*/
Route::apiResource('produtos', 'ProdutoController');
/*Rotas Fornecedores*/
Route::apiResource('fornecedores', 'FornecedorController');
