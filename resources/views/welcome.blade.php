@extends('layouts.material')

@section('titulo')

	Página Inicial

@endsection

@section('content')

<div class="wrapper">

            <div class="content">
                <div class="container-fluid">
                    <div class="header text-center">
                        <h3 class="title">Timeline</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-plain">
                                <div class="card-content">
                                    <ul class="timeline">
                                        <li class="timeline-inverted">
                                            <a href="#" class="timeline-badge danger mais-menos">
                                                <i class="material-icons">card_travel</i>
                                            </a>
                                            <div class="timeline-panel card card-product">
                                                <div class="card-profile">
                                                    <span class="superior-esquerdo label label-danger" style="position: absolute;z-index: 100">Nome da pessoa</span>
                                                    <a href="#pablo" class="timeline-heading card-avatar superior-esquerdo">
                                                        <img class="img" src="{{ asset('img/default-avatar.png') }}" />
                                                    </a>
                                                </div>
                                                <div class="timeline-body">
                                                    <div class="card-image">
                                                        <span class="label label-danger" style="position: absolute;">Tema da solicitação</span>
                                                        <a href="#pablo">
                                                            <img class="img" src="{{ asset('img/image_placeholder.jpg') }}">
                                                        </a>
                                                    </div><br>
                                                    <p>Wifey made the best Father's Day meal ever. So thankful so happy so blessed. Thank you for making my family We just had fun with the “future” theme !!! It was a fun night all together ... The always rude Kanye Show at 2am Sold Out Famous viewing @ Figueroa and 12th in downtown.</p>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-control">Criado em:</label>
                                                    <input type="text" class="form-control datetimepicker" value="10/05/2016"/ disabled="true">
                                                </div>
                                                <ul class=" nav navbar-nav col-sm-12">
                                                    <li class="col-sm-4">
                                                        <button class="btn btn-simple">
                                                            <span class="btn-label">
                                                                <i class="material-icons">thumb_up</i>
                                                            </span>
                                                            Curtir
                                                        </button>
                                                    </li>
                                                    <li class="col-sm-4">
                                                        <button class="btn btn-simple collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <span class="btn-label">
                                                                <i class="material-icons">chat</i>
                                                            </span>
                                                            Comentar
                                                        </button>
                                                    </li>
                                                    <li class="col-sm-4">
                                                        <button class="btn btn-simple">
                                                            <span class="btn-label">
                                                                <i class="material-icons inverterX">reply</i>
                                                            </span>
                                                            Compartilhar
                                                        </button>
                                                    </li>
                                                </ul>
                                                <footer id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-title form-group form-search is-empty ">
                                                        <div class="row">
                                                            <label class="card-testimonial col-sm-2 label-on-left" style="top: 40px;">
                                                                <div class="card-avatar">
                                                                    <img class="img" src="{{ asset('img/default-avatar.png') }}"">
                                                                </div>
                                                            </label>
                                                            <div class="col-sm-9">
                                                            <div class="form-group label-floating is-empty">
                                                            <label class="control-label"></label>
                                                            <input type="text" class="form-control" placeholder="Escreva um comentário">
                                                            <span class="material-input"></span>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                        <div class="panel-body">
                                        <div class="col-md-12">
                                            <div class="card" data-header-animation="true">
                                                <div class="card-header card-header-icon" data-background-color="default">
                                                    <i class="material-icons"><img class="img" src="{{ asset('img/default-avatar.png') }}""></i>
                                                </div>
                                                <div class="card-content">
                                                    <h4 class="card-title">Nome da pessoa</h4>
                                                        <div class="tim-typo">
                                                        <p>
                                                        The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...</p>
                                                        </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header card-header-icon" data-background-color="default">
                                                    <i class="material-icons"><img class="img" src="{{ asset('img/default-avatar.png') }}""></i>
                                                </div>
                                                <div class="card-content">
                                                    <h4 class="card-title">Nome da pessoa</h4>
                                                        <div class="tim-typo">
                                                        <p>
                                                        The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...</p>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        </footer>
                                        <br><br>
                                        </div>
                                            </div>
                                        </li><br><br>
                                        <li>
                                            <a href="#" class="timeline-badge success mais-menos">
                                                <i class="material-icons">extension</i>
                                            </a>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-success">Another One</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Thank God for the support of my wife and real friends. I also wanted to point out that it’s the first album to go number 1 off of streaming!!! I love you Ellen and also my number one design rule of anything I do from shoes to music to homes is that Kim has to like it....</p>
                                                </div>
                                            </div>
                                        </li>
                                        <br><br>
                                        <li class="timeline-inverted">
                                            <a href="#" class="timeline-badge info mais-menos">
                                                <i class="material-icons">fingerprint</i>
                                            </a>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-info">Another Title</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Called I Miss the Old Kanye That’s all it was Kanye And I love you like Kanye loves Kanye Famous viewing @ Figueroa and 12th in downtown LA 11:10PM</p>
                                                    <p>What if Kanye made a song about Kanye Royère doesn't make a Polar bear bed but the Polar bear couch is my favorite piece of furniture we own It wasn’t any Kanyes Set on his goals Kanye</p>
                                                    <hr>
                                                    <div class="dropdown pull-left">
                                                        <button type="button" class="btn btn-round btn-info dropdown-toggle" data-toggle="dropdown">
                                                            <i class="material-icons">build</i>
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <li>
                                                                <a href="#action">Action</a>
                                                            </li>
                                                            <li>
                                                                <a href="#action">Another action</a>
                                                            </li>
                                                            <li>
                                                                <a href="#here">Something else here</a>
                                                            </li>
                                                            <li class="divider"></li>
                                                            <li>
                                                                <a href="#link">Separated link</a>
                                                            </li><br><br>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li><br><br>
                                        <li>
                                            <a href="#" class="timeline-badge warning mais-menos">
                                                <i class="material-icons">flight_land</i>
                                            </a>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                                    <span class="label label-warning">Another One</span>
                                                </div>
                                                <div class="timeline-body">
                                                    <p>Tune into Big Boy's 92.3 I'm about to play the first single from Cruel Winter Tune into Big Boy's 92.3 I'm about to play the first single from Cruel Winter also to Kim’s hair and makeup Lorraine jewelry and the whole style squad at Balmain and the Yeezy team. Thank you Anna for the invite thank you to the whole Vogue team</p>
                                                </div>
                                            </div>
                                        </li><br><br>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
    </div>
    
@endsection