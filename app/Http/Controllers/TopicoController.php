<?php

namespace App\Http\Controllers;

use DB;
use App\Topico;
use App\Categoria;
use Illuminate\Http\Request;

class TopicoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topicos = Topico::orderBy('categoria_id', 'asc')->simplePaginate(10);
        $categorias = Categoria::all();
        return view('admin.topicos', compact('topicos','categorias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topico $topico_id
     * @return \Illuminate\Http\Response
     */
    public function show($topico_id)
    {
        $topico = Topico::find($topico_id);
        return $topico;
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
        
        if($request->has('e_topico_id')){
            $topico = Topico::find($data['e_topico_id']);
            $topico->topico_titulo = $data['e_topico_titulo'];
            $topico->topico_status = $data['e_topico_status'];
            $topico->categoria_id = $data['e_categoria_id'];
            $topico->save();
            return "2";
        }else{    
            $topico = new Topico();
            $topico->topico_titulo = $data['topico_titulo'];
            $topico->topico_status = $data['topico_status'];
            $topico->categoria_id = $data['categoria_id'];
            $topico->save();
            return "1";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topico $topico_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($topico_id)
    {
        $topico = Topico::findOrFail($topico_id);
        $topico->delete();
        return "1";
    }

    public function admin(){
        $topicos = Topico::all();
        return view('admin.topicos', compact('topicos'));
    }

}
