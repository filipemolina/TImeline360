@extends('layouts.material')

@section('titulo')

@endsection

@section('content')

   <br><br>

   <div class="row cartao-principal" >

      <div class="infinite-scroll">
         {{-- Início da Solicitação --}}
         @foreach ($solicitacoes as $solicitacao)
            <div class="col-sm-2 col-sm-offset-5 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3" id="solicitacao_card_{{ $solicitacao->id }}">
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
                  <!-- <div class="data-inclusao-card ">Adicionado {{ $solicitacao->created_at->diffForHumans()}}</div> -->
                  <div class="data-inclusao-card ">
                     Adicionado às  
                     {{  $solicitacao->created_at->format('H:i') }} 
                      de 
                     {{  $solicitacao->created_at->format('d/m/Y') }}
                  </div>

                     
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

                           {{----------------------- Opções do Solicitação ------------------------}}

                           @isset($usuario)
                              @if ($usuario->solicitante->id == $solicitacao->solicitante->id )
                                 <div class="opcoes_card">
                                    <div class="dropdown col-md-12 nav navbar-nav absoluto no-padding">
                                       <a href="#" class="btn btn-xs btn-simples dropdown-toggle rodar-icone pull-right" data-toggle="dropdown">
                                          <i class="material-icons">settings</i>
                                       </a>
                                       <ul class="dropdown-menu pull-right">
                                          {{-- <li>
                                             <a href="" class="btn-coment-del">
                                                <i class="material-icons">create</i> Editar
                                             </a>
                                          </li> --}}
                                          <li>
                                             <a href="" class="btn-card-del" data-solicitacao="{{ $solicitacao->id }}">
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
                        {!! $solicitacao->conteudo !!}
                     </div>
                  </div>

                  {{-- Botões de interação --}}
                  <ul class="nav navbar-nav">
                     @if(Auth::check())
                        <li class="col-md-3">
                           {{-- se tiver apoio do usuario logado fica em roxo (class=apoiar) --}}

                           @if(in_array($solicitacao->id, $meus_apoios_ids))
                              <button class="btn btn-simples btn-apoiar apoiar solicitacao_{{ $solicitacao->id }}" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})" >
                                 <span class="btn-label"> <i class="material-icons">thumb_up</i> <span class="texto_apoio apoiado">Apoiado</span> </span>
                              </button>
                           @else
                              <button class="btn btn-simples btn-apoiar solicitacao_{{ $solicitacao->id }}" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})" >
                                 <span class="btn-label"> <i class="material-icons">thumb_up</i> <span class="texto_apoio">Apoiar</span> </span>
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
                        @if($solicitacao->comentarios_count >= 1)
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
                        @if($solicitacao->apoiadores_count > 1)
                           <button class="btn btn-simples apoiar btn_apoios_{{ $solicitacao->id }}">
                              <span class="btn-label apoiar"> <i class="material-icons">favorite</i> </span>
                              <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span> Apoios </span>
                        @elseif($solicitacao->apoiadores_count == 1)
                           <button class="btn btn-simples apoiar btn_apoios_{{ $solicitacao->id }}">
                              <span class="btn-label apoiar"> <i class="material-icons">favorite</i> </span>
                              <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span> Apoio </span>
                        @else
                           <button class="btn btn-simples btn_apoios_{{ $solicitacao->id }}">
                              <span class="btn-label"> <i class="material-icons">favorite</i> </span>
                              <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span> Apoio </span>
                        @endif
                           </button>
                     </li>
                  </ul>

                  {{-- Comentários --}}
                  <footer class="colapso col-md-12">
                     <div class="comentarios">
                        @foreach ($solicitacao->comentarios->sortBy('created_at') as $comentario)

                           {{-- card de comentarios --}}
                           <div class="panel-body no-padding comentario_{{ $comentario->id }}" >

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
                                                   <a href="" class="btn-coment-del" 
                                                      data-id="{{ $comentario->id }}" data-token="{{ csrf_token() }}">
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
                                    <form class="form-horizontal card-solicitante">

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
                                    <input type="text" data-solicitacao="{{$solicitacao->id }}" data-solicitante="{{$usuario->solicitante->id }}" id="comentario" name="comentario" class="form-control comentario comentario_{{ $solicitacao->id }}" placeholder="Escreva um comentário" >
                                    <span class="input-group-addon">
                                       <button type="button" data-solicitacao="{{$solicitacao->id }}" data-solicitante="{{$usuario->solicitante->id }}" class="btn btn-primary btn-sm enviar-comentario">
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
         {{-- Fim da Solicitação --}}

         <div class="wrapper-pagination">
            
            {{ $solicitacoes->appends(Request::only('termo'))->links() }}

         </div>         

         <div style="clear: both"></div>
      </div>
   </div> {{-- Fim da ROW --}}
@endsection


@push('scripts')
   
   <script src="http://maps.google.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ"></script>
   <script src="{{ asset("js/handlebars.js") }}" type="text/javascript" charset="utf-8" async defer></script>

   {{-- Templates do Handlebars --}}

   @include("principal.templates");

   {{-- Testar se há algum erro, e mostrar a notificação --}}

   <script>
      
      $(function() {
         @if (session('sucesso_alteracao_senha'))
            //setTimeout(function(){demo.notificationRight("top", "right", "green", "Senha alterada com sucesso"); }, tempo);
            swal({   title:"Senha alterada com sucesso!",
                     //text: "Senha alterada com sucesso!", 
                     type: "success", 
                     buttonsStyling: false, 
                     confirmButtonClass: "btn btn-success"
            });
         @endif
      });

      @if ($errors->any())
         @foreach ($errors->all() as $error)
            setTimeout(function(){demo.notificationRight("top", "right", "rose", "{{ $error }}"); }, tempo);
            tempo += incremento;
         @endforeach
      @endif
   </script>






  
@endpush

