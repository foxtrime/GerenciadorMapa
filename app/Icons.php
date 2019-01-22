<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icons extends Model
{
    protected $table = "icons";

    protected $fillable = [
        'nomeicone',
    ];
    
    public function conteudo()
    {
        return $this->hasMany('App\Conteudo');
    }
}
