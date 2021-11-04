<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Conteudo;

class HomeController extends Controller
{

    public function index()
    {
        $conteudos = Conteudo::with('categoria','informacao')->get();
        //dd($conteudos);
        return view('home',compact('conteudos'));
    }

    public function inicio()
    {
        $conteudos = Conteudo::with('categoria','informacao','icon')->get();
        $categorias = Categoria::all();

        return view('user/inicio', compact('conteudos','categorias'));
    }
}
