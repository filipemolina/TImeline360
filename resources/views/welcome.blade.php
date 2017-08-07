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
                    
                    <div id="publicacao#" class="col-md-4">
                        <div class="card">
                            <div class="card-profile col-md-3 col">
                                <div class="card-avatar card-header-icon">
                                    <img class="img" src="{{ asset('img/default-avatar.png') }}"/>
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
                            <div class="card-content">
                                <div class="card-title">
                                    <p class="col-md-12">
                                        <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                                            <i class="material-icons">label_outline</i>
                                        </button>
                                        Título da solicitação
                                    </p>
                                </div>
                                <div class="timeline-body col-md-12">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
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
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                <label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                </label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div> {{-- Fim ID PUBLICAÇÃO --}}

                    <div id="publicacao#" class="col-md-4">
                        <div class="card">
                            <div class="card-profile col-md-3 col">
                                <div class="card-avatar card-header-icon">
                                    <img class="img" src="{{ asset('img/default-avatar.png') }}"/>
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
                            <div class="card-content">
                                <div class="card-title">
                                    <p class="col-md-12">
                                        <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                                            <i class="material-icons">label_outline</i>
                                        </button>
                                        Título da solicitação
                                    </p>
                                </div>
                                <div class="timeline-body col-md-12">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
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
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                <label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                </label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div> {{-- Fim ID PUBLICAÇÃO --}}

                    <div id="publicacao#" class="col-md-4">
                        <div class="card">
                            <div class="card-profile col-md-3 col">
                                <div class="card-avatar card-header-icon">
                                    <img class="img" src="{{ asset('img/default-avatar.png') }}"/>
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
                            <div class="card-content">
                                <div class="card-title">
                                    <p class="col-md-12">
                                        <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                                            <i class="material-icons">label_outline</i>
                                        </button>
                                        Título da solicitação
                                    </p>
                                </div>
                                <div class="timeline-body col-md-12">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
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
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                <label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                </label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div> {{-- Fim ID PUBLICAÇÃO --}}

                    <div id="publicacao#" class="col-md-8">
                        <div class="card">
                            <div class="card-profile col-md-3 col">
                                <div class="card-avatar card-header-icon">
                                    <img class="img" src="{{ asset('img/default-avatar.png') }}"/>
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
                            <div class="card-content">
                                <div class="card-title">
                                    <p class="col-md-12">
                                        <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                                            <i class="material-icons">label_outline</i>
                                        </button>
                                        Título da solicitação
                                    </p>
                                </div>
                                <div class="timeline-body col-md-12">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
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
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                <label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                </label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div> {{-- Fim ID PUBLICAÇÃO --}}

                    <div id="publicacao#" class="col-md-4">
                        <div class="card">
                            <div class="card-profile col-md-3 col">
                                <div class="card-avatar card-header-icon">
                                    <img class="img" src="{{ asset('img/default-avatar.png') }}"/>
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
                            <div class="card-content">
                                <div class="card-title">
                                    <p class="col-md-12">
                                        <button class="btn btn-just-icon btn-simple btn-xs btn-primary">
                                            <i class="material-icons">label_outline</i>
                                        </button>
                                        Título da solicitação
                                    </p>
                                </div>
                                <div class="timeline-body col-md-12">
                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
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
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                <label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-profile col-md-3">
                                            <div class="card-avatar card-header-icon">
                                                <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                            </div>
                                        </div>
                                        <div class="card-content">
                                            <h4 class="card-title">Nome da pessoa</h4>
                                            <div class="tim-typo">
                                                </label>
                                                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div> {{-- Fim ID PUBLICAÇÃO --}}
                

                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD

=======
>>>>>>> master
@endsection