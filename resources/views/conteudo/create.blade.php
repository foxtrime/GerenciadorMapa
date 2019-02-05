@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Criar Marcador</h1>
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Conteudo</div>
        <div class="panel-body">
            <form method="POST" action="{{ url('conteudo') }}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating has-roxo is-empty">
                            <label style="padding-right: 30px;" class="control-label">Selecione o icone</label>
                            {{-- @foreach ($icons as $icone)
                                <img src="{{$icone->nomeicone}}" alt="">
                            @endforeach        --}}
                            <select name="icon_id" id="icon_id" class="iconselect">
                                <option value="" selected>Escolha um Icone </option>
                                @foreach ($icons as $icone)
                                    <option value="{{$icone->id}}" data-image="{{$icone->nomeicone}}"></option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group label-floating has-roxo is-empty">
				        	<label class="control-label">Selecione a categoria</label>
				        		<select name="categoria_id" id="categoria_id" class="form-control form-control error" required>
				        			<option value="" selected> </option>
				        		@foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}"> {{$categoria->nome}} </option> 
                                @endforeach
				        	    </select>
				        	<span class="material-input"></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome" required>
                        </div>

                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="text" class="form-control" name="lat" id="lat" required>
                        </div>

                        <div class="form-group">
                            <label for="lng">Longitude</label>
                            <input type="text" class="form-control" name="lng" id="lng" required>
                        </div>

                    <div id="dados">
                        {{-- Btn --}}
                        <div class="form-group">
                            <h4>Criar Campo</h4>
                            <button type="button" class="small tiny alert clonarcampo"></button>
                        </div>
                        {{-- Fim Btn --}}


                        {{-- Campo Dados Hide --}}
                        <div class="form-group box_dados hide">
                            <label for="lng">Titulo</label>
                            <input type="text" class="form-control" name="titulo[]">
                            <label for="lng">Descrição</label>
                            <input type="text" class="form-control" name="dado[]">
                            <input type="button" class="button tiny success btn_exclui" value="Remover"  />
                        </div>
                        {{-- Fim Campo Dados Hide --}}
                    </div>

                    </div>
                <div class="col-md-6">
                    <div id="map" style="position: relative;overflow: hidden;width: 100%;height: 400px;"></div>
                </div>
                </div>

                <div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="button" class="btn btn-secondary" onclick = "history.back ()">Cancelar</button>
                </div>
            </form>
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script language="javascript">
    $(document).ready(function(e) {
        try {
            $('.iconselect').msDropDown();
        } catch(e) {
        alert(e.message);
        }
    });
</script>
    <script>
        $(document).ready(function() {
           $('.clonarcampo').click(function(){
			    $clone = $('.box_dados.hide').clone(true);
                $clone.removeClass('hide');
			    $('#dados').append($clone);
            });
            
            $('.btn_exclui').click(function(){
			    $(this).parents('.box_dados').remove();
			});
        }); 
    </script>
    <script type="text/javascript">
        var map;
        var marker;

        function placeMarker(location) {
            if (marker) {
                //if marker already was created change positon
                marker.setPosition(location);
            } else {
                //create a marker
                marker = new google.maps.Marker({          
                    position: location,
                    map: map,
                    // draggable: true
                });
            }
        }

        function initMap(){
            var centerPosition = new google.maps.LatLng(-22.782946,-43.431588);
            var options = {
                zoom: 14,
                center: centerPosition,
                //disableDefaultUI: true,
                mapTypeId: 'roadmap',

            };

            map = new google.maps.Map($('#map')[0], options);

            google.maps.event.addListener(map, 'click', function(evt){
                placeMarker(evt.latLng);
                var latLng = evt.latLng;
                console.log(latLng);
                var lat = $('#lat');
                var lng = $('#lng');

                lat.val(latLng.lat());
                lng.val(latLng.lng());
            });

                google.maps.event.addDomListener(window, 'load', initMap);
            } 

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ&libraries=places&callback=initMap"
    async defer></script> 
</div>
@stop

