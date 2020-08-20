<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'noticia_id';
    protected $table = "noticias";
    protected $fillable = [
        'noticia_id',
        'noticia_titulo',
        'noticia_descricao_curta',
        'noticia_descricao',
        'noticia_status',
        'noticia_data',
        'noticia_data_up',
        'noticia_views'
    ];
}
