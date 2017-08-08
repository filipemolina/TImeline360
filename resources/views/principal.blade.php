@extends('layouts.material')

@section('titulo')

	Página Inicial

@endsection

@section('content')
    <div class="row ">

        {{-- Início da Solicitação --}}

        @foreach ($solicitacoes as $item)
            
        
                    
            <div class="col-md-offset-2 col-md-7 publicacao">
                <div class="card">
                    <div class="card-profile col-md-2 col">
                        <div class="card-avatar card-header-icon">
                            <img class="img" src="{{ $item->solicitante->foto }}"/>
                        </div>
                    </div>
                    <div class="card-header card-header-icon pull-right" data-background-color="red">
                        <i class="material-icons">language</i>
                    </div>
                    <div class="card-image">
                        <span class="label label-danger"></span>
                        <a href="#pablo">
                            <img class="img" src="{{ $item->foto }}">
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-title">
                            <p class="col-md-12">
                                <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                                    <i class="material-icons">label_outline</i>
                                </button>
                                {{ $item->id }}
                                {{ $item->servico->nome }} - {{ $item->servico->setor->secretaria->sigla }}
                            </p>
                        </div>
                        <div class="timeline-body col-md-12">

                            {{ $item->conteudo }}

                        </div>
                    </div>

                    <ul class="nav navbar-nav">
                        <li class="col-md-3">
                            <button class="btn btn-simple apoiar" rel="tooltip" data-placement="bottom" title="Apoiar">
                                <span class="btn-label">
                                    <i class="material-icons">thumb_up</i>
                                </span>
                            </button>
                        </li>
                        <li class="col-md-3">
                            <button class="btn btn-simple slide-coment" rel="tooltip" data-placement="bottom" title="Comentários">
                                <span class="btn-label">
                                    <i class="material-icons">chat</i>
                                </span>
                            </button>
                        </li>
                        <li class="col-md-3">
                            <button class="btn btn-simple" rel="tooltip" data-placement="bottom" title="Apoios">
                                <span class="btn-label">
                                    <i class="material-icons">favorite</i>
                                </span>
                                <label>100</label>
                            </button>
                        </li>
                    </ul>
                            
                    <footer class="colapso col-md-12">
                        <div class="panel-title">
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
                        </div>

                        {{-- card de comentarios --}}
                        @foreach ($item->mensagens as $mensagem)

                            <div class="panel-body">
                                <div class="card">

                                    {{-- Caso a mensagem seja do próprio solicitante, mostrar a foto à esquerda --}}

                                    @if ($mensagem->funcionario_id)
                                        <div class="card-profile foto-funcionario col-md-2">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/brasao.png')}}">
                                            </div>
                                        </div>

                                        <div class="card-content">
                                            <h4 class="card-title">{{ $mensagem->funcionario->nome  }}</h4>
                                            <div class="tim-typo">
                                                <label>
                                                    {{ $mensagem->mensagem }}
                                                </label>
                                            </div>
                                        </div>
                                    
                                    @else

                                        <div class="card-profile col-md-2">
                                            <div class="card-avatar card-header-icon">
                                                {{-- <img class="img" src="{{ $item->solicitante->foto}}"> --}}
                                                <img class="img" src="{{ $item->solicitante->foto}}">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">{{ $item->solicitante->nome}}</h4>
                                            <div class="tim-typo">
                                                <label>
                                                    {{ $mensagem->mensagem }}
                                                </label>
                                            </div>
                                        </div>

                                    @endif


                                </div>
                            </div>

                        @endforeach
                        {{-- fim do card de comentarios --}}
                    </footer>
                </div>
            </div> {{-- Fim ID PUBLICAÇÃO --}}

            {{-- Fim da Solicitação --}}
        @endforeach

    </div> {{-- Fim da ROW --}}
@endsection