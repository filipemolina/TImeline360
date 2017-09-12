@extends('layouts.material')

@section('titulo')

@endsection

@section('content')

 	<div class="row col-md-12" >
		<div id="map-canvas" class="mapa" >
			

			<div id="loading" style="position: absolute; width: 100%; top: 88px; color: #fff; font-weight: bold; font-size: 18px;">
				<img class="center-block" src="/img/DoubleRing.gif" />	
				Carregando
			</div>
		
		</div>
	</div>

@endsection


@push('scripts')
   <script src="http://maps.google.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ"></script>
   
   <script src="{{ asset("js/geoxml3/polys/geoxml3.js") }}" type="text/javascript"></script>
   
   <script src="{{ asset("js/marker-clusterer/src/markerclusterer.js") }}" type="text/javascript" charset="utf-8" async defer></script>

   <script>
		
		function initialize() {
			// variável que indica as coordenadas do centro do mapa
			let prefeitura = new google.maps.LatLng(-22.782946,-43.431588);

			let mapOptions = {
				center: prefeitura, // variável com as coordenadas Lat e Lng
				animation: google.maps.Animation.DROP,
				zoom: 14,
				mapTypeId: google.maps.MapTypeId.roadmap
			};
			
			var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

			//camada limite do municipio
		 	var geoXml = new geoXML3.parser({map: map, zoom: false});
		   geoXml.parse('js/marker-clusterer/images/mesquita3.kml');


			//camada de tráfego
			var trafficLayer = new google.maps.TrafficLayer();
        	trafficLayer.setMap(map);


			// variável que define o URL para a nova imagem do marcador
			var minhaImagem = 'img/brasao.png';
		 	var markers = [];
		 	let infowindow;

			@foreach($solicitacoes as $solicitacao)
				@if(count($solicitacao->endereco))
					<?php $endereco = json_decode($solicitacao->endereco); ?>

					var marker_{{ $solicitacao->id }} = new google.maps.Marker({
						position: new google.maps.LatLng( {{ $endereco->latitude }} , {{ $endereco->longitude }}), // variável com as coordenadas Lat e Lng
						map: map,
						title:"{{ $solicitacao->servico->nome }}",
						animation: google.maps.Animation.DROP,
					});

					let infoWindow_{{ $solicitacao->id }} = new google.maps.InfoWindow({
						content: "<p>{{ $solicitacao->servico->nome }}</p><br/><img src='{{ $solicitacao->foto }}' width='50%;'/>"
  					});                        
					
					google.maps.event.addListener(marker_{{ $solicitacao->id }}, 'click', () => {

						if(infowindow)
							infowindow.close();

    					infoWindow_{{ $solicitacao->id }}.open(map, marker_{{ $solicitacao->id }});

    					infowindow = infoWindow_{{ $solicitacao->id }};
  					});

					markers.push(marker_{{ $solicitacao->id }});
				@endif
			@endforeach
			

         var options = {
             imagePath: '{{ asset("js/marker-clusterer/images/m") }}',
             MaxZoom: 14,	
             averageCenter: true,
             gestureHandling: 'auto',
             zoomOnClick: false,
             //minimumClusterSize: 10,
             gridSize: 20,
         };

         var markerCluster = new MarkerClusterer(map, markers, options);
		}

    	
		google.maps.event.addDomListener(window, 'load', initialize);





   </script>


@endpush

