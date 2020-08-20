<?php

namespace App\Http\Controllers;

use App\Topico;
use App\Conteudo;

class PdfController extends Controller
{
    public function index()
    {
        return view('pdf.index');
    }

    public function show($conteudo_id)
    {
        $topicos = Topico::all();
        $conteudo = Conteudo::find($conteudo_id);
        //dd($conteudo);
        return view('pdf.index', compact('conteudo', 'topicos'));
    }
}

?>