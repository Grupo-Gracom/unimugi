<?php

namespace App\Http\Controllers;

use App\Material;

class DownloadController extends Controller
{
    public function academico()
    {
        $materiais = Material::all()->where('categoria_id', 7)->where('material_status', 1);
        return view('download.academico', compact('materiais'));
    }
}
