@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Mapa</div>
        <div class="panel-body">
            <div id="map" style="height:65%;position: relative;width: 100%;"></div>
        </div>
    </div>
@stop

<script type="text/javascript">
    var map;
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: -22.782946, lng: -43.431588},
      zoom: 14,
      disableDefaultUI: true,
    });
    var markers = [];
    let infowindow;

    @foreach($conteudos as $conteudo)
        var teste3 = '{{$conteudo->icon->nomeicone}}'
        var marker_{{ $conteudo->id }} = new google.maps.Marker({
            position: new google.maps.LatLng( {{ $conteudo->lat }} , {{ $conteudo->lng }}), // variável com as coordenadas Lat e Lng
						map: map,
                        icon: teste3,
						title:"{{ $conteudo->titulo }}",
						animation: google.maps.Animation.DROP,
        });


        
        var content = 	'<div id="iw-container">'+
                            '<div class="iw-title">'+
                                '<p><b>{{ $conteudo->categoria->nome }}</b></p>' +
                            '</div>'+
                            '<div class="iw-content">' +
		                    	'<p>{{ $conteudo->nome }}</p>'+
		                    '</div>' +
                            '<div class="iw-content">' +
                                '@for ($i = 0; $i < count($conteudo->informacao); $i++)'+
                                    '<p>'+
                                        '<b><td>{{$conteudo->informacao[$i]->titulo}}</td></b>: ' +
                                        '<td>{{$conteudo->informacao[$i]->dado}}</td>' +
                                    '</p>'+
                                '@endfor'+
                            '</div>'
                        '</div>';
      console.log(content);
                        
				  	// A new Info Window is created and set content
				  	let infoWindow_{{ $conteudo->id }} = new google.maps.InfoWindow({content: content, maxWidth: 350});
				  	google.maps.event.addListener(infoWindow_{{ $conteudo->id }}, 'domready', function() {
                        
					});
					google.maps.event.addListener(marker_{{ $conteudo->id }}, 'mouseover', () => {
						if(infowindow)
							infowindow.close();
    					infoWindow_{{ $conteudo->id }}.open(map, marker_{{ $conteudo->id }});
    					infowindow = infoWindow_{{ $conteudo->id }};
  					});
					markers.push(marker_{{ $conteudo->id }});

        
    @endforeach
}

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ&callback=initMap"
  async defer></script> 

  