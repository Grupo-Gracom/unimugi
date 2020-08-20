<?php

namespace App\Http\Controllers;

use DB;

use App\User;
use App\Topico;
use App\Conteudo;
use App\ConteudoViews;
use App\ConteudoAvaliacoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConteudoController extends Controller
{

    protected $usuario;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->usuario = Auth::user();

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conteudos = Conteudo::orderBy('topico_id', 'asc')->simplePaginate(10);
        $conteudosCount = Conteudo::count();
        $topicos = Topico::all();
        return view('admin.conteudos', compact('conteudos','conteudosCount','topicos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conteudo $conteudo_id
     * @return \Illuminate\Http\Response
     */
    public function show($conteudo_id)
    {
        $id = request()->user()->id;
        $nivel = request()->user()->nivel;
        $conteudo = Conteudo::find($conteudo_id);
        if($nivel != 1){
            Conteudo::find($conteudo_id)->increment('conteudo_views');
            $view = new ConteudoViews();
            $view->conteudo_view_data = date("Y-m-d H:m:s");
            $view->conteudo_id = $conteudo_id;
            $view->user_id = $id;
            $view->save();
        }
        return $conteudo;
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
        
        if($request->has('e_conteudo_id')){
            $conteudo = Conteudo::find($data['e_conteudo_id']);
            $conteudo->conteudo_titulo = $data['e_conteudo_titulo'];
            $conteudo->conteudo_descricao = $data['e_conteudo_descricao'];
            $conteudo->conteudo_status = $data['e_conteudo_status'];
            $conteudo->conteudo_data_up = date("Y-m-d H:m:s");
            $conteudo->topico_id = $data['e_topico_id'];
            $conteudo->save();
            return "2";
        }else{    
            $conteudo = new Conteudo();
            $conteudo->conteudo_titulo = $data['conteudo_titulo'];
            $conteudo->conteudo_descricao = $data['conteudo_descricao'];
            $conteudo->conteudo_status = $data['conteudo_status'];
            $conteudo->conteudo_data = date("Y-m-d H:m:s");
            $conteudo->conteudo_data_up = date("Y-m-d H:m:s");
            $conteudo->conteudo_views = 0;
            $conteudo->topico_id = $data['topico_id'];
            $conteudo->save();
            return "1";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Conteudo $conteudo_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($conteudo_id)
    {
        $conteudo = Conteudo::findOrFail($conteudo_id);
        $conteudo->delete();
        return "1";
    }

    public function subirImagem(Request $request){
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('assets/img/conteudos'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('assets/img/conteudos/'.$fileName); 
            $msg = 'Upload concluído'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function foiUtil(Request $request){
        $id = request()->user()->id;
        $data = $request->all();
        $check = ConteudoAvaliacoes::where('conteudo_id',$data["conteudo_id"])->where('user_id', $id)->count();
        
        if($check > 0){
            return "2";
        }else{
            $view = new ConteudoAvaliacoes();
            $view->conteudo_avaliacao = $data["conteudo_avaliacao"];
            $view->conteudo_avaliacao_data = date("Y-m-d H:m:s");
            $view->conteudo_id = $data["conteudo_id"];
            $view->user_id = $id;
            $view->save();
    
            return "1";
        }
    }

}
