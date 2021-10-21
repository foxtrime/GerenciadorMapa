<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Gerenciador Mapa</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
            
        <script src="{{ asset('js/meu.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous">
        </script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/meu.css') }}" rel="stylesheet">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height:100%;
       
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <div id="mySidenav" class="sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            {{-- onchange="filterMarkers()" dentro do input --}}
                           
                            @foreach($categorias as $dado)
                        <p><input id="{{$dado->id}}" value="{{$dado->id}}" type="checkbox" onchange="filterMarkers(this,'{{$dado->id}}')" checked/>
                                {{$dado->nome}}</p>
                            @endforeach
                           
                        </div>
                        <!-- Use any element to open the sidenav -->
                        <button style="
                        font-size: 13;
                        height: 35px;
                        background-color: #630909;
                        border: none;
                        color: white;
                        padding-top: -1px;" 
                        onclick="openNav()">Filtro</button>
                        
                        <script>
                            function openNav() {
                                document.getElementById("mySidenav").style.width = "250px";
                            }

                        /* Set the width of the side navigation to 0 */
                            function closeNav() {
                                document.getElementById("mySidenav").style.width = "0";
                            }
                        </script>
                    </ul> 
                    
                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->

                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div id="map" ></div>
    <script>
      var map;
      var markers = [];
      //console.log(markers);
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: -22.782946, lng: -43.431588},
      zoom: 14,
    });
    let infowindow;

    //console.log(markers);

    
    @foreach($conteudos as $conteudo)
        var teste3 = '{{$conteudo->icon->nomeicone}}'
        var marker_{{ $conteudo->id }} = new google.maps.Marker({
            position: new google.maps.LatLng( {{ $conteudo->lat }} , {{ $conteudo->lng }}), // variável com as coordenadas Lat e Lng
						map: map,
                        icon: teste3,
						title:"{{ $conteudo->titulo }}",
						animation: google.maps.Animation.DROP,
                        categoria_id: {{$conteudo->categoria_id}},
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

        // console.log(marker_{{ $conteudo->id }});

        

    @endforeach
}

function show(categoria_id) {
  for (var i=0; i<markers.length; i++) {
    if (markers[i].categoria_id == categoria_id) {
      markers[i].setVisible(true);
    }
  }
  // == check the checkbox ==
  document.getElementById(categoria_id+"box").checked = true;
}

// == hides all markers of a particular category, and ensures the checkbox is cleared ==
function hide(categoria_id) {
  for (var i=0; i<markers.length; i++) {
    if (markers[i].categoria_id == categoria_id) {
      markers[i].setVisible(false);
    }
  }
  // == clear the checkbox ==
  document.getElementById(categoria_id+"box").checked = false;
  // == close the info window, in case its open on a marker that we just hid
  ib.close();
}


function filterMarkers(box,categoria_id){
    if (box.checked) {
    show(categoria_id);
  } else {
    hide(categoria_id);
  }
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKXO_82UDrqpwwfR16HC7fnpFOHTmLyYs&callback=initMap" async defer>
</script>
     
     
  </body>
</html>