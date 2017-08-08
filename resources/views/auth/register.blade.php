<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Registro</title>

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
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
             {{-- <a class="navbar-brand" href=" ../dashboard.html ">Material Dashboard Pro</a> --}}
         </div>
         
         <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
               <li>
                     {{-- <a href="{{ asset('dashboard.html') }}">
                         <i class="material-icons">dashboard</i> Dashboard
                     </a> --}}
               </li>
               
               <li class="">
                  <a href="{{ url( "login" ) }}">
                     <i class="material-icons">fingerprint</i> Login
                  </a>
               </li>
               <li class="">
                     {{-- <a href="lock.html">
                         <i class="material-icons">lock_open</i> Lock
                     </a> --}}
               </li>
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

               
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <form class="form" method="POST" action="{{ route('user.store') }}">
                                        {{ csrf_field() }}

                                    {{-- DIV login-municipe --}}
                                    <div id="login-municipe" class="card card-login card-hidden">
                                        <div class="logo-roxo logo-pn" style="top: -30%"></div>
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
                                                    <i class="material-icons">face</i>
                                               </span>
                                               <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Nome</label>
                                                    <input name="nome" type="text" class="form-control" value="{{ old('nome') }}">
                                               </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">E-mail</label>
                                                    <input name="email" type="email" class="form-control" value="{{ old('email') }}">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                     <i class="material-icons">credit_card</i>
                                               </span>
                                                <div class="form-group label-floating has-roxo">
                                                   <label class="control-label">CPF</label>
                                                   <input name="cpf" id="cpf" type="text" class="form-control" value="{{ old('cpf') }}">
                                                </div>
                                           </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Senha</label>
                                                    <input  name="password" type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Confirmar Senha</label>
                                                    <input  name="password_confirmation" type="password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="checkbox">
                                       <label style="color: #3d276b;">
                                          <input name="aceite" type="checkbox" name="optionsCheckboxes" > Eu Concordo com os
                                           <a href="#something">termos e condições</a>.
                                       </label>
                                    </div>
                                        </div>
                                        <div class="footer text-center">
                                            <button type="submit" class="btn btn-roxo btn-wd btn-lg">Enviar</button>
                                        </div>
                                    </div> {{-- FIM DIV login-municipe --}}

                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @include('includes.layouts.footer')
            </div>
        </div>
   </div>
</body>

<!--   Core JS Files   -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="{{ asset('js/moment.min.js') }}"></script>
<!--  Charts Plugin -->
<script src="{{ asset('js/chartist.min.js') }}"></script>
<!--  Plugin for the Wizard -->
<script src="{{ asset('js/jquery.bootstrap-wizard.js') }}"></script>
<!--  Notifications Plugin    -->
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<!-- DateTimePicker Plugin -->
<script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
<!-- Vector Map plugin -->
<script src="{{ asset('js/jquery-jvectormap.js') }}"></script>
<!-- Sliders Plugin -->
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<!-- Select Plugin -->
<script src="{{ asset('js/jquery.select-bootstrap.js') }}"></script>
<!--  DataTables.net Plugin    -->
<script src="{{ asset('js/jquery.datatables.js') }}"></script>
<!-- Sweet Alert 2 plugin -->
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<!-- TagsInput Plugin -->
<script src="{{ asset('js/jquery.tagsinput.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/material-dashboard.js') }}"></script>

<script src="{{ asset('js/vanillaMasker.min.js') }}"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>

<script src="{{ asset('js/vanillaMasker.min.js') }}"></script>

<script src="{{ asset('js/scripts.js') }}"></script>

<script type="text/javascript">
    $().ready(function() {

        // Testar se há algum erro, e mostrar a notificação

         @if ($errors->any())
            
             @foreach ($errors->all() as $error)

                demo.notificationRight("top", "right", "primary", "{{ $error }}");

             @endforeach
                
        @endif

        VMasker ($("#cpf")).maskPattern("999.999.999-99");

        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
</script>

</html>