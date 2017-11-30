@extends('layouts.material')

@section('titulo')

@endsection

@section('content')

 	<div class="row col-md-12" >
		<div id="map-canvas" class="mapa" >
			

			<div id="loading" style="position: absolute; width: 100%; top: 88px; color: #fff; font-weight: bold; font-size: 18px;">
				<img class="center-block" src="{{ asset('img/DoubleRing.gif') }}" />	
				<p class="jvectormap-legend-title" ">Carregando</p>
			</div>
		
		</div>
	</div>

@endsection


@push('scripts')
   <script src="https://maps.google.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ"></script>
   
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

				  	// InfoWindow content
				  	var content = 	'<div id="iw-container">' +
			                    		    '<div class="iw-title" style="background-color:{{ $solicitacao->servico->setor->cor }}">'+
			                    			'<span class="mdi {{ $solicitacao->servico->setor->icone }}" style="margin-right: 20px"></span>'+
			                    			    '{{ $solicitacao->servico->nome }}'+
			                    		    '</div>' +
				                            '<div class="iw-content">' +
			                      			'<img src="{{ $solicitacao->foto }}"  width="40%">' +
		                      				'<p>{{ $solicitacao->conteudo }}</p>' +
		                    			    '</div>' +
		                    			    '<div class="iw-bottom-gradient"></div>' +
		                  		        '</div>';

				  	// A new Info Window is created and set content

				  	let infoWindow_{{ $solicitacao->id }} = new google.maps.InfoWindow({content: content, maxWidth: 350});


				  	google.maps.event.addListener(infoWindow_{{ $solicitacao->id }}, 'domready', function() {
						// Reference to the DIV that wraps the bottom of infowindow
						var iwOuter = $('.gm-style-iw');

						/* Since this div is in a position prior to .gm-div style-iw.
						* We use jQuery and create a iwBackground variable,
						* and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
						*/
						var iwBackground = iwOuter.prev();

						// Removes background shadow DIV
						iwBackground.children(':nth-child(2)').css({'display' : 'none'});

						// Removes white background DIV
						iwBackground.children(':nth-child(4)').css({'display' : 'none'});

						// Moves the infowindow 115px to the right.
						iwOuter.parent().parent().css({left: '115px'});

						// Moves the shadow of the arrow 76px to the left margin.
						iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

						// Moves the arrow 76px to the left margin.
						iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

						// Changes the desired tail shadow color.
						iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

						// Reference to the div that groups the close button elements.
						var iwCloseBtn = iwOuter.next();

						// Apply the desired effect to the close button
						iwCloseBtn.css({opacity: '1', right: '38px', top: '3px', border: '7px solid #bfa15f', 'border-radius': '13px', 'box-shadow': '0 0 5px #3990B9', width: '27px', height: '27px', backgroundColor: '#bfa15f'});

						// If the content of infowindow not exceed the set maximum height, then the gradient is removed.
						if($('.iw-content').height() < 140){
							$('.iw-bottom-gradient').css({display: 'none'});
						}

						// The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
						iwCloseBtn.mouseout(function(){
							$(this).css({opacity: '1'});
						});
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
		 	var markerCluster = new MarkerClusterer(map, markers,{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      
		}



	


		google.maps.event.addDomListener(window, 'load', initialize);





   </script>


@endpush

