<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Conteudo;
use App\Topico;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::paginate(10);
        return view('admin.categorias', compact('categorias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria_id
     * @return \Illuminate\Http\Response
     */
    public function show($categoria_id)
    {
        $categoria = Categoria::find($categoria_id);
        return $categoria;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->has('e_categoria_id')) {
            $categoria = Categoria::find($data['e_categoria_id']);
            $categoria->categoria_titulo = $data['e_categoria_titulo'];
            $categoria->categoria_status = 1;
            $categoria->save();
            return "2";
        } else {
            $categoria = new Categoria();
            $categoria->categoria_titulo = $data['categoria_titulo'];
            $categoria->categoria_status = 1;
            $categoria->save();
            return "1";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($categoria_id)
    {
        $categoria = Categoria::findOrFail($categoria_id);
        $categoria->delete();
        return "1";
    }

    public function operacional()
    {
        $topicos = Topico::all()->where('categoria_id', 1)->where('topico_status', 1);
        $conteudos = Conteudo::all()->where('conteudo_status', 1);
        return view('home.categoria', compact('topicos', 'conteudos'));
    }

    public function marketing()
    {
        $topicos = Topico::all()->where('categoria_id', 2)->where('topico_status', 1);
        $conteudos = Conteudo::all()->where('conteudo_status', 1);
        return view('home.categoria', compact('topicos', 'conteudos'));
    }

    public function treinamentos()
    {
        $topicos = Topico::all()->where('categoria_id', 3)->where('topico_status', 1);
        $conteudos = Conteudo::all()->where('conteudo_status', 1);
        return view('home.categoria', compact('topicos', 'conteudos'));
    }

    public function solicitacoes()
    {
        $topicos = Topico::all()->where('categoria_id', 4)->where('topico_status', 1);
        $conteudos = Conteudo::all()->where('conteudo_status', 1);
        return view('home.categoria', compact('topicos', 'conteudos'));
    }

    public function franquias()
    {
        $topicos = Topico::all()->where('categoria_id', 5)->where('topico_status', 1);
        $conteudos = Conteudo::all()->where('conteudo_status', 1);
        return view('home.categoria', compact('topicos', 'conteudos'));
    }
    public function pedagogico()
    {
        $topicos = Topico::all()->where('categoria_id', 6)->where('topico_status', 1);
        $conteudos = Conteudo::all()->where('conteudo_status', 1);
        return view('home.categoria', compact('topicos', 'conteudos'));
    }

    public function material()
    {
        $topicos = Topico::all()->where('categoria_id', 7)->where('topico_status', 1);
        $conteudos = Conteudo::all()->where('conteudo_status', 1);
        return view('material.index', compact('topicos', 'conteudos'));
    }
}
