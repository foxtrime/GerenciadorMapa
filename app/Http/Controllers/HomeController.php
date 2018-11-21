<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Conteudo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conteudos = Conteudo::all();
        return view('home',compact('conteudos'));
    }

    public function DadosView(Request $request)
    {
        dd($request);
        $conteudos = json_decode($request->conteudos);

        $retorno = [];

        foreach($conteudos as $conteudo)
        {
            $retorno[] = Conteudo::with([
                'nome',
                'lat',
                'lng'
            ])->find($conteudo->id);
        }
        return json_encode($retorno);
    }
}
