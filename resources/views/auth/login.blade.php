@extends('layouts.material')

@section('titulo')

Login

@endsection

@section('content')


@if ($errors->any())
    {{ dd("erro") }}
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

<div class="row">
    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 login-page">
        <form method="POST" action="{{ url('login') }}">
                                    {{ csrf_field() }}

            {{-- DIV login-municipe --}}
            <br><br><br><br><br><br>
            <div id="login" class="card card-login">
                
                {{-- Logo --}}
                <div class="logo-roxo logo-pn"></div>

                {{-- Acesso via Facebook ou Google --}}
                <div class="card-header text-center" data-background-color="roxo">
                    <div class="social-line">
                    <br>
                        <a href="#btn" class="btn btn-just-icon btn-simple">
                            <i class="fa fa-facebook-square"></i>
                        </a>
                        <a href="#eugen" class="btn btn-just-icon btn-simple">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
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
                </div>
            </div> {{-- FIM DIV login --}}

                                    

        </form>
    </div>
</div> {{-- FIM ROW --}}
@endsection