@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Icones</h1>
@stop

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Conteudo</div>
        <div class="panel-body">
            <a href="{{ url('icone/create')}}" class="btn btn-primary btn-xs" title="Adicionar novo marcador">
                <span class="glyphicon glyphicon-plus"></span>        
            </a>
            <div style="float: right;">*Caso o icone esteja sendo utilizado não será possivel deletar-lo</div>
            <table class="table table-hover table-striped compact">
                <thead>
                    <tr>
                        <th>Icone</th>
                        <th>Excluir</th>
                    </tr>						
                </thead>
                <tbody>
                    @foreach($icones as $icone)
                        <tr>
                            <td><img src="{{ $icone->nomeicone }}"></td>
                            <td>
                                <button 
                                    class="btn delete-icon btn-danger btn-xs action botao_acao" 
                                    data-toggle="tooltip" 
                                    data-icone = {{ $icone->id }}
                                    data-placement="bottom" 
                                    title="Deletar Icone">  
                                    <i class="glyphicon glyphicon-remove "></i>
                                </button>
                             {{-- <form action="{{action('IconeController@destroy', $icone->id)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs action botao_acao" type="submit"><i class="glyphicon glyphicon-remove "></i></button>   
                            </form> --}}
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script>
    $('button.delete-icon').click(function(e) {
        let id = $(this).data('icone');
        swal({
            title: "Você Esta Certo Disso?",
            text: "Voce ira deletar um icone da sua lista!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("Icone Excluido com sucesso!", {
                    icon: "success",
                }).then(function(){
                    $.post("{{ url("/icone/") }}/"+id, { _method: "DELETE", _token: "{{ csrf_token() }}" }
                    )
                    window.location.reload();
                });
            } else {
                swal("Você cancelou a exclusão do icone!");
        }
    });
});

</script>

@stop