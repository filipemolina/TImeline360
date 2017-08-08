@extends('layouts.material')

@section('titulo')

    360| Login

@endsection

<<<<<<< HEAD
@section('content')
=======
    <!-- Styles -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="css/material-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body class="fundo_roxo">

            <nav class="navbar navbar-default navbar-static-top animated fadeInDownBig">

                <div class="container">
                    <div class="navbar-header rodar_icone">
                        <a class="navbar-brand btn btn-roxo btn-simple btn-wd btn-lg  troca-login-municipe" href="#" style="position: absolute;">
                            <i class="material-icons">cached</i>
                            Alterar para servidor
                        </a>
                        <a class="navbar-brand btn btn-dourado btn-simple btn-wd btn-lg  troca-login-servidor hide" href="#" style="position: absolute;">
                        <i class="material-icons">cached</i>
                        Alterar para munícipe
                    </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            &nbsp;
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->   
                            {{-- @if (Auth::guest()) --}}
                                {{-- <li><a href="{{ route('login') }}">Login</a></li> --}}
                                <li><a href="{{ url( "registro" ) }}" class="btn btn-roxo btn-simple btn-wd btn-lg">Cadastre-se</a></li>
                            {{-- @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                            @endif --}}
                        </ul>
                    </div>
                </div>
            </nav>
        
        <div class="wrapper wrapper-full-page">
            <br><br>
            <div class="full-page login-page" filter-color="black" data-image="/img/prefeitura.png">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="content">
                    <div class="container">
>>>>>>> leandro

                        @if ($errors->any())
                            {{ dd("erro") }}
                           <div class="alert alert-primary alert-with-icon" data-notify="container">
                              <i class="material-icons" data-notify="icon">notifications</i>
                              <button type="button" aria-hidden="true" class="close">
                                 <i class="material-icons">close</i>
                              </button>
                              <ul>
                                 @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                 @endforeach
                              </ul>                    
                           </div>
                        @endif






                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <form method="POST" action="{{ url('login') }}">
                                    {{ csrf_field() }}

                                    {{-- DIV login-municipe --}}
                                    <div id="login-municipe" class="card card-login card-hidden">
                                        <div class="logo-roxo logo-pn"></div>
                                        <div class="card-header text-center" data-background-color="roxo">
                                                <div class="social-line">
                                                    <br>
                                                    <a href="#btn" class="btn btn-just-icon btn-simple">
                                                        <i class="fa fa-facebook-square"></i>
                                                    </a>
                                                    {{-- <a href="#pablo" class="btn btn-just-icon btn-simple">
                                                        <i class="fa fa-twitter"></i>
                                                    </a> --}}
                                                    <a href="#eugen" class="btn btn-just-icon btn-simple">
                                                        <i class="fa fa-google-plus"></i>
                                                    </a>
                                                </div>
                                        </div>
                                        <div class="card-content">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">E-mail</label>
                                                    <input name="email" type="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Senha</label>
                                                    <input name="password" type="password" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-roxo btn-wd btn-lg">Acessar</button>
                                        </div>
                                    </div> {{-- FIM DIV login-municipe --}}

                                    

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection