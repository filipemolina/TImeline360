<script id="comentario-template" type="text/x-handlebars-template">
   
   @verbatim

      <div class="panel-body no-padding comentario_{{ id }}">
         <div class="card margin10 roxo">
            <div class="dropdown col-md-12 nav navbar-nav absoluto no-padding">
               <a href="#" class="btn btn-xs btn-simples dropdown-toggle rodar-icone pull-right" data-toggle="dropdown">
                  <i class="material-icons">settings</i>
               </a>
               
               <ul class="dropdown-menu has-roxo pull-right">
                  <li>
                     <a href="#eugen" class="btn-coment-del" data-id="{{ id }}" data-token="{{ token }}">
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
                  <label class="col-md-8">
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

<script id="cartao-template" type="text/x-handlebars-template">
   @verbatim

      <div class="col-md-6 col-md-offset-3">
         <div class="card">
            
            <div class="card-header card-header-icon avatar-fixo">
               <img class="img" src="{{ foto_solicitante }}"/>
            </div>

            <div class="nome-solicitante-card ">{{ nome_solicitante }}</div>

            <div class="card-header card-header-icon avatar-status pull-right" 
               data-background-color style="background-color: {{ cor }};">
               <span class="mdi {{ icone }}"></span>
            </div>

            @if($solicitacao->endereco)

               <div class="card-image alterado">
                  <a href="#">
                     <img class="img" src="{{ foto }}">

                     <span class="label top previnir" style="background-color: {{ cor }};">Adicionado {{ data }}</span>
                  </a>
               </div>

               <span class="endereco" 
                     onclick="mostraMapa({{ latitude }},{{ longitude }},{{ $solicitacao->id }});">
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
                     <button class="btn btn-just-icon btn-simple btn-xs btn-primary" style="margin-top: 0px;margin-bottom: 0px;">
                        {{-- <i class="material-icons">label_outline</i> --}}
                        <span class="mdi {{ $solicitacao->servico->setor->icone }}" ></span>
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

   @endverbatim
</script>

<script>
   /////////////////// Código da Pesquisa em Tempo Real

         // Definir uma variável que irá guardar a função que será executada com setTimeout
         // let funcao;
         // let delay = 1000; // 1 segundo de delay

         // $("input.pesquisa").keyup(function(){

         //    // Caso a função que está nessa variável já tenha sido chamada, cancelar
         //    clearTimeout(funcao);

         //    let val = $(this).val();

         //    let toquein = "{{ csrf_token() }}";

         //    // Iniciar novamente a contagem
         //    funcao = setTimeout(function(){

         //       // Chamada para a 
         //       $.post("pesquisa", { termo: val, _token: toquein }, function(data){

         //          let resultados = JSON.parse(data);

         //          montaCartoes(data);

         //       });

         //    }, delay);

         // })
</script>