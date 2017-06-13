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


// Route::group([], function() {
// 	Route::get('/enderecos', 'EnderecosControllerAPI@index');
// 	Route::get('/enderecos/{id}', 'EnderecosControllerAPI@show');
// 	Route::post('/enderecos', 'EnderecosControllerAPI@create');
// 	Route::put('/enderecos/{id}', 'EnderecosControllerAPI@update');
// 	Route::delete('/enderecos/{id}', 'EnderecosControllerAPI@destroy');
// });

Route::resource('/endereco', 'EnderecoController');
Route::resource('/dadospessoais', 'InfoPessoaisController');
