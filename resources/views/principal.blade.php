@extends('layouts.material')

@section('titulo')


   {{-- <img class="img" style="width: 100px; margin-top: -15px;" src="{{ asset('img/logo-360-roxo.png')}}"> --}}

@endsection

@section('content')

<br><br>

<div class="row ">

    {{-- Início da Solicitação --}}

    @foreach ($solicitacoes as $solicitacao)
                    
    <div class="col-lg-6 col-lg-offset-3">
        <div class="card">

            {{-- Avatar do usuário --}}
            
                  <div class="card-header card-header-icon card-avatar-fixo ">                
                      <img src="{{ $solicitacao->solicitante->foto }}"/>
                  </div>
                  <span class="card-avatar-label has-roxo col-md-2">{{ $solicitacao->solicitante->nome}}</span>

            <div class="card-avatar-status pull-right" data-background-color style="background-color: {{ $solicitacao->servico->setor->cor }};">

                <span class="mdi {{ $solicitacao->servico->setor->icone }}"></span>
                
            </div>


            
            {{-- Foto da publicação --}}
            <div class="card-image">
                    <a href="#">
                        <img class="img" src="{{ $solicitacao->foto }}" >
                        <span class="label bottom" style="background-color: {{ $solicitacao->servico->setor->cor }};">Dados da publicação da foto</span>
                    </a>
            </div>

            {{-- Título da solicitação --}}
            <div class="card-content">
                <div class="card-title">
                    <p class="col-md-12">
                        <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                            <i class="material-icons">label_outline</i>
                        </button>
                        {{ $solicitacao->servico->nome }} - {{ $solicitacao->id }} 
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
                        <button class="btn btn-simples btn-apoiar" onclick="enviaApoio({{ $solicitacao->id }},{{ $usuario->solicitante->id }})" >
                            
                            <span class="btn-label">
                                <i class="material-icons">thumb_up</i>
                                Apoiar
                            </span>
                        </button>
                    </li>
                @else
                    <li class="col-md-4">
                        <button class="btn btn-simple helper-apoio">
                            <span class="btn-label"> <i class="material-icons">thumb_up</i> Apoiar </span>
                        </button>
                    </li>
                @endif

                <li class="col-md-5">
                    <button class="btn btn-simple slide-coment">
                        <span class="btn-label"> <i class="material-icons">chat</i> Comentários </span>
                    </button>
                </li>
                <li class="col-md-3">

                    <button class="btn btn-simples">

                        @if($solicitacao->apoiadores_count > 1)

                        <span class="btn-label">
                            <i class="material-icons">favorite</i>
                        </span>

                        <span class="numero_apoios_{{ $solicitacao->id }}">
                            {{ $solicitacao->apoiadores_count }}
                        </span> Apoios </span>

                        @else

                        <span class="btn-label">
                            <i class="material-icons">favorite</i>
                        </span>

                        <span class="numero_apoios_{{ $solicitacao->id }}">
                            {{ $solicitacao->apoiadores_count }}
                        </span> Apoio </span>

                        @endif

                    </button>
                </li>
            </ul>

            {{-- Comentários --}}
            <footer class="colapso col-md-12">

                @foreach ($solicitacao->mensagens as $mensagem)
                
                {{-- card de comentarios --}}
                <div class="panel-body no-padding">

                    {{-- Caso a mensagem seja do próprio solicitante, mostrar a foto à esquerda --}}

                    @if ($mensagem->funcionario)                    

                    {{-- mensagem do funcionário --}}
                    <div class="card margin10 no-shadow">

                        {{-- Avatar pequeno --}}
                        <div class="card-header card-header-icon avatar-fixo-pn pull-right">
                            <img class="img" src="{{ asset('img/brasao.png')}}"/>
                        </div>

                        {{-- Comentário --}}
                        <form class="form-horizontal">

                            <div class="row">
                                
                                {{-- Nome da secretária --}}
                                <label class="col-md-10 pull-right fc-rtl">
                                    {{ $mensagem->funcionario->setor->secretaria->nome }} - 
                                    {{ $mensagem->funcionario->setor->secretaria->sigla }}
                                </label>

                                {{-- Comentário --}}
                                <div class="col- fc-rtl">
                                    <div class="form-group col-md-7 pull-right no-margin">
                                        <p class="form-control-static">
                                            {{ $mensagem->mensagem }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form> {{-- Fim Comentário --}}
                    </div>
                                    
                    @else

                    {{-- mensagem do solicitante --}}
                    <div class="card margin10 no-shadow">

                        {{-- Menu para editar comentário --}}
                        
                        @isset($usuario)

                        @if ($usuario->solicitante->id == $solicitacao->solicitante->id )

                        <div class="dropdown col-md-12 nav navbar-nav absoluto no-padding">
                            
                            <a href="#" class="btn btn-xs btn-simples dropdown-toggle rodar-icone pull-right" data-toggle="dropdown">
                                <i class="material-icons">settings</i>
                            </a>
                            
                            <ul class="dropdown-menu has-roxo pull-right">
                                <li>
                                    <a href="#eugen" class="btn-coment-edit">
                                        <i class="material-icons">create</i>
                                        Editar
                                    </a>
                                </li>

                                <li>
                                    <a href="#eugen" class="btn-coment-del">
                                        <i class="material-icons">clear</i>
                                        Excluir
                                    </a>
                                </li>

                                <li>
                                    <a href="#eugen" class="hide btn-coment-des">
                                        <i class="material-icons">undo</i>
                                        Desfazer
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
                                <label class="col-md-8">
                                    {{ $solicitacao->solicitante->nome}}
                                </label>

                                {{-- Comentário Fixo --}}
                                <div class="col- coment-fix">
                                    <div class="form-group col-md-7 no-margin">
                                    <span class="label nota hide">
                                        {{ $solicitacao->solicitante->nome}} alterou a mensagem em {{-- variável --}} às {{-- variável --}}.
                                    </span>
                                        <p class="form-control-static">
                                            {{ $mensagem->mensagem }}
                                        </p>
                                    </div>
                                </div>

                                {{-- Comentário Removido --}}
                                <div class="col- coment-fix-rem hide">
                                    <div class="form-group col-md-7 no-margin">
                                        <p class="form-control-static col- nota">
                                            {{ $solicitacao->solicitante->nome}} removeu a mensagem em {{-- variável --}} às {{-- variável --}}.
                                        </p>
                                    </div>
                                </div>

                                {{-- Comentário Editável --}}
                                <div class="card-footer col- coment-edit hide">
                                    <div class="form-group label-floating is-empty col-md-7 no-margin">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control has-roxo" value="{{ $mensagem->mensagem }}">
                                    </div>
                                    <div class="col-md-5 pull-right">
                                        <button type="button" value="submit" class="btn btn-primary btn-sm btn-coment-alterar btn-roxo">
                                            Alterar
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm coment-desfazer btn-roxo">
                                            Desfazer
                                        </button>
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

                {{-- Escrever comentário --}}
                
                <div class="">
                    @isset($usuario)
                    {{-- {{ dd($usuario) }} --}}
                    {{-- {{ $usuario->solicitante->id }} = {{ $solicitacao->solicitante->id }}  --}}
                    
                    {{-- Escrever comentário --}}
                    @if ($usuario->solicitante->id == $solicitacao->solicitante->id ) 
                    
                    <div class="card col-md-10 margin10 no-shadow">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <button type="button" class="btn btn-primary btn-sm btn-roxo" onclick="enviaMensagem({{ $solicitacao->id }})">
                                    Enviar
                                </button>
                            </span>
                            <input type="text" id="mensagem" name="mensagem" class="form-control has-roxo comentario_{{ $solicitacao->id }}" placeholder="Escreva um comentário" >
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

</div> {{-- Fim da ROW --}}

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

        @if(Auth::check())

            var id_usuario = {{ Auth::user()->id }};

        @endif

        function enviaMensagem(solicitacao){ 
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
                    }       
                );

                // Apagar o campo de envio de mensagem
                $(".comentario_"+solicitacao).val("");

                // Colocar o novo card de mensagens embaixo da solicitação
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

                }       
            );
        };

    </script>

    <script type="text/javascript">
        $(document).ready(function() {
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

