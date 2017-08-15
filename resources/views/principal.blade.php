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
                        <button class="btn btn-simple apoiar">
                            <span class="btn-label">
                                <i class="material-icons" >thumb_up</i>
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
                    {{-- <div class="card" data-header-animation="true"> --}}

                        {{-- Caso a mensagem seja do próprio solicitante, mostrar a foto à esquerda --}}

                        {{-- mensagem do funcionário --}}
                        @if ($mensagem->funcionario_id)

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

                        <div class="card subir">
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