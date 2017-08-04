<<<<<<< HEAD
<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>
=======
<nav class="navbar navbar-transparent navbar-absolute" style="background: #3d276b; color: #fff; background-image: linear-gradient(to left, transparent 75%, #FFF);"> 
    <div class="container-fluid">
        {{-- <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon" style="background: #bfa15f; color:#fff;">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div> --}}
>>>>>>> leandro
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
<<<<<<< HEAD
            <a class="navbar-brand" href="#"> @section('titulo')  @show </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">dashboard</i>
                        <p class="hidden-lg hidden-md">Dashboard</p>
=======
            <a class="navbar-brand" href="#" style="color: #000"> @section('titulo')  @show </a>
        </div>

            <div class="collapse navbar-collapse">
             <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">dashboard</i>
                        minhas solicitações
>>>>>>> leandro
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">notifications</i>
<<<<<<< HEAD
                        <span class="notification">5</span>
                        <p class="hidden-lg hidden-md">
                            Notifications
                            <b class="caret"></b>
                        </p>
=======
                        <span class="notification" style="right: 100px;">5</span>
                        
                            Notificações
                        
>>>>>>> leandro
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
<<<<<<< HEAD
                <li>
                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">person</i>
                        <p class="hidden-lg hidden-md">Profile</p>
                    </a>
=======
                
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="material-icons">settings</i>
                                    Menu
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">person</i>
                                    Editar Perfil
                            </a>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="material-icons">input</i>
                                    Sair
                            </a>
                        </li>
                        
                    </ul>
>>>>>>> leandro
                </li>
                <li class="separator hidden-lg hidden-md"></li>
            </ul>
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group form-search is-empty">
<<<<<<< HEAD
                    <input type="text" class="form-control" placeholder="Search">
                    <span class="material-input"></span>
                </div>
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
=======
                    <input type="text" class="form-control" style="background-image: linear-gradient(#bfa15f, #bfa15f), linear-gradient(#D2D2D2, #D2D2D2);" placeholder="Pesquisar">
                    <span class="material-input"></span>
                </div>
                <button type="submit" class="btn btn-white btn-round btn-just-icon" style="background: #bfa15f;
    color: #fff">
>>>>>>> leandro
                    <i class="material-icons">search</i>
                    <div class="ripple-container"></div>
                </button>
            </form>
        </div>
    </div>
</nav>