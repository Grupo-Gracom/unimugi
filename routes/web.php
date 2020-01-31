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
Route::get('/operacional', 'CategoriaController@operacional')->name('operacional');
Route::get('/marketing', 'CategoriaController@marketing')->name('marketing');
Route::get('/treinamentos', 'CategoriaController@treinamentos')->name('treinamentos');
Route::get('/modelos-de-solicitacoes', 'CategoriaController@solicitacoes')->name('modelos-de-solicitacoes');
Route::get('/staff-franquias', 'CategoriaController@franquias')->name('staff-franquias');
// Route::get('marketing/arquivos/{id}/',  ['as'=>'conteudo/{id}', 'uses'=> 'CategoriaController@conteudo']);

Route::get('/admin', ['as'=>'admin','uses'=>'AdminController@index']);
Route::resource('categorias', 'CategoriaController');
Route::resource('topicos', 'TopicoController');
Route::resource('conteudos', 'ConteudoController');

// Route::prefix('categorias')->name('categorias.')->group(function(){
//     Route::get('/', 'CategoriaController@index')->name('index');
//     Route::get('/{categoria_id}', 'CategoriaController@show')->name('show');
//     Route::post('/store', 'CategoriaController@store')->name('store');
//     Route::get('/destroy{categoria_id}', 'CategoriaController@destroy')->name('destroy');
// });






