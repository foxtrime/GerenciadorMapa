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
      zoom: 14
    });
}
  
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYcLJZYyy0T-9KTp-hmSd-r2H9sSNiY-s&callback=initMap"
  async defer></script> 