@extends('layouts.material')

@section('titulo')


   {{-- <img class="img" style="width: 100px; margin-top: -15px;" src="{{ asset('img/logo-360-roxo.png')}}"> --}}

@endsection

@section('content')

<br><br>

<div class="col-md-4 col-md-offset-4 h6">
<a href="{{ ($solicitacoes->url(1)) }}"                             class="btn btn-simple" role="button"> <i class="material-icons">fast_rewind</i> </a>
<a href="{{ ($solicitacoes->previousPageUrl()) }}"                  class="btn btn-simple" role="button"> <i class="material-icons inverterX">forward</i> </a>
<a href="{{ ($solicitacoes->nextPageUrl()) }}"                      class="btn btn-simple" role="button">   <i class="material-icons">forward</i> </a>
<a href="{{ ($solicitacoes->url($solicitacoes->lastPage())) }}"     class="btn btn-simple" role="button">  <i class="material-icons">fast_forward</i> </a>
</div>

<div class="row ">

    {{-- Início da Solicitação --}}

    @foreach ($solicitacoes as $solicitacao)
                    
    <div class="col-sm-4 col-sm-offset-4 col-md-6 col-md-offset-3 col-lg-8 col-lg-offset-2">
        <div class="card">

            {{-- Avatar do usuário --}}
            <div class="card-header card-header-icon avatar-fixo">
                <img class="img" src="{{ $solicitacao->solicitante->foto }}"/>
            </div>
            {{-- <h4 class="card-title">
                {{ $solicitacao->solicitante->nome}}
            </h4> --}}

            {{-- Status da solicitação --}}
            <div class="card-header card-header-icon pull-right" data-background-color="red">
                <i class="material-icons">language</i>
            </div>
            
            {{-- Foto da publicação --}}
            <div class="card-image">
                <span class="label label-danger"></span>
                    <a href="#pablo">
                        <img class="img" src="{{ $solicitacao->foto }}">
                    </a>
            </div>

            {{-- Título da solicitação --}}
            <div class="card-content">
                <div class="card-title">
                    <p class="col-md-12">
                        <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                            <i class="material-icons">label_outline</i>
                        </button>
                        solicitacao_id {{ $solicitacao->id }} - {{ $solicitacao->moderado }}
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
                        <button class="btn btn-simple apoiar">
                            <span class="btn-label">
                                <i class="material-icons">thumb_up</i>
                                Apoiar
                            </span>
                        </button>
                    </li>

                @else

                    <li class="col-md-3">
                        <button class="btn btn-simple helper-apoio">
                            <span class="btn-label">
                                <i class="material-icons">thumb_up</i>
                                Apoiar
                            </span>
                        </button>
                    </li>

                @endif

                <li class="col-md-3">
                    <button class="btn btn-simple slide-coment">
                        <span class="btn-label">
                            <i class="material-icons">chat</i>
                            Comentários
                        </span>
                    </button>
                </li>

                <li class="col-md-3">
                    <button class="btn btn-simple">
                        <span class="btn-label">
                            <i class="material-icons">favorite</i>
                            Apoios
                        </span>
                        <label>100</label>
                    </button>
                </li>
            </ul>

            {{-- Comentários --}}
            <footer class="colapso col-md-12">
                <div class="panel-title">
                    @isset($usuario)

                        {{-- {{ dd($usuario) }} --}}
                        {{-- {{ $usuario->solicitante->id }} = {{ $solicitacao->solicitante->id }}  --}}
                        @if ($usuario->solicitante->id == $solicitacao->solicitante->id )

                            <div class="card card-product col-md-8">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <button onclick="enviaMensagem({{ $solicitacao->id }})" type="button" class="btn btn-primary btn-sm">
                                            Enviar
                                        </button>
                                    </span>
                                    <input type="text" class="form-control comentario_{{ $solicitacao->id }}" placeholder="Escreva um comentário" id="mensagem" name="mensagem">
                                </div>
                            </div>
                        
                        @endif
                    @endisset

                </div> <br><br><br><br><br><br>

                {{-- card de comentarios --}}
                @foreach ($solicitacao->mensagens as $mensagem)

                <div class="panel-body">
                    {{-- <div class="card" data-header-animation="true"> --}}

                        {{-- Caso a mensagem seja do próprio solicitante, mostrar a foto à esquerda --}}

                        {{-- mensagem do funcionário --}}
                        @if ($mensagem->funcionario)

                        <div class="card">
                        <div class="card-header card-header-icon avatar-fixo pull-right">
                            <img class="img" src="{{ asset('img/brasao.png')}}">
                        </div>

                        <div class="card-content pull-right">
                            <h5 class="card-title">
                                {{ $mensagem->funcionario->setor->secretaria->nome }} - 
                                {{ $mensagem->funcionario->setor->secretaria->sigla }}
                            </h5>

                            <p class="card-title fc-rtl">
                                {{ $mensagem->mensagem }}
                            </p>

                        </div>
                        </div>
                                    
                        {{-- mensagem do solicitante --}}
                        @else

                        <div class="card">
                            
                            {{-- Menu para editar comentário --}}
                            <nav class="navbar navbar-default navbar-absolute navbar-transparent" role="navigation">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav pull-right">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle rodar-icone" data-toggle="dropdown"><i class="material-icons">settings</i> <b class="caret"></b></a>
                                                    <ul class="dropdown-menu">
                                                        <li class="divider"></li>
                                                        <li><a href="#"><i class="material-icons">create</i> Editar</a></li>
                                                        <li class="divider"></li>
                                                        <li><a href="#"><i class="material-icons">clear</i>Excluir</a></li>
                                                    </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>

                            <div class="card-header card-header-icon avatar-fixo">
                                <img class="img" src="{{ $solicitacao->solicitante->foto }}"/>
                            </div>
                            
                            <div class="card-content">
                                <h5 class="card-title">
                                    {{ $solicitacao->solicitante->nome}}
                                </h5>
                                
                                <p class="card-title">
                                    {{ $mensagem->mensagem }}
                                </p>

                            </div>
                        </div>

                        @endif


                    {{-- </div> fim card em panel-body --}}
                </div> {{-- fim panel-body --}}

                @endforeach
                {{-- fim do card de comentarios --}}

                
        </div> {{-- fim card em DIV publicação --}}
    </div> {{-- Fim DIV PUBLICAÇÃO --}}
    
    @endforeach
    {{-- Fim da Solicitação --}}

</div> {{-- Fim da ROW --}}

<div class="col-md-offset-4 h6">
<a href="{{ ($solicitacoes->url(1)) }}"                             class="btn btn-info btn-simple" role="button">Primeira</a>
<a href="{{ ($solicitacoes->previousPageUrl()) }}"                  class="btn btn-info btn-simple" role="button">Anterior</a>
<a href="{{ ($solicitacoes->nextPageUrl()) }}"                      class="btn btn-info btn-simple" role="button">Próxima</a>
<a href="{{ ($solicitacoes->url($solicitacoes->lastPage())) }}"     class="btn btn-info btn-simple" role="button">Ultima</a>
</div>

@endsection


@push('scripts')

    <script src="{{ asset("js/handlebars.js") }}" type="text/javascript" charset="utf-8" async defer></script>

    {{-- Template do Handlebars --}}

    <script id="template-mensagem" type="text/x-handlebars-template">

        @verbatim

            <div class="panel-body">

                <div class="card">
                                
                    <!-- Menu para editar comentário -->
                    <nav class="navbar navbar-default navbar-absolute navbar-transparent" role="navigation">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav pull-right">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle rodar-icone" data-toggle="dropdown"><i class="material-icons">settings</i> <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="material-icons">create</i> Editar</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="material-icons">clear</i>Excluir</a></li>
                                            </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <div class="card-header card-header-icon avatar-fixo">
                        <img class="img" src="{{ foto }}"/>
                    </div>
                    
                    <div class="card-content">
                        <h5 class="card-title">
                            {{ nome}}
                        </h5>
                        
                        <p class="card-title">
                            {{ mensagem }}
                        </p>

                    </div>
                </div>

            </div>

        @endverbatim

    </script>

    {{-- Fim do Template do Handlebars --}}

    <script type="text/javascript">

        function enviaMensagem(solicitacao){ 

            //console.log(($(".comentario_"+solicitacao).val().trim()));

            // Testar se a mensagem está em branco
            if( $(".comentario_"+solicitacao).val().trim() ) {


                // Enviar a mensagem para o banco
                $.post(
                    "{{ url('/mensagem') }}",
                    {
                        mensagem: $(".comentario_"+solicitacao).val(),
                        solicitacao_id: solicitacao, 
                        _token: "{{ csrf_token() }}",
                    
                    }, function(data){        

                        console.log("Resposta");
                        console.log(data);

                    });

                // Apagar o campo de envio de mensagem
                $(".comentario_"+solicitacao).val("");

                // Colocar o novo card de mensagens embaixo da solicitação


               
            }else{


                console.log("vazio");

            }

            
        };

    </script>
@endpush