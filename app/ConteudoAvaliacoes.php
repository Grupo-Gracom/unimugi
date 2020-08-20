<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConteudoAvaliacoes extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'conteudo_avaliacao_id';
    protected $table = "conteudo_avaliacoes";
    protected $fillable = [
        'conteudo_avaliacao_id',
        'conteudo_avaliacao',
        'conteudo_avaliacao_data',
        'conteudo_id',
        'user_id'
    ];
}
