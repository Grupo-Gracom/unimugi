<?php

namespace App\Http\Controllers;

use DB;

use App\User;
use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoticiaController extends Controller
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
        $noticias = Noticia::simplePaginate(10);
        return view('admin.noticias', compact('noticias'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Conteudo $conteudo_id
     * @return \Illuminate\Http\Response
     */
    public function show($noticia_id)
    {
        $id = request()->user()->id;
        $nivel = request()->user()->nivel;
        $noticia = Noticia::find($noticia_id);
        if($nivel != 1){
            Noticia::find($noticia_id)->increment('noticia_views');
        }
        return $noticia;
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
        
        if($request->has('e_noticia_id')){
            $noticia = Noticia::find($data['e_noticia_id']);
            $noticia->noticia_titulo = $data['e_noticia_titulo'];
            $noticia->noticia_descricao_curta = $data['e_noticia_descricao_curta'];
            $noticia->noticia_descricao = $data['e_noticia_descricao'];
            $noticia->noticia_status = $data['e_noticia_status'];
            $noticia->noticia_data_up = date("Y-m-d H:m:s");
            $noticia->save();
            return "2";
        }else{    
            $noticia = new Noticia();
            $noticia->noticia_titulo = $data['noticia_titulo'];
            $noticia->noticia_descricao_curta = $data['noticia_descricao_curta'];
            $noticia->noticia_descricao = $data['noticia_descricao'];
            $noticia->noticia_status = 1;
            $noticia->noticia_data = date("Y-m-d H:m:s");
            $noticia->noticia_data_up = date("Y-m-d H:m:s");
            $noticia->noticia_views = 0;
            $noticia->save();
            return "1";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia $conteudo_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($noticia_id)
    {
        $noticia = Noticia::findOrFail($noticia_id);
        $noticia->delete();
        return "1";
    }

    public function subirImagem(Request $request){
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('assets/img/noticias'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('assets/img/noticias/'.$fileName); 
            $msg = 'Upload concluído'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    public function lerNoticia($noticia_id)
    {
        $id = request()->user()->id;
        $nivel = request()->user()->nivel;
        $noticia = Noticia::find($noticia_id);
        if($nivel != 1){
            Noticia::find($noticia_id)->increment('noticia_views');
        }
        return view("noticia.noticia", compact('noticia'));
    }

}
