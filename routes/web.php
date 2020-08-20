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
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/operacional', 'CategoriaController@operacional')->name('operacional');
Route::get('/marketing', 'CategoriaController@marketing')->name('marketing');
Route::get('/treinamentos', 'CategoriaController@treinamentos')->name('treinamentos');
Route::get('/pedagogico', 'CategoriaController@pedagogico')->name('pedagogico');
Route::get('/material', 'CategoriaController@material')->name('material');

// Download

Route::get('download-academico', 'DownloadController@academico')->name('download-academico');

Route::get('/modelos-de-solicitacoes', 'CategoriaController@solicitacoes')->name('modelos-de-solicitacoes');
Route::get('/manuais-e-regulamentos', 'CategoriaController@franquias')->name('manuais-e-regulamentos');
// Route::get('marketing/arquivos/{id}/',  ['as'=>'conteudo/{id}', 'uses'=> 'CategoriaController@conteudo']);

Route::get('/admin', ['as' => 'admin', 'uses' => 'AdminController@index']);
Route::resource('categorias', 'CategoriaController');
Route::resource('topicos', 'TopicoController');
Route::resource('conteudos', 'ConteudoController');
Route::resource('pdf', 'PdfController');
Route::resource('usuarios', 'UserController');
Route::resource('noticias', 'NoticiaController');
Route::resource('materiais', 'MaterialController');

Route::get('/cadastro-material', 'MaterialController@index')->name('cadastro-material');
// Route::post('/', 'MaterialController@store');
// Route::get('/{arquivo}', 'MaterialController@show');

Route::post('conteudoImagem', 'ConteudoController@subirImagem')->name('conteudoImagem');
Route::post('conteudoAvaliacao', 'ConteudoController@foiUtil')->name('conteudoAvaliacao');
Route::post('noticiaImagem', 'NoticiaController@subirImagem')->name('noticiaImagem');
Route::get('noticia/{noticia_id}', 'NoticiaController@lerNoticia')->name('lerNoticia');

// Route::prefix('categorias')->name('categorias.')->group(function(){
//     Route::get('/', 'CategoriaController@index')->name('index');
//     Route::get('/{categoria_id}', 'CategoriaController@show')->name('show');
//     Route::post('/store', 'CategoriaController@store')->name('store');
//     Route::get('/destroy{categoria_id}', 'CategoriaController@destroy')->name('destroy');
// });
