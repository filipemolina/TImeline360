@extends('layouts.material')

@section('titulo')

Principal

@endsection

@section('content')

<br><br>

<div class="row">

   <div class="infinite-scroll">

    {{-- Início da Solicitação --}}

      @foreach ($solicitacoes as $solicitacao)
                       
         <div class="col-md-6 col-md-offset-3 top-alterado">

            {{-- Card mestre --}}
            <div class="card">

               {{-- Avatar do usuário --}}
               <div class="card-header card-header-icon card-avatar-fixo ">                
                  <img src="{{ $solicitacao->solicitante->foto }}"/>
               </div>

               <div class="nome-solicitante-card"> {{ $solicitacao->solicitante->nome}}</div>

               {{-- Nome do usuário --}}
               {{-- <span class="card-avatar-label has-roxo">{{ $solicitacao->solicitante->nome}}</span> --}}

               {{-- Avatar Status da publicação --}}
               <div class="card-avatar-status pull-right" data-background-color style="background-color: {{ $solicitacao->servico->setor->cor }};">
                  <span class="mdi {{ $solicitacao->servico->setor->icone }}"></span>
               </div>
                  
               {{-- Foto da publicação --}}

               @if($solicitacao->endereco)

                  <div class="card-image alterado">
                     <a href="#">
                        <img src="{{ $solicitacao->foto }}" >

                        {{-- Tempo de postagem --}}
                        <span class="label top previnir" style="background-color: {{ $solicitacao->servico->setor->cor }};">
                           Adicionado {{ $solicitacao->created_at->diffForHumans()}}
                        </span>
                     </a>
                  </div>

                  {{-- Endereço --}}
                  <span class="endereco label has-roxo-hover" onclick="mostraMapa({{ $solicitacao->endereco->latitude }},{{ $solicitacao->endereco->longitude }},{{ $solicitacao->id }});">
                        <i class="material-icons">place</i>
                        {{ $solicitacao->endereco->logradouro }} 
                        {{ $solicitacao->endereco->numero }} -
                        {{ $solicitacao->endereco->bairro }} -
                        {{ $solicitacao->endereco->cep }} 
                  </span>

                  <div id="LocalMapa_{{ $solicitacao->id }}" class="mapa"></div>

               @endif

               {{-- Título da solicitação --}}
               <div class="card-content" style="padding-top: 0px;">
                  <div class="card-title">
                     <p class="col-md-12" style="margin-bottom: 0px;">
                        <button class="btn btn-just-icon grande btn-simples btn-xs btn-primary" style="color: {{ $solicitacao->servico->setor->cor }};">
                           {{-- <i class="material-icons">label_outline</i> --}}
                           <span class="mdi {{ $solicitacao->servico->setor->icone }}" ></span>
                        </button>
                        
                        <b> {{ $solicitacao->servico->nome }} </b>

                        {{-- Opções do Solicitação --}}
                        @isset($usuario)

                           @if ($usuario->solicitante->id == $solicitacao->solicitante->id )

                              <div class="opcoes_card">
                                 <div class="dropdown col-md-12 nav navbar-nav absoluto no-padding">
                                    <a href="#" class="btn btn-xs btn-simples dropdown-toggle rodar-icone pull-right" data-toggle="dropdown">
                                       <i class="material-icons">settings</i>
                                    </a>
                                    
                                    <ul class="dropdown-menu has-roxo pull-right">
                                       {{-- <li>
                                          <a href="#eugen" class="btn-coment-del">
                                             <i class="material-icons">create</i> Editar
                                          </a>
                                       </li> --}}
                                       <li>
                                          <a href="#eugen" class="btn-coment-del">
                                             <i class="material-icons">clear</i> Excluir
                                          </a>
                                       </li>
                                    </ul>
                                 </div>

                                 <div style="clear: both"></div>
                              </div>

                           @endif

                        @endisset
                                 
                     </p>
                  </div>
                  
                  <div class="timeline-body col-md-12">
                     {{ $solicitacao->conteudo }}
                  </div>
               </div> {{-- Fim título da solicitação --}}

               {{-- Botões de interação --}}
               <ul class="nav navbar-nav">
                   
                  @if(Auth::check())

                     <li class="col-md-3">
                              
                        {{-- se tiver apoio do usuario logado fica em roxo (class=apoiar) --}}
                        @if(in_array($solicitacao->id, $meus_apoios_ids))
                           
                           <button class="btn btn-simples btn-apoiar apoiar" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})">
                              <span class="btn-label"> <i class="material-icons">thumb_up</i> Apoiar </span>
                           </button>

                        @else
                           
                           <button class="btn btn-simples btn-apoiar" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})" >
                              <span class="btn-label"> <i class="material-icons">thumb_up</i> Apoiar </span>
                           </button>

                        @endif

                     </li>

                  @else

                     {{-- Aviso que preciso logar para apoiar (class=helper-apoio) --}}
                     <li class="col-md-3">
                        <button class="btn btn-simple helper-apoio">
                           <span class="btn-label"> <i class="material-icons">thumb_up</i> Apoiar </span>
                        </button>
                     </li>
                     
                  @endif

                  {{-- se tiver comentarios fica em roxo --}}
                  <li class="col-md-5">
                        
                     @if($solicitacao->comentarios_count >= 1)

                        <button class="btn btn-simple slide-coment btn_comentario_{{ $solicitacao->id }}">
                           <span class="btn-label apoiar"><i class="material-icons">chat</i>Comentários</span>
                        </button>

                     @else

                        <button class="btn btn-simple slide-coment btn_comentario_{{ $solicitacao->id }}">
                           <span class="btn-label"><i class="material-icons">chat</i>Comentários</span>
                        </button>

                     @endif

                  </li>

                  {{-- Contador de apoios --}}
                  <li class="col-md-3">

                     <button class="btn btn-simples btn_apoios_{{ $solicitacao->id }}">
                              
                        @if($solicitacao->apoiadores_count > 1)

                           <span class="btn-label apoiar"> <i class="material-icons">favorite</i> </span>
                           <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span>
                           <span> Apoios </span>

                        @elseif($solicitacao->apoiadores_count == 1)

                           <span class="btn-label apoiar"> <i class="material-icons">favorite</i> </span>
                           <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span>
                           <span> Apoio </span>

                        @else

                           <span class="btn-label"> <i class="material-icons">favorite</i> </span>
                           <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span>
                           <span> Apoio </span>

                        @endif
                           
                     </button>
                  </li>
               </ul>

               {{-- Comentários --}}
               <footer class="colapso col-md-12">
                  
                  <div class="comentarios">

                     @foreach ($solicitacao->comentarios->sortBy('created_at') as $comentario)
                      
                        {{-- card de comentarios --}}
                        <div class="panel-body no-padding comentario_{{ $comentario->id }}">

                           {{-- Comentário do funcionário --}}
                           @if ($comentario->funcionario)

                              <div class="card margin10 dourado">

                                 {{-- Avatar pequeno a direita para indicar que é a prefeitura--}}
                                 <div class="card-header card-header-icon avatar-fixo-pn pull-right">
                                    <img class="img" src="{{ asset('img/brasao.png')}}"/>
                                 </div>

                                 {{-- Nome da secretária --}}
                                 <label class="col-md-10 pull-right fc-rtl">
                                    {{ $comentario->funcionario->setor->secretaria->nome }} - 
                                    {{ $comentario->funcionario->setor->secretaria->sigla }}
                                 </label>

                                 {{-- Comentário --}}
                                 <form class="form-horizontal">
                                    <div class="row">
                                       <div class="col- fc-rtl">
                                          <div class="form-group col-md-7 pull-right no-margin">
                                             <p class="form-control-static">
                                                {{ $comentario->comentario }}
                                             </p>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                                             
                           @else

                              {{-- Comentário do solicitante --}}
                              <div class="card margin10 roxo">

                                 {{-- Menu para editar comentário --}}
                                    
                                 @isset($usuario)

                                    @if ($usuario->solicitante->id == $solicitacao->solicitante->id )

                                       <div class="dropdown col-md-12 nav navbar-nav absoluto no-padding">
                                              
                                          <a href="#" class="btn btn-xs btn-simples dropdown-toggle rodar-icone pull-right" data-toggle="dropdown">
                                             <i class="material-icons">settings</i>
                                          </a>
                                              
                                          <ul class="dropdown-menu has-roxo pull-right">
                                             <li>
                                                <a href="#eugen" class="{{-- btn-coment-del --}}">
                                                   <i class="material-icons">clear</i>
                                                   Excluir
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
                                    <div class="row">

                                       {{-- Nome do usuário --}}
                                       <label class="col-md-8">
                                          {{ $solicitacao->solicitante->nome}}
                                       </label>

                                       {{-- Comentário Fixo --}}
                                       <div class="col- coment-fix">
                                          <div class="form-group col-md-7 no-margin">
                                             <span class="label nota hide">
                                                {{ $solicitacao->solicitante->nome}}
                                                alterou a comentário em VARIÁVEL às VARIÁVEL.
                                             </span>
                                             <p class="form-control-static">
                                                {{ $comentario->comentario }}
                                             </p>
                                          </div>
                                       </div>

                                       {{-- Comentário Removido --}}
                                       {{-- <div class="col- coment-fix-rem hide">
                                          <div class="form-group col-md-7 no-margin">
                                             <p class="form-control-static col- nota">
                                                {{ $solicitacao->solicitante->nome}} removeu a comentário em VARIÁVEL às VARIÁVEL.
                                             </p>
                                          </div>
                                       </div> --}}

                                       {{-- Comentário Editável --}}
                                       {{-- <div class="card-footer col- coment-edit hide">
                                       
                                          <div class="form-group label-floating is-empty col-md-7 no-margin">
                                             <label class="control-label"></label>
                                             <input type="text" class="form-control has-roxo" value="{{ $comentario->comentario }}">
                                          </div>

                                          <div class="col-md-5 pull-right">
                                             <button type="button" value="submit" class="btn btn-primary btn-sm btn-coment-alterar btn-roxo">
                                                Alterar
                                             </button>
                                             <button type="button" class="btn btn-primary btn-sm coment-desfazer btn-roxo">
                                                Desfazer
                                             </button>
                                          </div>
                                       </div> --}}
                                    </div> {{-- Fim Row Comentário --}}
                                 </form> {{-- Fim Form Comentário --}}
                              </div> {{-- Fim div comentário solicitante --}}

                           @endif

                        </div> {{-- Fim DIV panel-body --}}

                     @endforeach

                  </div> {{-- Fim DIV comentários --}}

                  {{-- Escrever comentário --}}
                  <div>
                     
                     @isset($usuario)
                             
                        {{-- Escrever comentário --}}
                        @if ($usuario->solicitante->id == $solicitacao->solicitante->id ) 
                             
                           <div class="card col-md-10 margin10 no-shadow">
                              <div class="input-group">

                                 <input type="text" data-solicitacao="{{$solicitacao->id }}" data-solicitante="{{$usuario->solicitante->id }}" id="comentario" name="comentario" class="form-control has-roxo comentario comentario_{{ $solicitacao->id }}" placeholder="Escreva um comentário">

                                 <span class="input-group-addon">
                                    <button type="button" data-solicitacao="{{$solicitacao->id }}" data-solicitante="{{$usuario->solicitante->id }}" class="btn btn-primary btn-sm btn-roxo enviar-comentario">
                                       Enviar
                                    </button>
                                 </span>
                              </div>
                           </div>
                             
                        @endif

                     @endisset

                  </div>{{-- Fim escrever comentário --}}
               </footer> {{-- Fim parte inferior do Card --}}
            </div> {{-- Fim card mestre --}}
         </div> {{-- fim Div col-lg-6 col-lg-offset-3 --}}
         
      @endforeach

      <div class="wrapper-pagination">      
         {{ $solicitacoes->appends(Request::only('termo'))->links() }}
      </div>         

      <div style="clear: both"></div>

   </div> {{-- Fim div Infinte Scroll --}}

</div> {{-- Fim 1º DIV ROW--}}

@endsection


@push('scripts')
   <script src="http://maps.google.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ"></script>
   <script src="{{ asset("js/handlebars.js") }}" type="text/javascript" charset="utf-8" async defer></script>

   {{-- Templates do Handlebars --}}
   @include("principal.templates");

   {{-- Executar a paginação infinita apenas caso esta seja a página inicial --}}
   @if(Request::is('/'))

      <!-- ABACAXI -->

      <script type="text/javascript">
       $(function() {
            $('ul.pagination').hide();
            $('.infinite-scroll').jscroll({
               autoTrigger: true,
               prefill: false,
               scrollThreshold: 0,
               debug: false,
               loadingHtml: '<div style="text-align:center; position: relative;"><div style="position: absolute; width: 100%; top: 88px; color: #fff; font-weight: bold; font-size: 18px;">Carregando</div><img class="center-block" src="/img/DoubleRing.gif" alt="Carregando..." /></div>',
               padding: 0,
               nextSelector: '.pagination li.active + li a',
               contentSelector: 'div.infinite-scroll',
               callback: function() {
                   $('ul.pagination').remove();
               }
            });
       });
      </script>

   @endif

   <script type="text/javascript">

      @if(Auth::check())

         // Dados do usuário logado

         let id_usuario = {{ Auth::user()->id }};
         let foto_usuario = '{{$usuario->solicitante->foto}}';
         let nome_usuario = "{{$usuario->solicitante->nome}}";

      @endif

      function mostraMapa(latitude,longitude,solicitacao) {
         //console.log(latitude, longitude);
         
         event.preventDefault();

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

      ////////////////////////////////////////////////////////////////////// Botão de Enviar Comentário

      function enviarComentario(elem, e){

         // Executar essa função apenas se a tecla pressionada for o Enter ou caso nenhuma tecla tenha
         // sido pressionada (click)

         if(e.keyCode == "13" || typeof e.keyCode === 'undefined'){

            let solicitacao = $(elem).data('solicitacao');
            let solicitante = $(elem).data('solicitante');

            var comentario = $(".comentario_"+solicitacao).val().trim();

            // Testar se a comentario está em branco
            if( $(".comentario_"+solicitacao).val().trim() ) {

                // Enviar a comentario para o banco
                $.post(
                    "{{ url('/comentario') }}",
                    {
                        comentario: comentario,
                        solicitacao_id: solicitacao, 
                        _token: "{{ csrf_token() }}",
                    }, function(data){

                        // Apagar o campo de envio de comentario
                        $(".comentario_"+solicitacao).val("");

                        // Colocar o novo card de comentarios embaixo da solicitação
                        var source      = $("#comentario-template").html();
                        var template    = Handlebars.compile(source)

                        var context = { 
                           nome:       nome_usuario,
                           comentario: comentario, 
                           foto:       foto_usuario,
                           id:         data,
                           token:      "{{ csrf_token() }}"
                        };

                        var html        = template(context);

                        $("div.comentarios").append( $(html) );
                        //console.log(html);   

                    }       
                );
            }

         }

      }

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

      function montaCartoes(solicitacoes){

         $("div.infinite-scroll").empty();

         // TODO: Mostrar imagem de loading

         let token = "{{ csrf_token() }}";
         
         $.post("/batchsolicitacoes", { _token: token, solicitacoes: solicitacoes }, function(data){

            data = JSON.parse(data);

            // Colocar o novo card de comentarios embaixo da solicitação
            var source      = $("#cartao-template").html();
            var template    = Handlebars.compile(source)

            for(let i =0; i < data.length; i++){

               var context = { 
                  nome:  data[i].solicitante.nome,
                  texto: data[i].conteudo, 
                  foto:  data[i].foto
               };

               var html = template(context);

               $("div.infinite-scroll").append( $(html) );

            }

            // TODO: Apagar imagem de Loading

         });

      }

      $(document).ready(function() {

 /*        $(document).scroll(function() {
            var top     = document.body.scrollTop;
            var maxTop  = document.body.scrollHeight - document.body.clientHeight;
    
            console.log('top:'+top +' -- max:'+maxTop)
            if (parseInt(top) === 3297) {
               console.log('Chegou ao fim da página');
            }
         });*/


         var tempo = 0;
         var incremento = 500;

          // Caso o evento seja acionado via "click" no botão de enviar comentário, obter as informações
         // pelas propriedades data do próprio elemento.

         $(".infinite-scroll").on('click', "button.enviar-comentario", function(e){

            // Chamar a função que faz a chamada Ajax
            enviarComentario(this, e);

         });

         // Caso o evento seja acionado pela tecla Enter no input, obter as informações através do botãok
         $(".infinite-scroll").on('keyup', "input.comentario", function(e){

            // Chamar a função que faz a chamada Ajax apenas se a tecla pressionada for Enter
            enviarComentario(this, e);

         });

/*         //evento que dispara um ajax para excluir o mentário
         $(".infinite-scroll").on('click','btn-coment-del',function(e){
            let id = $(this).data('id');

            $.post('/comentario/' + id , {

               _token: '{{ csrf_token() }}',
               _method: 'DELETE' 

            }, function(data){

               $('.comentario_'+id).remove();

            });

         });
*/

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