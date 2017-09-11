@extends('layouts.material')

@section('titulo')

@endsection

@section('content')

 	<div class="row col-md-12" >
		<div id="map-canvas" class="mapa"></div>
	</div>

@endsection


@push('scripts')
   
   <script src="http://maps.google.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ"></script>
   <script src="{{ asset("js/marker-clusterer/src/markerclusterer.js") }}" type="text/javascript" charset="utf-8" async defer></script>

   <script>

		// variável que indica as coordenadas do centro do mapa
		var prefeitura = new google.maps.LatLng(-22.78294600,-43.43158800);





		function initialize() {
			var mapOptions = {
				center: prefeitura, // variável com as coordenadas Lat e Lng
				animation: google.maps.Animation.DROP,
				zoom: 14,
				mapTypeId: google.maps.MapTypeId.roadmap
			};

			var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);

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
						content: "<p>{{ $solicitacao->servico->nome }}</p><br/><img src='{{ $solicitacao->foto }}' width='100px;'/>"
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
             MaxZoom: 13,	
             gridSize: 10,
         };

         var markerCluster = new MarkerClusterer(map, markers, options);
		}


		google.maps.event.addDomListener(window, 'load', initialize);

   </script>


@endpush

