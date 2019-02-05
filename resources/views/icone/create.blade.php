@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Criar Marcador</h1>
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Conteudo</div>
        <div class="panel-body">
            <form method="POST" action="{{ url('icone') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">                        
                        <div class="form-group">
                            <label for="nomeicone">URL DO ICONE</label>
                            <input type="text" class="form-control" name="nomeicone" id="nomeicone" required>
                            <i>*So será aceita URL COMPLETA do icone</i>
                        </div>
                    </div>
                </div>

                <div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="button" class="btn btn-secondary" onclick = "history.back ()">Cancelar</button>
                </div>
            </form>
        </div>
</div>
@stop

