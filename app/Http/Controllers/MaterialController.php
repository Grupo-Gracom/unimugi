<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        $materiais = Material::all();
        return view('admin.materiais', compact('categorias', 'materiais'));
    }

    public function store(Request $request)
    {
        // dd($data = $request->categoria_id);
        $path = $request->file('arquivo')->store('materiais', 's3');

        // Storage::disk('s3')->setVisibility($path, 'private');

        $material = Material::create([
            // 'title' => basename($path),
            'title' => $request->title,
            'categoria_id' => $request->categoria_id,
            'material_status' => $request->material_status,
            'path' => Storage::disk('s3')->url($path),
        ]);

        return redirect()->route('cadastro-material');
    }

    public function show(Material $material)
    {
        return $material->url;
    }

    public function destroy($material_id)
    {
        $material = Material::findOrFail($material_id);
        $material->delete();
        return "1";
    }
}
