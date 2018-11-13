<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    protected $table = "conteudos";

    protected $fillable = [
        'nome',
        'lat',
        'lng',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria','categoria_id');
    }
}
