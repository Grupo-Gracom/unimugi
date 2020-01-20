<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Topico;

class CategoriaController extends Controller
{
    public function operacional(){
        $conteudos = Topico::where([['categoria_id', '=', 1],['status', '=', 0]])->get();

        return view('operacional.index',compact('conteudos'));
    }

    public function marketing(){
        $conteudos = Topico::where([['categoria_id', '=', 2],['status', '=', 0]])->get();
        return view('marketing.index',compact('conteudos'));
    }

    public function treinamentos(){
        $conteudos = Topico::where([['categoria_id', '=', 3],['status', '=', 0]])->get();
        return view('treinamentos.index',compact('conteudos'));
    }

    public function solicitacoes(){
        $conteudos = Topico::where([['categoria_id', '=', 4],['status', '=', 0]])->get();
        return view('solicitacoes.index',compact('conteudos'));
    }

    public function franquias(){
        $conteudos = Topico::where([['categoria_id', '=', 5],['status', '=', 0]])->get();
        return view('franquias.index',compact('conteudos'));
    }

    public function conteudo($id){
        return "teste ".$id;
    }

}
