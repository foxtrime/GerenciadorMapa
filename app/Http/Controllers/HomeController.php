<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Categoria;
use App\Conteudo;
use App\Informacao;

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
        $perfil = auth()->user()->nivel;
        //dd($perfil);
        
        if($perfil == "admin"){
            $conteudos = Conteudo::with('categoria','informacao')->get();
            //dd($conteudos);
            return view('home',compact('conteudos'));
        }else{
            $conteudos = Conteudo::with('categoria','informacao')->get();
            $categorias = Categoria::all();
            //dd($conteudos);
            return view('user/index',compact('conteudos','categorias'));
        }
    }

    // public function DadosView(Request $request)
    // {
    //     dd($request);
    //     $conteudos = json_decode($request->conteudos);

    //     $retorno = [];

    //     foreach($conteudos as $conteudo)
    //     {
    //         $retorno[] = Conteudo::with([
    //             'nome',
    //             'lat',
    //             'lng'
    //         ])->find($conteudo->id);
    //     }
    //     return json_encode($retorno);
    //     dd($retorno);
    // }
}
