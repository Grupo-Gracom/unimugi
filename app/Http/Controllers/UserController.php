<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::simplePaginate(10);
        return view('admin.usuarios', compact("usuarios"));
    }

    public function show($usuario_id)
    {
        $usuario = User::find($usuario_id);
        return $usuario;
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
        
        if($request->has('e_usuario_id')){
            $usuario = User::find($data['e_usuario_id']);
            $usuario->name = $data['e_usuario_nome'];
            $usuario->email = $data['e_usuario_email'];
            $usuario->password = Hash::make($data['e_usuario_senha']);
            $usuario->updated_at = date("Y-m-d H:m:s");
            $usuario->nivel = $data['e_usuario_nivel'];
            $usuario->status = $data['e_usuario_status'];
            $usuario->save();
            return "2";
        }else{    
            $usuario = new User();
            $usuario->name = $data['usuario_nome'];
            $usuario->email = $data['usuario_email'];
            $usuario->password = Hash::make($data['usuario_senha']);
            $usuario->created_at = date("Y-m-d H:m:s");
            $usuario->updated_at = date("Y-m-d H:m:s");
            $usuario->nivel = $data['usuario_nivel'];
            $usuario->status = $data['usuario_status'];
            $usuario->save();
            return "1";
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $usuario_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($usuario_id)
    {
        $usuario = User::findOrFail($usuario_id);
        $usuario->delete();
        return "1";
    }

}

?>