<div class="cornerTop roxo"></div>
<nav class="navbar topbar360 navbar-fixed-top no-padding">
  <button type="button" class="navbar-toggle no-margin" data-toggle="collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <span class="label title">MESQUITA 360</span>
  <img class="img logo horizontal" src="{{ asset('img/logo-horizontal-360.png')}}"> 
  <img class="img logo loading" src="{{ asset('img/loading.gif')}}">
  <span class="versao">(v0.1.2)</span>
  <div class="cornerTop branco"></div>

  <a class="btn btn-sm btn-simple gplay" target="_blank" href="https://goo.gl/5yu1aC">
    <img class="pull-left" src="{{ asset('img/google_play_04.png')}}">
    <div>
      <small>Disponível no</small><br><strong>Google Play</strong>
    </div>
  </a>

  <div class="col-md-2 previsao tempo">
    <div class="card">
      <div class="card-header card-header-text" data-background-color="blue">
         <h4 class="card-title">Clima</h4>
      </div>
      <div class="card-content" style="height: 200px"></div>
    </div>
  </div>

  <div class="container-fluid animated fadeInDown">
    <div class="collapse navbar-collapse no-margin no-padding">
      <ul class="nav navbar-nav navbar-right">

        <li>
          <a href="{{ url('/mapa')}}" class="dropdown-toggle">
            <i class="material-icons">map</i> Mapa
          </a>
        </li>

        @if(Auth::check())

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

        @else

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

        <li>
          <a href="{{ url('/')}}" class="dropdown-toggle">
            <i class="material-icons">home</i> Início
          </a>
        </li>

        <li class="separator hidden-lg hidden-md"></li>

        <li>
          <a class= "previsao tempo first" target="_blank">
            <img class="img" src="{{ asset("img/realistic/45px/$temperatura->icon.png")}}"/>
            <label> 
               {{ $temperatura->temperature }} ºC <!-- / {{ ($temperatura->humidity) }} % -->
            </label>

            <!-- <p style="font-size:12px; color:black; "> Umidade:  {{ ($temperatura->humidity) }} %</p> -->
          </a>
        </li>

        <li>
          <a class="temperatura previsao tempo second" target="_blank">
            <img class="img" src="{{ asset("img/realistic/45px/$temperatura->icon.png")}}"/>
            <label> 
              {{ $temperatura->temperature }}ºC - 
              {{ $temperatura->sensation }}ºC - 
              {{ ($temperatura->humidity) }}% 
            </label>
          </a>
        </li>

        <li>
          <a class="temperatura previsao tempo third" target="_blank">
            <canvas id="{{ $clima->icon }}"></canvas>
            <label> 
               {{ round($clima->temperature) }}ºC - 
               {{ round($clima->apparentTemperature) }}ºC - 
               {{ ($clima->humidity)*100 }}%
            </label>
          </a>          
        </li>
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


@push('scripts')
   <script>
      // icones de tempo
      var icons = new Skycons({"color": "black"}),
      list  = [
         "clear-day", "clear-night", "partly-cloudy-day",
         "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
         "fog"
      ],
      
      i;

      for(i = list.length; i--; )
        icons.set(list[i], list[i]);

      icons.play();
   </script>
@endpush