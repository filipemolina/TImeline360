@extends('layouts.material')

@section('titulo')

Nova solicitação

@endsection

@section('content')

<div class="row">

    <div class="col-sm-8 col-sm-offset-2">

    <!--      Wizard container        -->
        
        <div class="wizard-container">
            <div class="card wizard-card" data-color="rose" id="wizardProfile">
                <form action="" method="">
                    <div class="wizard-header no-padding no-margin">
                        <h3 class="wizard-title">
                            Crie sua solicitação
                        </h3>
                    </div>

                    {{-- Menus --}}
                    <div class="wizard-navigation">
                        <ul>
                            <li class="wizard">
                                <a href="#categoria" data-toggle="tab">Passo 1</a>
                            </li>
                            
                            <li class="wizard">
                                <a href="#foto" data-toggle="tab">Passo 2</a>
                            </li>
                            
                            <li class="wizard">
                                <a href="#local" data-toggle="tab">Passo 3</a>
                            </li>
                        </ul>
                    </div>
                    
                    {{-- Conteúdo dos Menus --}}
                    <div class="tab-content no-padding">
                        
                        {{-- Primeiro menu --}}
                        <div class="tab-pane" id="categoria">
                            <div class="row">
                                
                                <h4 class="info-text no-margin"> Escolha a categoria da sua solicitação</h4>

                                    {{-- Categoria selecionada --}}
                                    <figure class="highlight pq col-md-6 col-md-offset-3">

                                        {{-- Ícone da categoria --}}
                                        <label class="col-md-12">
                                            <i class="mdi mdi-security"></i>
                                        </label>

                                        {{-- Nome do setor --}}
                                        <label class="col-md-12">Setor 1</label>
                                        
                                        <div class="input-group form-group">

                                            <span class="input-group-addon"><i class="mdi mdi-magnify"></i></span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Busca...</label>
                                                <input class="form-control" name="email" type="search" value="">
                                            </div>
                                            
                                            {{-- Botão limpar campo --}}
                                            {{-- <span class="input-group-btn">
                                                <button class="btn btn-simple btn-danger btn-xs"><i class="mdi mdi-close-circle-outline"></i></button>
                                            </span> --}}
                                        </div>
                                    
                                    </figure>

                                {{-- Botões das categorias --}}
                                <div class="col-md-12">
                                    
                                    @foreach($setores as $setor)
                                        
                                        <div class="col-md-3 container-btn no-pa">
                                            <div class="dropdown">
                                                <button href="#" class="btn btn-just-icon btn-round dropdown-toggle" style="background-color: {{ $setor->cor }};" data-toggle="dropdown" aria-expanded="true" rel="tooltip" >
                                                    <i class="mdi {{ $setor->icone }}"></i>
                                                </button>                                               
                                                    
                                                <ul class="dropdown-menu">
                                                        
                                                    @foreach($setor->servicos as $servico)
                                                            
                                                        <li><a class="previnir" href="#">{{ $servico->nome }}</a></li>
                                                    
                                                    @endforeach
                                                    
                                                </ul>
                                            </div>

                                            <p> {{ $setor->nome }} </p>
                                        </div>
                                        
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>

                        {{-- Segundo menu --}}
                        <div class="tab-pane" id="foto">
                            <div class="row">
                                <div class="fileinput fileinput-new text-center col-md-5 col-md-offset-1" data-provides="fileinput">
                                    <h4 class="info-text"> Envie a foto </h4>
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{asset ('/img/image_placeholder.jpg')}}" alt="...">
                                    </div>

                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Selecione uma foto</span>
                                            <span class="fileinput-exists">Atelrar</span>
                                            <input name="firstname" type="file" name="..." />
                                        </span>
                                        {{-- <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a> --}}
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <h4 class="info-text"> Descreva a solicitação </h4>
                                    <textarea name="lastname" class="form-control" placeholder="Clique aqui para digitar" rows="9"></textarea>
                                </div>
                            </div>
                        </div>
                            
                        {{-- Terceiro menu --}}
                        <div class="tab-pane" id="local">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="info-text"> Informe o local</h4>
                                </div>

                                <div class="mapa"></div>
                            </div>
                        </div>
                    </div>
                                        
                    <div class="wizard-footer">
                        <div class="pull-right">
                            <input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
                            <input type='button' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' />
                        </div>
                        
                        <div class="pull-left">
                            <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div> <!-- wizard container -->
    </div>
</div> {{-- FIM ROW --}}

@endsection

@push('scripts')

<script type="text/javascript">
    $().ready(function() {
        demo.initMaterialWizard();
    });
</script>

@endpush