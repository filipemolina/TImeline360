@extends('layouts.material')

@section('titulo')

	Dashboard | Principal

@endsection

@section('content')

<div class="wrapper">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="col-md-9 col-sm-2">
                        <div class="card">
                            <div class="card-profile col-md-2">
                                <div class="card-avatar card-header-icon">
                                    <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                </div>
                            </div>
                            <div class="card-header card-header-icon pull-right" data-background-color="red">
                                <i class="material-icons">language</i>
                            </div>
                            <div class="card-image">
                                <span class="label label-danger"></span>
                                <a href="#pablo">
                                    <img class="img" src="{{ asset('img/image_placeholder.jpg') }}">
                                </a>
                            </div>
                            <div class="card-content col-md-12">
                                <h4 class="card-title">Título da solicitação</h4>
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                            </div>
                            <ul class="nav navbar-nav">
                                <li>
                                    <button class="btn btn-simple">
                                        <span class="btn-label">
                                            <i class="material-icons">thumb_up</i>
                                        </span>
                                        Apoiar
                                    </button>
                                </li>
                                <li>
                                    <button class="btn btn-simple collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span class="btn-label">
                                            <i class="material-icons">chat</i>
                                        </span>
                                        Comentários
                                    </button>
                                </li>
                                {{-- <li class="col-sm-4">
                                    <button class="btn btn-simple">
                                        <span class="btn-label">
                                            <i class="material-icons inverterX">reply</i>
                                        </span>
                                        Compartilhar
                                    </button>
                                </li> --}}
                            </ul>
                            <footer id="collapseThree" class="panel-collapse collapse col-md-12" role="tabpanel" aria-labelledby="headingThree">
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
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-profile col-md-2">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                <p>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-profile col-md-2">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                <p>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>

                      
                    

                </div>
            </div>
        </div>
    </div>
</div>

@endsection