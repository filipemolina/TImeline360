  <nav class="navbar navbar-default navbar-static-top animated fadeInDownBig">
  
  <div class="container-fluid">
        {{-- <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon" style="background: #bfa15f; color:#fff;">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div> --}}
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color: #000"> @section('titulo')  @show </a>
        </div>

            <div class="collapse navbar-collapse">
             <ul class="nav navbar-nav navbar-right">

            @if(Auth::check())

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">notifications</i>
                        <span class="notification" style="right: 100px;">5</span>
                        
                            Notificações
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#">Mike John responded to your email</a>
                        </li>
                        <li>
                            <a href="#">You have 5 new tasks</a>
                        </li>
                        <li>
                            <a href="#">You're now friend with Andrew</a>
                        </li>
                        <li>
                            <a href="#">Another Notification</a>
                        </li>
                        <li>
                            <a href="#">Another One</a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="{{ url("/minhassolicitacoes") }}" class="dropdown-toggle" >
                        <i class="material-icons">dashboard</i>
                        minhas solicitações
                    </a>
                </li>
                
                <li>
                    <a href="{{ url('/')}}" class="dropdown-toggle">
                        <i class="material-icons">home</i>
                                    Início
                    </a>
                </li>
                
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">settings</i>
                                    Menu
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ url("/perfil") }}" >
                                <i class="material-icons">person</i>
                                    Editar Perfil
                            </a>
                        </li>

                        <li>
                            <a href="{{ url("/logout") }}" >
                                <i class="material-icons">input</i>
                                    Sair
                            </a>
                        </li>
                        
                    </ul>
                </li>
                <li class="separator hidden-lg hidden-md"></li>

                @else

                    <li class=" active ">
                        <a href="{{url ("/registro")}}">
                            <i class="material-icons">person_add</i> Registrar
                        </a>
                    </li>
                    
                    <li>
                    <a href="{{ url('/')}}" class="dropdown-toggle">
                        <i class="material-icons">home</i>
                                    Início
                    </a>
                    </li>
                    
                    <li class="">
                        <a href="{{url ("/login")}}">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                    <li class="">

                @endif
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group form-search is-empty">
                    <input type="text" class="form-control" style="background-image: linear-gradient(#3d276b, #3d276b), linear-gradient(#D2D2D2, #D2D2D2);" placeholder="Pesquisar">
                    <span class="material-input"></span>
                </div>
                <button type="submit" class="btn btn-white btn-round btn-just-icon" style="background: #3d276b;
    color: #fff">
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                </button>
            </form>
        </div>
    </div>
</nav>
