@extends('layouts.material')

@section('titulo')

Registre-se

@endsection

@section('content')


<div class="row">

    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 login-page" style="margin-top: 100px;">
        <form class="form" method="POST" action="{{ route('user.store') }}">
        {{ csrf_field() }}

        {{-- DIV register-municipe --}}
        <br><br><br><br><br><br><br>
        <div id="register-municipe" class="card card-login card-hidden">
            
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
{{--                         <a href="#eugen" class="btn btn-just-icon btn-simple">
                            <i class="fa fa-google-plus"></i>
                        </a> --}}
                    </div>
                </div>

            <div class="card-content">
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">face</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">Nome</label>
                        <input name="nome" type="text" class="form-control error" value="{{ old('nome') }}">
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">E-mail</label>
                            <input name="email" type="email" class="form-control error" value="{{ old('email') }}">
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">credit_card</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">CPF</label>
                            <input name="cpf" id="cpf" type="text" class="form-control error" value="{{ old('cpf') }}">
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock_outline</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">Senha</label>
                        <input  name="password" type="password" class="form-control error">
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock_outline</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">Confirmar Senha</label>
                        <input  name="password_confirmation" type="password" class="form-control error">
                    </div>
                </div>
                
                <div class="checkbox">
                    <label style="color: #3d276b;">
                        <input name="aceite" type="checkbox" name="optionsCheckboxes" >
                        Eu Concordo com os
                        <a href="#something">termos e condições</a>.
                    </label>
                </div>
            </div>
            
            <div class="footer text-center">
                <button type="submit" class="btn btn-roxo btn-wd btn-lg">Enviar</button>
            </div>
        </div> {{-- FIM DIV register-municipe --}}
    
    </div>

</div> {{-- FIM ROW --}}
@endsection

@push('scripts')

    <script type="text/javascript">
    $().ready(function() {

            var tempo = 0;
            var incremento = 500;

            // Testar se há algum erro, e mostrar a notificação

             @if ($errors->any())
                
                 @foreach ($errors->all() as $error)

                    setTimeout(function(){
                        demo.notificationRight("top", "right", "rose", "{{ $error }}");   
                    }, tempo);

                    tempo += incremento;

                 @endforeach
                    
            @endif

            demo.checkFullPageBackgroundImage();
            
        });
    </script>

    {{-- Animação do card de login/registro --}}
    <script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
    </script>

@endpush