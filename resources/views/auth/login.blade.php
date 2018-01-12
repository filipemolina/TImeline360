@extends('layouts.material')

@section('titulo')



@endsection

@section('content')


{{-- @if ($errors->any())
    
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
 --}}
<div class="row" style="margin-top:192px;">
    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 login-page">
        <form method="POST" action="{{ url('login') }}">
                                    {{ csrf_field() }}

            {{-- DIV login-municipe --}}
           
            <div id="login" class="card card-login card-hidden">
                
                {{-- Logo --}}
                <div class="logo-roxo logo-pn"></div>

                {{-- Acesso via Facebook ou Google --}}
                <div class="card-header text-center" data-background-color="roxo">
                    <div class="social-line"><br><br><br></div>
                </div>
                
                {{-- Acesso por email --}}
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
                    <button type="submit" class="btn btn-roxo btn-lg">
                       Acessar
                    </button>
                    <div class="col-md text-center texto-roxo"> Ou, acesse por:</div>
                </div>
                           
                <div class="col-md-1 col-md-offset-5">
                    <a href="loginFacebook" class="btn btn-just-icon btn-round azul-face" {{-- style="top:40px; --}}">
                       <i class="fa fa-facebook"></i>
                    </a>
                </div>
                              
                <!-- <div class="col-md-1 col-md-offset-1">
                    <a href="loginFacebook" class="btn btn-just-icon btn-round vermelho-google">
                        <i class="fa fa-google"></i>
                    </a>
                </div> -->
               <div>
                 <a href="{{ url("/password/reset")}}" class="col-md text-center texto-roxo">Esqueceu sua Senha?</a>   
               </div>
            </div> {{-- FIM DIV login --}}

                                    

        </form>
    </div>
</div> {{-- FIM ROW --}}
@endsection

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function() {
        
                // Testar se há algum erro, e mostrar a notificação
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    demo.notificationRight("top", "right", "rose", "{{ $error }}");     
                    demo.initFormExtendedDatetimepickers();
                @endforeach
            @endif
            demo.initFormExtendedDatetimepickers();
        });
    </script>
@endpush