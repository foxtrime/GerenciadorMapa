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
				        	<label class="control-label">Selecione a categoria</label>
				        		<select name="categoria" id="categoria" class="form-control form-control error" required>
				        			<option value="" selected> </option>
				        		@foreach ($categorias as $categoria)
                                    <option value="{{$categoria->nome}}"> {{$categoria->nome}} </option> 
                                @endforeach
				        	    </select>
				        	<span class="material-input"></span>
                        </div>
                        
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" id="nome">
                        </div>

                        <div class="form-group">
                            <label for="lat">Latitude</label>
                            <input type="text" class="form-control" name="lat" id="lat">
                        </div>

                        <div class="form-group">
                            <label for="lng">Longitude</label>
                            <input type="text" class="form-control" name="lng" id="lng">
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
<script type="text/javascript">
    var map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: -22.782946, lng: -43.431588},
            zoom: 14,
        });
        map.addListener('click', function(e) {
    placeMarkerAndPanTo(e.latLng, map);
  });
    }
    function placeMarkerAndPanTo(latLng, map) {
  var marker = new google.maps.Marker({
    position: latLng,
    map: map
  });
  map.panTo(latLng);
}
    


          
</script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYcLJZYyy0T-9KTp-hmSd-r2H9sSNiY-s&callback=initMap"
        async defer></script> 
    </div>
@stop

