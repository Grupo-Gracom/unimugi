<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'conteudo_id';
    protected $table = "conteudos";
    protected $fillable = [
        'conteudo_id',
        'conteudo_titulo',
        'conteudo_descricao',
        'conteudo_status',
        'conteudo_data',
        'conteudo_data_up',
        'conteudo_views',
        'topico_id'
    ];
}
