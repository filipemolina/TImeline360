
<nav class="navbar navbar-default navbar-static-top @if(Request::is('/')) animated fadeInDownBig @endif">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
         
      <ul class="navbar-brand" href="#">
        <a class="btn btn-simples">
          <img class="img" style="width: 190px; margin-top: -25px;" src="{{ asset('img/Logotipo-Horizontal-Colorido-PMM.png')}}"> 
        </a>
        
        <a class="btn btn-simples">
          <img class="img" style="width: 75px; margin-top: -25px;" src="{{ asset('img/loading.gif')}}">
        </a>
      </ul>
    </div>
      
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
            
        @if(Auth::check())

          <li>
            <a href="{{ url('/')}}" class="dropdown-toggle">
              <i class="material-icons">home</i> Início
            </a>
          </li>
               
          <li>
            <a href="{{ url("/minhassolicitacoes") }}" class="dropdown-toggle minhas_solicitacoes">
              <i class="material-icons">dashboard</i> minhas solicitações
            </a>
          </li>

          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="material-icons">settings</i> Menu
            </a>
               
            <ul class="dropdown-menu has-roxo">
              <li>
                <a href="{{ url("/perfil") }}">
                  <i class="material-icons">person</i> Editar Perfil
                </a>
              </li>

              <li>
                <a href="{{ url("/senha") }}" >
                  <i class="material-icons">lock_outline</i> Alterar Senha
                </a>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="material-icons">notifications</i>
                    <span class="notification" style="right: 100px;">5</span>
                    Notificações
                </a>

                <ul class="dropdown-menu has-roxo">
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
                <a href="{{ url("/logout") }}" >
                  <i class="material-icons">input</i> Sair
                </a>
              </li>
            </ul>
          </li>

          <li class="separator hidden-lg hidden-md"></li>

        @else

          <li>
            <a href="{{ url('/')}}" class="dropdown-toggle">
              <i class="material-icons">home</i> Início
            </a>
          </li>

          <li class=" active ">
            <a href="{{url ("/registro")}}">
              <i class="material-icons">person_add</i> Registre-se
            </a>
          </li>

          <li>
            <a href="{{url ("/login")}}">
              <i class="material-icons">fingerprint</i> Login
            </a>
          </li>
                  
        @endif
            
      </ul>

      <form method="get" action="/pesquisa" class="navbar-form navbar-right" role="search">
        <div class="form-group form-search is-empty">
          <input name="termo" type="text" class="form-control pesquisa has-roxo" placeholder="Pesquisar">
          <span class="material-input"></span>
        </div>

        <button type="submit" class="btn btn-white btn-round btn-just-icon btn-roxo">
          <i class="material-icons">search</i>
          <div class="ripple-container"></div>
        </button>
      </form>
    </div>
  </div>
</nav>
