<nav class="navbar navbar-default navbar-static-top navbar-fixed-top @if(Request::is('/')) animated fadeInDownBig @endif" style="border-bottom: 20px solid #5c458c; padding-bottom: 4px;">
   <div class="container-fluid">
      <div class="navbar-header">
         {{-- <img class="img" style="width: 150px; margin-top: -15px;" src="{{ asset('img/logo-360-roxo.png')}}">    --}}
         {{-- <img class="img" style="width: 150px; margin-top: -15px;" src="{{ asset('img/logo-360-dourado.png')}}">    --}}
         {{-- <img class="img" style="width: 150px; margin-top: -15px;" src="{{ asset('img/loading.gif')}}">    --}}

         <img class="img" style="width: 190px; 
                                 margin-top: -40px; 
                                 margin-left: -35px;" 
                                 src="{{ asset('img/logo-horizontal-360.png')}}">  
         {{-- <img class="img" style="width: 75px; margin-top: -38px; margin-left: 200px;" src="{{ asset('img/loading.gif')}}"> --}}         

         <span style="font-size: 10px; margin-left: 5px;" >
            (v1.0.2) 
         </span>

         <span style="margin-left: 67px">
            <canvas id="{{ $clima->icon }}" width="50" height="50"></canvas>
            <label style="font-size:14px; color:#555555; "> {{ round($clima->temperature) }} ºC / {{ round(($clima->humidity)*100) }} %</label>
         </span>
            
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
               {{-- <li class="dropdown">
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
                --}}
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

               <li>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="material-icons">settings</i> Menu
                  </a>
               
                  <ul class="dropdown-menu">
                     <li>
                        <a href="{{ url("/perfil") }}" >
                           <i class="material-icons">person</i> Editar Perfil
                        </a>
                     </li>

                     <li>
                        <a href="{{ url("/senha") }}" >
                           <i class="material-icons">lock_outline</i> Alterar Senha
                        </a>
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
               <li>
                  <a href="{{ url('/mapa')}}" class="dropdown-toggle">
                     <i class="material-icons">map</i> Mapa
                  </a>
               </li>
               <li class=" active ">
                  <a href="{{url ("/registro")}}">
                     <i class="material-icons">person_add</i> Registre-se
                  </a>
               </li>

               <li class="">
                  <a href="{{url ("/login")}}">
                     <i class="material-icons">fingerprint</i> Login
                  </a>
               </li>
                  
            @endif
         </ul>

         <form method="get" action="{{ url('/pesquisa') }}" class="navbar-form navbar-right" role="search">
            <div class="form-group form-search is-empty">
               <input name="termo" type="text" class="form-control pesquisa" style="background-image: linear-gradient(#3d276b, #3d276b), linear-gradient(#D2D2D2, #D2D2D2);" placeholder="Pesquisar">
               <span class="material-input"></span>
            </div>

            <button type="submit" class="btn btn-white btn-round btn-just-icon" style="background: #3d276b;color: #fff">
               <i class="material-icons">search</i>
               <div class="ripple-container"></div>
            </button>
         </form>
      </div>
   </div>
</nav>

@push('scripts')
   <script>
      // icones de tempo
      var icons = new Skycons({"color": "#3D276B"}),
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

