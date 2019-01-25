@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Marcadores</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Conteudo</div>
        <div class="panel-body">
            <a href="{{ url('conteudo/create')}}" class="btn btn-primary btn-xs" title="Adicionar novo marcador">
                <span class="glyphicon glyphicon-plus"></span>        
            </a> 
            <table class="table table-hover table-striped compact">
                <thead>
                    <tr>
                        <th>Categoria Nome</th>
                        <th>Conteudo Titulo</th> 
                        <th>Ações</th>
                    </tr>						
                </thead>
                <tbody>
                    @foreach($conteudos as $conteudo)
                        <tr>
                            <td>{{ $conteudo->categoria->nome }}</td>
                            <td>{{ $conteudo->nome }}</td>
                            <td>
                            {{-- <a href="{{action('ConteudoController@edit',$conteudo->id)}}" 
                                class="btn btn-warning btn-xs action botao_acao ">
                                <i class="glyphicon glyphicon-pencil "></i>
                            </a>                         --}}
                            <form action="{{action('ConteudoController@destroy', $conteudo->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs action botao_acao" type="submit"><i class="glyphicon glyphicon-remove "></i></button>   
                            </form>                    
                        </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
<script>
    
    
</script>
@stop