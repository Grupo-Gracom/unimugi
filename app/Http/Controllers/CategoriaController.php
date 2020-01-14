<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function operacional(){
        return view('operacional.index');
    }

    public function marketing(){
        return view('marketing.index');
    }

    public function treinamentos(){
        return view('treinamentos.index');
    }

    public function solicitacoes(){
        return view('solicitacoes.index');
    }

    public function franquias(){
        return view('franquias.index');
    }

}
