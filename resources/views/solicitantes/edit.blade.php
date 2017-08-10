@extends('layouts.material')

@section('content')
<div class="container">
    <div class="row">
                            <div class="col-md-6 col-sm-6" >
                                <form class="form" method="POST" action="{{ route('user.store') }}">
                                        {{ csrf_field() }}

                                    {{-- DIV login-municipe --}}

                                    <div id="login-municipe" class="card card-login card-hidden">

                                        {{-- <div class="logo-roxo logo-pn" style="margin-top: 25%;"></div> --}}
                                        <div class="card-header text-center" data-background-color="roxo">
                                                <div class="social-line">                                                   
                                                    <h4 style="font-weight: bolder;">PESSOAL</h4>
                                                    {{-- <a href="#btn" class="btn btn-just-icon btn-simple">
                                                        <i class="fa fa-facebook-square"></i>
                                                    </a>
                                                    <a href="#pablo" class="btn btn-just-icon btn-simple">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a href="#eugen" class="btn btn-just-icon btn-simple">
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
                                                    <input name="email" type="email" class="form-control error"  value="{{ old('email') }}">
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
                                                     <i class="material-icons">event</i>
                                               </span>
                                                <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Nascimento</label>
                                                    <input name="nascimento" type="text" class="form-control datepicker " value="{{ old('nascimento') }}">
                                               </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                     <i class="material-icons">wc</i>
                                               </span>
                                               <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Sexo</label>
                                                    <input name="sexo" type="text" class="form-control error" value="{{ old('sexo') }}">
                                               </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                     <i class="material-icons">card_membership</i>
                                               </span>
                                               <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Escolaridade</label>
                                                    <input name="escolaridade" type="text" class="form-control error" value="{{ old('escolaridade') }}">
                                               </div>
                                           </div>
                                                                                        
                                        </div>
                                        
                                    </div> {{-- FIM DIV login-municipe --}}

                                    
                                </form>
                            </div>

                             <div class="col-md-6 col-sm-6">
                                <form class="form" method="POST" action="{{ route('user.store') }}">
                                        {{ csrf_field() }}

                                    {{-- DIV login-municipe --}}

                                    <div id="login-municipe" class="card card-login card-hidden">

                                        {{-- <div class="logo-roxo logo-pn" style="margin-top: 25%;"></div> --}}
                                        <div class="card-header text-center" data-background-color="roxo">
                                                <div class="social-line">
                                                     <h4 style="font-weight: bolder;">CONTATO</h4>
                                                    
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
                                                    <input name="email" type="email" class="form-control error"  value="{{ old('email') }}">
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
                                                     <i class="material-icons">event</i>
                                               </span>
                                                <div class="form-group label-floating has-roxo">
                                                    <label class="label-control">Nascimento</label>
                                                    <input name="nascimento" type="text" class="form-control datepicker " value="{{ old('nascimento') }}">
                                               </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                     <i class="material-icons">credit_card</i>
                                               </span>
                                               <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Sexo</label>
                                                    <input name="sexo" type="text" class="form-control error" value="{{ old('sexo') }}">
                                               </div>
                                            </div>
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                     <i class="material-icons">card_membership</i>
                                               </span>
                                               <div class="form-group label-floating has-roxo">
                                                    <label class="control-label">Escolaridade</label>
                                                    <input name="escolaridade" type="text" class="form-control error" value="{{ old('escolaridade') }}">
                                               </div>
                                           </div>
                                           
                                            
                                        </div>
                                        
                                    </div> {{-- FIM DIV login-municipe --}}

                                </form>
                                
                            </div>
                        </div>
</div>
        <div class="footer text-center">
            <button type="submit" class="btn btn-roxo btn-wd btn-lg">Salvar</button>
        </div>
@endsection

@push("scripts")

    
    <!-- DateTimePicker Plugin -->
<script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        
        demo.initFormExtendedDatetimepickers();
    });
</script>

@endpush