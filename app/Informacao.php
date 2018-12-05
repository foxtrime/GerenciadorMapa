<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informacao extends Model
{
    protected $table = "informacoes";

    protected $fillable = [
        'titulo',
        'dado',
        'conteudo_id'
        
    ];

    public function conteudo()
    {
        return $this->belongsTo('App\Conteudo','conteudo_id');
    }
}
