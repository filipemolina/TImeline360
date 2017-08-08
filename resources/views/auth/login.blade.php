@extends('layouts.material')

@section('titulo')

    360| Login

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
                            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                                <form method="POST" action="{{ url('login') }}">
                                    {{ csrf_field() }}

                                    {{-- DIV login-municipe --}}
                                    <div id="login-municipe" class="card card-login card-hidden">
                                        <div class="logo-roxo logo-pn"></div>
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
                                            <button type="submit" class="btn btn-roxo btn-wd btn-lg">Acessar</button>
                                        </div>
                                    </div> {{-- FIM DIV login-municipe --}}

                                    

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection