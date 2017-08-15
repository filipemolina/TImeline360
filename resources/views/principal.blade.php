@extends('layouts.material')

@section('titulo')

    Página Inicial

@endsection

@section('content')

<br><br>

{{-- Navegação entre as páginas --}}
<div class="col-md-4 col-md-offset-5">
    <ul class="pagination pagination-primary">
        <li class="active">
            <a href="{{ ($solicitacoes->url(1)) }}" role="button">
                <i class="material-icons">
                    fast_rewind
                </i>
            </a>
        </li>
        <li>
            <a href="{{ ($solicitacoes->previousPageUrl()) }}" role="button">
                <i class="material-icons inverterX">
                    forward
                </i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">1</a>
        </li>
        <li>
            <a href="javascript:void(0);">2</a>
        </li>
        <li>
            <a href="{{ ($solicitacoes->nextPageUrl()) }}" role="button">
                <i class="material-icons">
                    forward
                </i>
            </a>
        </li>
        <li>
            <a href="{{ ($solicitacoes->url($solicitacoes->lastPage())) }}" role="button">
                <i class="material-icons">
                    fast_forward</i>
                </a>
        </li>
    </ul>
</div> {{-- Fim navegação --}}

<div class="row ">

    {{-- Início da Solicitação --}}

    @foreach ($solicitacoes as $solicitacao)
                    
    <div class="col-sm-2 col-sm-offset-5 col-md-4 col-md-offset-4 col-lg-6 col-lg-offset-3">
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
                            <nav class="navbar navbar-absolute navbar-transparent">
                                
                                <div class="collapse navbar-collapse">
                                    
                                    <ul class="nav navbar-nav pull-right">
                                        
                                        <li class="dropdown">
                                            
                                            <a href="#" class="dropdown-toggle rodar-icone" data-toggle="dropdown">
                                                <i class="material-icons">settings</i>
                                                <b class="caret"></b>
                                            </a>
                                            
                                            <ul class="dropdown-menu">
                                                        
                                                <li>
                                                    <a href="#eugen" class="alterar">
                                                        <i class="material-icons">
                                                            create
                                                        </i>
                                                        Editar
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#eugen" class="desfazer hide">
                                                        <i class="material-icons">
                                                            create
                                                        </i>
                                                        Desfazer
                                                    </a>
                                                </li>
                                                            
                                                <li>
                                                    <a href="#">
                                                        <i class="material-icons">
                                                            clear
                                                        </i>
                                                        Excluir
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>

                            <div class="card-header card-header-icon avatar-fixo">
                                <img class="img" src="{{ $solicitacao->solicitante->foto }}"/>
                            </div>
                            
                            <div class="card-content">
                                <h5 class="card-title">
                                    {{ $solicitacao->solicitante->nome}}
                                </h5>
                                
                                <p class="card-title user-text">
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

{{-- Navegação entre as páginas --}}
<div class="col-md-4 col-md-offset-4 h6">
    <ul class="pagination pagination-primary">
        <li class="active">
            <a href="{{ ($solicitacoes->url(1)) }}" role="button">
                <i class="material-icons">
                    fast_rewind
                </i>
            </a>
        </li>
        <li>
            <a href="{{ ($solicitacoes->previousPageUrl()) }}" role="button">
                <i class="material-icons inverterX">
                    forward
                </i>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);">1</a>
        </li>
        <li>
            <a href="javascript:void(0);">2</a>
        </li>
        <li>
            <a href="{{ ($solicitacoes->nextPageUrl()) }}" role="button">
                <i class="material-icons">
                    forward
                </i>
            </a>
        </li>
        <li>
            <a href="{{ ($solicitacoes->url($solicitacoes->lastPage())) }}" role="button">
                <i class="material-icons">
                    fast_forward</i>
                </a>
        </li>
    </ul>
</div> {{-- Fim navegação --}}

@endsection