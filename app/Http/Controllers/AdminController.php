<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;
use App\Categoria;
use App\Topico;
use App\Conteudo;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $noticias = Noticia::count();
        $categorias = Categoria::count();
        $topicos = Topico::count();
        $conteudos = Conteudo::count();
        $usuarios = User::count();
        $ultimasNoticias = Noticia::orderBy('noticia_id', 'desc')->simplePaginate(10);
        $conteudosMaisAcessados = Conteudo::orderBy('conteudo_views', 'desc')->simplePaginate(5);
        $conteudosMenosAcessados = Conteudo::orderBy('conteudo_views', 'asc')->simplePaginate(5);
        return view('admin/index', compact('noticias','categorias', 'topicos', 'conteudos', 'usuarios','ultimasNoticias','conteudosMaisAcessados','conteudosMenosAcessados'));
    }
}
