<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topico extends Model
{
    protected $table = "topicos";
    protected $fillable = [
        'titulo_topico'
    ];
}
