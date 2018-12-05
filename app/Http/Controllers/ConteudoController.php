<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Conteudo;
use App\Informacao;

class ConteudoController extends Controller
{
    public function index()
    {
        $conteudos = Conteudo::with('categoria')->get();
        //dd($conteudos);
        return view('conteudo/index', compact('conteudos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('conteudo/create',compact('categorias'));
    }

    public function store(Request $request)
    {
        //Cria o Conteudo
        $conteudo = new Conteudo();
        
        //dd($request);
        
        $conteudo->nome             = $request->nome;
        $conteudo->lng              = $request->lng;
        $conteudo->lat              = $request->lat;
        $conteudo->categoria_id     = $request->categoria_id;
        
        //dd($conteudo);
        
        //Salva o conteudo para criar o ID
        $conteudo->save();
        
        //Fazer a contagem no array para ver se retornou algo
        if(count($request->titulo) > 1){
            //Iterar pelo array e salvar as paradas
            for ($i = 1; $i < count($request->titulo); $i++){
                $informacao = Informacao::create([
                     'titulo' => $request->titulo[$i],
                     'dado' => $request->dado[$i],
                     'conteudo_id' =>$conteudo->id,
                ]);
            }
        }
        return redirect('conteudo');
    }

    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
       //Pega conteudo
        $conteudo = Conteudo::find($id);
        //dd($conteudo);
        //Apaga Conteudo
        $apagar = $conteudo->delete();

        return redirect('conteudo');
    }
}
