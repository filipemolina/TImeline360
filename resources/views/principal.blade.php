@extends('layouts.material')

@section('titulo')

@endsection

@section('content')

<div class="row">

   <div class="infinite-scroll">

    {{-- Início da Solicitação --}}

      @foreach ($solicitacoes as $solicitacao)
                       
         <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-7 col-md-offset-3 col-lg-6 col-lg-offset-3" id="solicitacao_card_{{ $solicitacao->id }}">

            {{-- Card mestre --}}
            <div class="principal360 card">

               {{-- Avatar do usuário --}}
               <div class="card-header card-header-icon card-avatar-fixo">                
                  <img src="{{ $solicitacao->solicitante->foto }}"/>
               </div>

               <div class="nome-solicitante-card"> {{ $solicitacao->solicitante->nome}}</div>

               <div class="card-header card-header-icon avatar-status pull-right" data-background-color style="background-color: {{ $solicitacao->servico->setor->cor }};">
                     {{-- <i class="material-icons">language</i> --}}
                  <span class="mdi {{ $solicitacao->servico->setor->icone }}"></span>
               </div>

               {{-- Tempo de postagem --}}
               <div class="postTime">
                  Adicionado às  {{  $solicitacao->created_at->format('H:i') }} de
                  {{  $solicitacao->created_at->format('d/m/Y') }}
               </div>

               {{-- Nome do usuário --}}
               {{-- <span class="card-avatar-label has-roxo">{{ $solicitacao->solicitante->nome}}</span> --}}
                  
               {{-- Foto da publicação --}}

               @if($solicitacao->endereco)

                  <div class="card-image alterado">
                     <b href="#">
                        <img src="{{ $solicitacao->foto }}" >
                     </b>

                     {{-- Endereço --}}
                     <span class="label has-roxo-hover botLeft" onclick="mostraMapa({{ $solicitacao->endereco->latitude }},{{ $solicitacao->endereco->longitude }},{{ $solicitacao->id }});">
                           <i class="material-icons">place</i>
                           {{ $solicitacao->endereco->logradouro }} 
                           {{ $solicitacao->endereco->numero }} -
                           {{ $solicitacao->endereco->bairro }} -
                           {{ $solicitacao->endereco->cep }} 
                     </span>
                  </div>

                  <div id="LocalMapa_{{ $solicitacao->id }}" class="mapa"></div>

               @endif

               {{-- Título da solicitação --}}
               <div class="card-content" style="padding-top: 0px;">
                  <div class="card-title">
                     
                     <div class="title-solicitacao">
                        <button class="btn btn-just-icon btn-simple btn-xs btn-roxo no-padding no-margin">
                           {{-- <i class="material-icons">label_outline</i> --}}
                           <span class="mdi {{ $solicitacao->servico->setor->icone }}" ></span>
                        </button>
                        <b> {{ $solicitacao->servico->nome }} </b>
                     </div>

                        {{-- Opções do Solicitante --}}
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

                  </div>

                  <div class="timeline-body col-md-12">
                     <p>{!! $solicitacao->conteudo !!}</p>
                  </div>
               </div> {{-- Fim título da solicitação --}}

               {{-- Botões de interação --}}
               <ul class="nav navbar-nav btn-int">
                   
                  <li>

                  @if(Auth::check())
                              
                        {{-- se tiver apoio do usuario logado fica em roxo (class=apoiar) --}}
                        @if(in_array($solicitacao->id, $meus_apoios_ids))
                           
                           <button class="btn btn-simples btn-apoiar btn-xs apoiar solicitacao_{{ $solicitacao->id }}" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})">
                              <span class="btn-label">
                                 <i class="material-icons">thumb_up</i>
                                 <span class="texto_apoio apoiado">Apoiado</span>
                              </span>
                           </button>

                        @else
                           
                           <button class="btn btn-simples btn-apoiar btn-xs solicitacao_{{ $solicitacao->id }}" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})" >
                              <span class="btn-label">
                                 <i class="material-icons">thumb_up</i>
                                 <span class="texto_apoio">Apoiar</span>
                              </span>
                           </button>

                        @endif

                  @else

                     {{-- Aviso que preciso logar para apoiar (class=helper-apoio) --}}

                     <button class="btn btn-simple btn-xs helper-apoio">
                        <span class="btn-label"> <i class="material-icons">thumb_up</i> Apoiar </span>
                     </button>
                     
                  @endif

                  </li>

                  {{-- se tiver comentarios fica em roxo --}}
                  <li>
                        
                     @if($solicitacao->comentarios_count >= 1)

                        <button class="btn btn-simple btn-xs slide-coment btn_comentario_{{ $solicitacao->id }}">
                           <span class="btn-label apoiar"> <i class="material-icons">chat</i> Comentários </span>

                        </button>

                     @else

                        <button class="btn btn-simple btn-xs slide-coment btn_comentario_{{ $solicitacao->id }}">
                           <span class="btn-label "> <i class="material-icons">chat</i> Comentários </span>
                        </button>

                     @endif

                  </li>

                  {{-- Contador de apoios --}}
                  <li>
                              
                        @if($solicitacao->apoiadores_count > 1)

                           <button class="btn btn-simples btn-xs apoiar btn_apoios_{{ $solicitacao->id }}">
                              <span class="btn-label apoiar"> <i class="material-icons">favorite</i> </span>
                              <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span> Apoios </span>

                        @elseif($solicitacao->apoiadores_count == 1)

                           <button class="btn btn-simples btn-xs apoiar btn_apoios_{{ $solicitacao->id }}">
                              <span class="btn-label apoiar"> <i class="material-icons">favorite</i> </span>
                              <span class="numero_apoios_{{ $solicitacao->id }}"> {{ $solicitacao->apoiadores_count }} </span> Apoio </span>

                        @else

                           <button class="btn btn-simples btn-xs btn_apoios_{{ $solicitacao->id }}">
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
                        <div class="panel-body no-padding comentario_{{ $comentario->id }}">

                           {{-- Comentário do funcionário --}}
                           @if ($comentario->funcionario)

                              <div class="card margin10 dourado">

                                 {{-- Avatar pequeno a direita para indicar que é a prefeitura--}}
                                 <div class="card-header card-header-icon avatar-fixo-pn pull-right">
                                    <img class="img" src="{{ asset('img/brasao.png')}}"/>
                                 </div>

                                 {{-- Nome da secretária --}}
                                 <label class="pull-right fc-rtl">
                                    {{ $comentario->funcionario->setor->secretaria->nome }} - 
                                    {{ $comentario->funcionario->setor->secretaria->sigla }}
                                 </label>

                                 {{-- Comentário --}}
                                 <form class="form-horizontal">
                                    <div class="row">
                                       <div class="col- fc-rtl">
                                          <div class="form-group col-xs-7 pull-right no-margin">
                                             <p class="form-control-static no-padding">
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
                                                <a href="" class="btn-coment-del" data-id="{{ $comentario->id }}" data-token="{{ csrf_token() }}">
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
                                    <div class="row">
                                       {{-- Nome do usuário --}}
                                       <label class="col-md-8 nome-solicitante">
                                          {{ $solicitacao->solicitante->nome}}
                                       </label>

                                       {{-- Comentário Fixo --}}
                                       <div class="col- coment-fix">
                                          <div class="form-group col-md-7 no-margin">
                                             <span class="label nota hide">
                                                {{ $solicitacao->solicitante->nome}}
                                                alterou a comentário em VARIÁVEL às VARIÁVEL.
                                             </span>
                                             <p class="form-control-static no-padding">
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

                     <button class="btn btn btn-simple btn-lg slide-coment cornerRight no-padding">
                        <span class="btn-label apoiar"> <i class="mdi mdi-chevron-double-up"></i></span>
                     </button>

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
   
   <script src="https://maps.google.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ"></script>
   <script src="{{ asset("js/handlebars.js") }}" type="text/javascript" charset="utf-8" async defer></script>

   {{-- Templates do Handlebars --}}
   @include("principal.templates")

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
