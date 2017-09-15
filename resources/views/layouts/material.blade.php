<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mesquita 360º</title>

    <!-- Styles -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('css/material-dashboard.css') }}" rel="stylesheet" />

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

    <!-- meterial fonts     -->
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet" />

    {{-- SELECT2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    {{-- icone da pagina --}}
    <link rel="icon" type="imagem/png" href="{{ asset('img/logo-360-roxo.png') }}" />

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>

<body class="fundo_roxo">

        {{-- Menu Lateral --}}
        
       {{--  @include('includes.layouts.sidebar') --}}

        {{-- <div class="main-panel"> --}}

            {{-- Menu Superior --}}
            
            @include('includes.layouts.topbar')

            <div class="wrapper wrapper-full-page full-page" filter-color>
                <div class="content">
                    <div class="container-fluid">

                        {{-- Conteúdo Principal --}}
        
                        @yield('content')



                    </div>
                </div>
                
                {{-- Rodapé --}}
                @include('includes.layouts.footer')
            
            </div>
            
        {{-- </div> --}}
</body>

<script>
    
    //variáveis globais ao sistema
    let url_base       = "{{ url("/") }}";
    let token          = "{{ csrf_token() }}";
    @if(Auth::check())
         // Dados globais do usuário
         let id_usuario     = {{ Auth::user()->id }};
         let foto_usuario   = "{{ $usuario->solicitante->foto}}";
         let nome_usuario   = "{{ $usuario->solicitante->nome}}";
    @endif
</script>

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
<!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
<!--  Full Calendar Plugin    -->
<script src="{{ asset('js/fullcalendar.min.js') }}"></script>
<!-- TagsInput Plugin -->
<script src="{{ asset('js/jquery.tagsinput.js') }}"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{ asset('js/material-dashboard.js') }}"></script>

<script src="{{ asset('js/vanillaMasker.min.js') }}"></script>

{{-- SELECT2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ asset('js/demo.js') }}"></script>

<script src="{{ asset('js/vanillaMasker.min.js') }}"></script>

{{-- jscroll --}}
<script src="{{ asset('js/jscroll/jquery.jscroll.js') }}"></script>

<script src="{{ asset('js/functions.js') }}"></script>

@stack('scripts')

<script src="{{ asset('js/scripts.js') }}"></script>

</html>