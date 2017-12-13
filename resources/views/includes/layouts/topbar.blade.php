<div class="cornerTop roxo"></div>
<nav class="navbar topbar360 navbar-fixed-top no-padding">
    <button type="button" class="navbar-toggle" data-toggle="collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  <img class="img logo horizontal" src="{{ asset('img/logo-horizontal-360.png')}}"> 
  <img class="img logo loading" src="{{ asset('img/loading.gif')}}">
  <div class="cornerTop branco"></div>
  <div class="container-fluid animated fadeInDown">
    <div class="collapse navbar-collapse no-margin no-padding">
      <ul class="nav navbar-nav navbar-right">
            
        @if(Auth::check())

          <li>
            <a href="{{ url('/')}}" class="dropdown-toggle">
              <i class="material-icons">home</i> Início
            </a>
          </li>
          
          <li>
            <a href="{{ url('/mapa')}}" class="dropdown-toggle">
              <i class="material-icons">map</i> Mapa
            </a>
          </li>

          <li>
            <a href="{{ url("/minhassolicitacoes") }}" class="dropdown-toggle minhas_solicitacoes">
              <i class="material-icons">dashboard</i> minhas solicitações
            </a>
          </li>

          <li style="margin-right: 10px">
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

              {{-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="material-icons">notifications</i>
                    <span class="notification" style="right: 100px;">5</span>
                    Notificações
                </a>
              </li> --}}
              
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
            <a href="{{ url('/mapa')}}" class="dropdown-toggle">
              <i class="material-icons">map</i> Mapa
            </a>
          </li>

          <li style="margin-right: 10px">
            <a href="{{url ("/login")}}">
              <i class="material-icons">fingerprint</i> Login
            </a>
          </li>

        @endif
            
      </ul>

      <form method="get" action="{{ url('/pesquisa') }}" class="navbar-form navbar-right" role="search">
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

  {{-- @if(Auth::check())

    <a href="{{ url("/solicitacao/create")}}" class="btn btn-branco btn-just-icon btn-round fixo-direita animated fadeInRight"><i class="mdi mdi-plus" rel="tooltip" data-placement="left" title="Criar solicitação"></i></a>

  @else
        
    <a href="#" class="btn btn-branco btn-just-icon btn-round fixo-direita helper-criaPub animated fadeInRight"><i class="mdi mdi-plus" rel="tooltip" data-placement="left" title="Criar solicitação"></i></a>

  @endif --}}

</nav>