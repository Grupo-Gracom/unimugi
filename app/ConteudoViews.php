<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConteudoViews extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'conteudo_view_id';
    protected $table = "conteudo_views";
    protected $fillable = [
        'conteudo_view_id',
        'conteudo_view_data',
        'conteudo_id',
        'user_id'
    ];
}
