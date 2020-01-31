<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'categoria_id';
    protected $table = "categorias";
    protected $fillable = [
        'categoria_id',
        'categoria_titulo',
        'categoria-status'
    ];
}
