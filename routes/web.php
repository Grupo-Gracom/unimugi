<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
Auth::routes();
Route::get('/home', ['as'=>'home','uses'=>'HomeController@index']);
Route::get('/home', ['as'=>'home','uses'=>'HomeController@index']);
Route::get('/operacional', ['as'=>'operacional','uses'=>'CategoriaController@operacional']);
Route::get('/marketing', ['as'=>'marketing','uses'=>'CategoriaController@marketing']);
Route::get('/treinamentos', ['as'=>'treinamentos','uses'=>'CategoriaController@treinamentos']);
Route::get('/modelos-de-solicitacoes', ['as'=>'modelos-de-solicitacoes','uses'=>'CategoriaController@solicitacoes']);
Route::get('/staff-franquias', ['as'=>'staff-franquias','uses'=>'CategoriaController@franquias']);
Route::get('marketing/arquivos/{id}/',  ['as'=>'conteudo/{id}', 'uses'=> 'CategoriaController@conteudo']);