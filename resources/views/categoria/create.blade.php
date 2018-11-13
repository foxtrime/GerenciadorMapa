@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Criar Categoria</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Categoria</div>
        <div class="panel-body">
            <form method="POST" action="{{ url('categoria') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="button" class="btn btn-secondary" onclick = "history.back ()">Cancelar</button>
                </div>
            </form>
        </div>

    </div>
@stop

