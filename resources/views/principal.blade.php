@extends('layouts.material')

@section('titulo')


   {{-- <img class="img" style="width: 100px; margin-top: -15px;" src="{{ asset('img/logo-360-roxo.png')}}"> --}}

@endsection

@section('content')

<br><br>

{{-- Navegação entre as páginas --}}

<div class="row ">
   
   {{-- Início da Solicitação --}}
   <div class="infinite-scroll">
      @foreach ($solicitacoes as $solicitacao)
         <div class="col-sm-2 col-sm-offset-5 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3">
            <div class="card">
               {{-- Avatar do usuário --}}
               <div class="card-header card-header-icon avatar-fixo">
                  <img class="img" src="{{ $solicitacao->solicitante->foto }}"/>
               </div>

               <div class="card-header card-header-icon avatar-status pull-right" 
                  data-background-color style="background-color: {{ $solicitacao->servico->setor->cor }};">
                  {{-- <i class="material-icons">language</i> --}}
                  <span class="mdi {{ $solicitacao->servico->setor->icone }}" style="font-size: 30px"></span>
               </div>

               <div class="nome-solicitante-card ">{{ $solicitacao->solicitante->nome}}</div>
               <div class="data-inclusao-card ">Adicionado {{ $solicitacao->created_at->diffForHumans()}}</div>

                  
               {{-- Foto da publicação --}}
               <div class="card-image">
                  <span class="label label-danger"></span>
                     <a href="#">
                        <img class="img" src="{{ $solicitacao->foto }}" >
                     </a>
               </div>

               @if($solicitacao->endereco)
                  <span class="endereco" 
                        onclick="mostraMapa({{ $solicitacao->endereco->latitude }},{{ $solicitacao->endereco->longitude }},{{ $solicitacao->id }});">
                     
                     <i class="material-icons" style="font-size: 20px; margin-top: 5px;">place</i>  

                     {{ $solicitacao->endereco->logradouro }} 
                     {{ $solicitacao->endereco->numero }} -
                     {{ $solicitacao->endereco->bairro }} -
                     {{ $solicitacao->endereco->cep }} 
                  </span>

                  <div id="LocalMapa_{{ $solicitacao->id }}" class="mapa">

                  </div>

               @endif

               {{-- Título da solicitação --}}
               <div class="card-content">
                  <div class="card-title">
                     <p class="col-md-12">
                        <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                           {{-- <i class="material-icons">label_outline</i> --}}
                           <span class="mdi {{ $solicitacao->servico->setor->icone }}"></span>
                        </button>
                        <b> {{ $solicitacao->servico->nome }} </b>
                     </p>
                  </div>
                  <div class="timeline-body col-md-12">
                     {{ $solicitacao->conteudo }}
                  </div>
               </div>

               {{-- Botões de interação --}}
               <ul class="nav navbar-nav">
                  @if(Auth::check())
                     <li class="col-md-3">
                        {{-- se tiver apoio do usuario logado fica em roxo (class=apoiar) --}}

                        @if(in_array($solicitacao->id, $meus_apoios_ids))
                           <button class="btn btn-simples btn-apoiar apoiar" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})" >
                              <span class="btn-label"> <i class="material-icons">thumb_up</i> Apoiar </span>
                           </button>
                        @else
                           <button class="btn btn-simples btn-apoiar" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})" >
                              <span class="btn-label"> <i class="material-icons">thumb_up</i> Apoiar </span>
                           </button>
                        @endif
                     </li>
                  @else
                     <li class="col-md-4">
                        <button class="btn btn-simple helper-apoio">
                           <span class="btn-label"> <i class="material-icons">thumb_up</i> Apoiar </span>
                        </button>
                     </li>
                  @endif

                  {{-- se tiver comentarios fica em roxo --}}
                  <li class="col-md-5">
                     @if($solicitacao->solicitacoes_count >= 1)
                        <button class="btn btn-simple slide-coment btn_comentario_{{ $solicitacao->id }}">
                           <span class="btn-label apoiar"> <i class="material-icons">chat</i> Comentários </span>
                        </button>
                     @else
                        <button class="btn btn-simple slide-coment btn_comentario_{{ $solicitacao->id }}">
                           <span class="btn-label "> <i class="material-icons">chat</i> Comentários </span>
                        </button>
                     @endif
                  </li>


                  <li class="col-md-3">
                     <button class="btn btn-simples btn_apoios_{{ $solicitacao->id }}">
                        @if($solicitacao->apoiadores_count > 1)
                           <span class="btn-label apoiar"> <i class="material-icons">favorite</i> </span>
                           <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span> Apoios </span>
                        @elseif($solicitacao->apoiadores_count == 1)
                           <span class="btn-label apoiar"> <i class="material-icons">favorite</i> </span>
                           <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span> Apoio </span>
                        @else
                           <span class="btn-label"> <i class="material-icons">favorite</i> </span>
                           <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span> Apoio </span>
                        @endif
                     </button>
                  </li>
               </ul>

               {{-- Comentários --}}
               <footer class="colapso col-md-12">

                     <div class="comentarios">
                  
                        @foreach ($solicitacao->comentarios as $comentario)
                           {{-- card de comentarios --}}
                           <div class="panel-body no-padding">

                              {{-- Caso a comentario seja do próprio solicitante, mostrar a foto à esquerda --}}
                              @if ($comentario->funcionario)                    
                                 {{-- comentario do funcionário --}}
                                 <div class="card margin10">

                                    {{-- Avatar pequeno --}}
                                    <div class="card-header card-header-icon avatar-fixo-pn pull-right">
                                       <img class="img" src="{{ asset('img/brasao.png')}}"/>
                                    </div>

                                    {{-- Comentário --}}
                                    <form class="form-horizontal card-secretaria">
                                       <div class="row">

                                          {{-- Nome da secretária --}}
                                          <label class="h6 pull-right fc-rtl nome-secretaria">
                                             {{ $comentario->funcionario->setor->secretaria->nome }} - 
                                             {{ $comentario->funcionario->setor->secretaria->sigla }}
                                          </label>
                                          {{-- Comentário --}}
                                          <div class="col- fc-rtl">
                                             <div class="form-group col-md-7 pull-right no-margin">
                                                <p class="form-control-static">
                                                   {{ $comentario->comentario }}
                                                </p>
                                             </div>
                                          </div>
                                       </div>
                                    </form> {{-- Fim Comentário --}}
                                 </div>
                              @else
                                 {{-- comentario do solicitante --}}
                                 <div class="card margin10">

                                    {{-- Menu para editar comentário --}}
                                    @isset($usuario)
                                       @if ($usuario->solicitante->id == $solicitacao->solicitante->id )
                                          <div class="dropdown col-md-12 nav navbar-nav absoluto no-padding">
                                             <a href="#" class="btn btn-xs btn-simples dropdown-toggle rodar-icone pull-right" data-toggle="dropdown">
                                                <i class="material-icons">settings</i>
                                             </a>
                                             <ul class="dropdown-menu pull-right">
                                                <li>
                                                   <a href="#eugen" class="btn-coment-del">
                                                      <i class="material-icons">clear</i> Excluir
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       @endif
                                    @endisset

                                    {{-- Avatar pequeno --}}
                                    <div class="card-header card-header-icon avatar-fixo-pn">
                                        <img class="img" src="{{ $solicitacao->solicitante->foto }}"/>
                                    </div>

                                    {{-- Comentário --}}
                                    <form class="form-horizontal">

                                       {{-- Nome do usuário --}}
                                       <div class="row">
                                          <label class="col-md-8 h6 nome-solicitante">
                                             {{ $solicitacao->solicitante->nome}}
                                          </label>

                                          {{-- Comentário Fixo --}}
                                          <div class="col- coment-fix">
                                             <div class="form-group col-md-7 no-margin">
                                                <p class="form-control-static">{{ $comentario->comentario }}</p>
                                             </div>
                                          </div>
                                       </div>
                                    </form> {{-- Fim Comentário --}}
                                 </div>
                              @endif
                              {{-- </div> fim card em panel-body --}}
                           </div> {{-- fim panel-body --}}
                           {{-- fim do card de comentarios --}}
                        @endforeach

                     </div>

                  {{-- Escrever comentário --}}

                  <div class="">
                     @isset($usuario)
                        {{-- {{ dd($usuario) }} --}}
                        {{-- {{ $usuario->solicitante->id }} = {{ $solicitacao->solicitante->id }}  --}}

                        {{-- Escrever comentário --}}
                        @if ($usuario->solicitante->id == $solicitacao->solicitante->id ) 
                           <div class="card col-md-10 margin10">
                              <div class="input-group">
                                 <input type="text" id="comentario" name="comentario" class="form-control comentario_{{ $solicitacao->id }}" placeholder="Escreva um comentário" >
                                 <span class="input-group-addon">
                                    <button type="button" class="btn btn-primary btn-sm" 
                                             onclick="enviaComentario({{$solicitacao->id }},{{$usuario->solicitante->id }},'{{$usuario->solicitante->nome}}','{{$usuario->solicitante->foto}}')">
                                       Enviar
                                    </button>
                                 </span>
                              </div>
                           </div>
                        @endif
                     @endisset
                  </div>
                  {{-- Fim escrever comentário --}}
               </footer>
            </div> {{-- fim card em DIV publicação --}}
         </div> {{-- Fim DIV PUBLICAÇÃO --}}
      @endforeach
      {{ $solicitacoes->links() }}
      {{-- Fim da Solicitação --}}
   </div>
</div> {{-- Fim da ROW --}}

@endsection


@push('scripts')

   <script src="http://maps.google.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ"></script>

   <script src="{{ asset("js/handlebars.js") }}" type="text/javascript" charset="utf-8" async defer></script>

   
   <script id="comentario-template" type="text/x-handlebars-template">
      @verbatim
         <div class="panel-body no-padding">
            <div class="card margin10">
               <div class="dropdown col-md-12 nav navbar-nav absoluto no-padding">
                  <a href="#" class="btn btn-xs btn-simples dropdown-toggle rodar-icone pull-right" data-toggle="dropdown">
                     <i class="material-icons">settings</i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                     <li>
                        <a href="#eugen" class="btn-coment-del">
                           <i class="material-icons">clear</i> Excluir
                        </a>
                     </li>
                  </ul>
               </div>
         

               <div class="card-header card-header-icon avatar-fixo-pn">
                   <img class="img" src="{{ foto }}"/>
               </div>

               <form class="form-horizontal">

                  <div class="row">
                     <label class="col-md-8 h6">
                        {{ nome }}
                     </label>

                     <div class="col- coment-fix">
                        <div class="form-group col-md-7 no-margin">
                           <p class="form-control-static">{{ comentario }}</p>
                        </div>
                     </div>
                     
                  </div>
               </form>
            </div>
      </div>

      @endverbatim
   </script>
   {{-- Fim do Template do Handlebars --}}


   <script type="text/javascript">

      @if(Auth::check())
         var id_usuario = {{ Auth::user()->id }};
      @endif

      function mostraMapa(latitude,longitude,solicitacao) {
         //console.log(latitude, longitude);
         if ($("#LocalMapa_"+solicitacao).css('height') == "0px")
         {
            $("#LocalMapa_"+solicitacao).css('height', "300px"); 

            // Esperar 200ms para executar o mapa (o tempo que o mapa demora para abrir)

            setTimeout(function(){

               var mapProp = {center:new google.maps.LatLng(latitude, longitude),zoom:18};
               var map     = new google.maps.Map(document.getElementById('LocalMapa_'+solicitacao),mapProp);

               let marker = new google.maps.Marker({
                  map: map,
                  animation: google.maps.Animation.DROP,
                  position: map.getCenter()
               });

            },200);

         }else{
            $("#LocalMapa_"+solicitacao).css('height',"0");
         }
      }

      function enviaComentario(solicitacao, solicitante, nome, foto){ 
         console.log("enviou comentario: " +solicitacao +" - " +solicitante);

         var comentario = $(".comentario_"+solicitacao).val().trim();

         // Testar se a comentario está em branco
         if( $(".comentario_"+solicitacao).val().trim() ) {
               console.log("Texto do COmentário", comentario);
             // Enviar a comentario para o banco
             $.post(
                 "{{ url('/comentario') }}",
                 {
                     comentario: comentario,
                     solicitacao_id: solicitacao, 
                     _token: "{{ csrf_token() }}",
                 }, function(data){        
                     console.log("Resposta");
                     console.log(data);
                 }       
             );

             // Apagar o campo de envio de comentario
             $(".comentario_"+solicitacao).val("");

             // Colocar o novo card de comentarios embaixo da solicitação
             var source      = $("#comentario-template").html();
             var template    = Handlebars.compile(source)

             var context     = { nome:          nome,
                                 comentario:    comentario, 
                                 foto:          foto  
                               };

             var html        = template(context);

             $("div.comentarios").append( $(html) );
             //console.log(html);
         }else{
             console.log("vazio");
         }
      };


      function enviaApoio(solicitacao, solicitante){ 
         console.log("enviou " +solicitacao +" - " +solicitante);

         $.post(
            "{{ url('/apoiar') }}",
            {
               solicitante_id: solicitante,
               solicitacao_id: solicitacao, 
               _token: "{{ csrf_token() }}",
            }, function(data){        
               $("span.numero_apoios_"+solicitacao).html(data);

               if(data > 0)
               {
                  $(".btn_apoios_"+solicitacao).addClass('apoiar');
               }
               else
               {  
                  $(".btn_apoios_"+solicitacao).removeClass('apoiar');
               }
            }       
         );
      };

   </script>

   <script type="text/javascript">
      $(document).ready(function() {

         $('ul.pagination').hide();
         $(function() {
            $('.infinite-scroll').jscroll({
               autoTrigger: false,
               loadingHtml: '<img class="center-block" src="/img/loading.gif" alt="Loading..." />',
               padding: 0,
               nextSelector: '.pagination li.active + li a',
               contentSelector: 'div.infinite-scroll',
               callback: function() {
                  $('ul.pagination').remove();
               }
            });
         });

         var tempo = 0;
         var incremento = 500;

             // Testar se há algum erro, e mostrar a notificação
         @if ($errors->any())
             @foreach ($errors->all() as $error)
                 setTimeout(function(){demo.notificationRight("top", "right", "rose", "{{ $error }}"); }, tempo);
                 tempo += incremento;
             @endforeach
         @endif
         demo.initFormExtendedDatetimepickers();
      });
   </script>

@endpush

