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
        'categoria_id',
        'icon_id',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria','categoria_id');
    }

    public function informacao()
    {
        return $this->hasMany('App\Informacao');
    }

    public function icon()
    {
        return $this->belongsTo('App\Icons','icon_id');
    }

}
