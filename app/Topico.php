<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'topico_id';
    protected $table = "topicos";
    protected $fillable = [
        'topico_id',
        'topico_titulo',
        'topico_status',
        'categoria_id'
    ];
}
