@extends('layouts.material')

@section('titulo')

    Página Inicial

@endsection

@section('content')

<a href="{{ ($solicitacoes->url(1)) }}"                             class="btn btn-info" role="button">Primeira</a>
<a href="{{ ($solicitacoes->previousPageUrl()) }}"                  class="btn btn-info" role="button">Anterior</a>
<a href="{{ ($solicitacoes->nextPageUrl()) }}"                      class="btn btn-info" role="button">Próxima</a>
<a href="{{ ($solicitacoes->url($solicitacoes->lastPage())) }}"     class="btn btn-info" role="button">Ultima</a>

<br><br>

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
                
                <li class="col-md-3">
                    <button class="btn btn-simple apoiar" rel="tooltip" data-placement="bottom" title="Apoiar">
                        <span class="btn-label">
                            <i class="material-icons">thumb_up</i>
                            Apoiar
                        </span>
                    </button>
                </li>

                <li class="col-md-3">
                    <button class="btn btn-simple slide-coment" rel="tooltip" data-placement="bottom" title="Comentários">
                        <span class="btn-label">
                            <i class="material-icons">chat</i>
                            Comentários
                        </span>
                    </button>
                </li>

                <li class="col-md-3">
                    <button class="btn btn-simple" rel="tooltip" data-placement="bottom" title="Apoios">
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
                    
                    {{-- Escrever comentário --}}
                    @if ($usuario->solicitante->id == $solicitacao->solicitante->id ) 
                    
                    <div class="card card-product col-md-8">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <button type="button" class="btn btn-primary btn-sm">
                                    Enviar
                                </button>
                            </span>
                            <input type="text" class="form-control" placeholder="Escreva um comentário">
                        </div>
                    </div>
                    
                    @endif

                    @endisset

                </div>

                {{-- card de comentarios --}}
                @foreach ($solicitacao->mensagens as $mensagem)

                <div class="panel-body">
                    <div class="card">

                        {{-- Caso a mensagem seja do próprio solicitante, mostrar a foto à esquerda --}}

                        {{-- mensagem do funcionário --}}
                        @if ($mensagem->funcionario_id)

                        <div class="card-header card-header-icon avatar-fixo pull-right">
                            <img class="img" src="{{ asset('img/brasao.png')}}">
                        </div>

                        <div class="card-content pull-right">
                            <h5 class="card-title">
                                {{ $mensagem->funcionario->setor->secretaria->nome }} - 
                                {{ $mensagem->funcionario->setor->secretaria->sigla }}
                            </h5>

                            <p class="category">
                                {{ $mensagem->mensagem }}
                            </p>

                        </div>
                                    
                        @else

                        {{-- mensagem do solicitante --}}
                        <div class="card-header card-header-icon avatar-fixo">
                            <img class="img" src="{{ $solicitacao->solicitante->foto }}"/>
                        </div>
                        <div class="card-content">
                            <h5 class="card-title">
                                {{ $solicitacao->solicitante->nome}}
                            </h5>
                            
                            <p class="category">
                                {{ $mensagem->mensagem }}
                            </p>

                        </div>

                        @endif


                    </div> {{-- fim card em panel-body --}}
                </div> {{-- fim panel-body --}}

                @endforeach
                {{-- fim do card de comentarios --}}

                
        </div> {{-- fim card em DIV publicação --}}
    </div> {{-- Fim DIV PUBLICAÇÃO --}}
    
    @endforeach
    {{-- Fim da Solicitação --}}

</div> {{-- Fim da ROW --}}

<a href="{{ ($solicitacoes->url(1)) }}"                             class="btn btn-info" role="button">Primeira</a>
<a href="{{ ($solicitacoes->previousPageUrl()) }}"                  class="btn btn-info" role="button">Anterior</a>
<a href="{{ ($solicitacoes->nextPageUrl()) }}"                      class="btn btn-info" role="button">Próxima</a>
<a href="{{ ($solicitacoes->url($solicitacoes->lastPage())) }}"     class="btn btn-info" role="button">Ultima</a>

@endsection