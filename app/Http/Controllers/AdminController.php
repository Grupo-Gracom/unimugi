<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $categorias = Categoria::count();
        $topicos = Topico::count();
        $conteudos = Conteudo::count();
        $usuarios = User::count();
        return view('admin/index', compact('categorias', 'topicos', 'conteudos', 'usuarios'));
    }
}
