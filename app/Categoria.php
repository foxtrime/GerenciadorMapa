<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = "categorias";

    protected $fillable = [
        'nome',
    ];

    public function conteudo()
    {
        return $this->hasMany('App\Conteudo');
    }
}
