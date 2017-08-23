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
            <div class="card-header card-header-icon pull-right icone-direita" data-background-color="red">
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
                        <button class="btn btn-simples btn-apoiar">
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
                    <button class="btn btn-simples">
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

                @foreach ($solicitacao->mensagens as $mensagem)

                
                {{-- card de comentarios --}}
                <div class="panel-body no-padding">

                    {{-- Caso a mensagem seja do próprio solicitante, mostrar a foto à esquerda --}}

                    @if ($mensagem->funcionario)                    

                    {{-- mensagem do funcionário --}}
                    <div class="card margin10">

                        {{-- Avatar pequeno --}}
                        <div class="card-header card-header-icon avatar-fixo-pn pull-right">
                            <img class="img" src="{{ asset('img/brasao.png')}}"/>
                        </div>

                        {{-- Comentário --}}
                        <form class="form-horizontal">

                            <div class="row">
                                
                                {{-- Nome da secretária --}}
                                <label class="col-md-11 h6 pull-right fc-rtl">
                                    {{ $mensagem->funcionario->setor->secretaria->nome }} - {{ $mensagem->funcionario->setor->secretaria->sigla }}
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
                                <label class="col-md-8 h6">
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
                                        <input type="text" class="form-control" value="{{ $mensagem->mensagem }}">
                                    </div>
                                    <div class="col-md-5 pull-right">
                                        <button type="button" value="submit" class="btn btn-primary btn-sm btn-coment-alterar">
                                            Alterar
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm coment-desfazer">
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
                    
                    <div class="card col-md-10 margin10">
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

                {{-- Fim escrever comentário --}}

            </footer>

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