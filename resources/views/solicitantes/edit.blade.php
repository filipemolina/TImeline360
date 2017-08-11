@extends('layouts.material')

@section('content')
   <div class="container">
      <div class="row">
         <div class="col-md-6 col-sm-6 card-esquerdo" >
            <form class="form" method="POST" action="{{ route('user.store') }}">
               {{ csrf_field() }}

               <div id="login-municipe" class="card card-login card-hidden">
                  <div class="card-header card-header-icon" data-background-color="rose">
                       <i class="material-icons">person</i>
                  </div>
                  
                  <div class="card-content">
                       <h4 class="card-title">PESSOAL</h4>
                  </div>
                   
                  <div class="card-content">
                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">face</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                            <label class="control-label">Nome</label>
                            <input name="nome" type="text" class="form-control error" 
                                  value="{{$solicitante->nome or old('nome')}}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                            <label class="control-label">E-mail</label>
                            <input name="email" type="email" class="form-control error"  
                                value="{{ $solicitante->email or old('email') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                             <i class="material-icons">credit_card</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">CPF</label>
                           <input name="cpf" id="cpf" type="text" class="form-control error" 
                                  value="{{ $solicitante->cpf or  old('cpf') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                             <i class="material-icons">event</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="label-control" style="color: #3d276b;">Nascimento</label>
                           <input name="nascimento" type="date" class="form-control" 
                                    value="{{ $solicitante->nascimento or  old('nascimento') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                             <i class="material-icons">wc</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">Sexo</label>
                           <select   name="sexo" id="sexo"  class="form-control form-control error">
                              <option value="null"  selected style="color: #ccc;"> --- </option>
                                 @foreach($sexos as $sexo)
                                    @if ( $solicitante->sexo == $sexo)
                                        <option value="{{$sexo}}" selected="selected">{{$sexo}}</option>
                                    @else
                                        <option value="{{$sexo}}">{{$sexo}}</option>  
                                    @endif
                                 @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                             <i class="material-icons">card_membership</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">Escolaridade</label>
                           <select   name="escolaridade" id="escolaridade"  class="form-control form-control error">
                                        <option value="null"  selected style="color: #ccc;"> --- </option>
                              @foreach($escolaridades as $escolaridade)
                                 @if ( $solicitante->escolaridade == $escolaridade)
                                     <option value="{{$escolaridade}}" selected="selected">{{$escolaridade}}</option>
                                 @else
                                     <option value="{{$escolaridade}}">{{$escolaridade}}</option>  
                                 @endif
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                            <label class="control-label">Senha</label>
                            <input  name="password" type="password" class="form-control " 
                                    value="{{  $solicitante->password }}">
                        </div>
                     </div>
                    
                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock_outline</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                            <label class="control-label">Confirmar Senha</label>
                            <input  name="password_confirmation" type="password" class="form-control "
                                    value="{{  $solicitante->password_confirmation }}">
                        </div>
                     </div>
                  </div>
               </div> {{-- FIM DIV Pessoal --}}
            </div>
            
            <div class="col-md-6 col-sm-6">
               <div id="login-municipe" class="card card-login card-hidden">

                  <div class="card-header card-header-icon" data-background-color="rose">
                     <i class="material-icons">contacts</i>
                  </div>
                  <div class="card-content">
                      <h4 class="card-title">CONTATO</h4>
                  </div>
                  <div class="card-content">
                     <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">call_split</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">Logradouro</label>
                           <input name="nome" type="text" class="form-control error" 
                                   value="{{ $solicitante->endereco->logradouro or old('logradouro') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">home</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">Numero</label>
                           <input name="nome" type="text" class="form-control error" 
                                     value="{{ $solicitante->endereco->numero or old('numero') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">location_on</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">Complemento</label>
                           <input name="nome" type="text" class="form-control error" 
                                  value="{{ $solicitante->endereco->complemento  or  old('complemento') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">explore</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">Bairro</label>
                           <input name="email" type="email" class="form-control error"  
                                 value="{{ $solicitante->endereco->bairro or  old('bairro') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                          <i class="material-icons">business</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">Municipio</label>
                           <input name="cpf" id="cpf" type="text" class="form-control error" 
                               value="{{ $solicitante->endereco->municipio or old('municipio') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">map</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">UF</label>
                           <input name="nascimento" type="text" class="form-control datepicker " 
                                 value="{{ $solicitante->endereco->uf or old('uf') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">mail_outline</i>
                        </span>
                        <div class="form-group label-floating has-roxo">
                           <label class="control-label">CEP</label>
                           <input name="sexo" type="text" class="form-control error" 
                               value="{{ $solicitante->endereco->cep or old('cep') }}">
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                           <i class="material-icons">phone</i>
                        </span>
                     <div class="form-group label-floating has-roxo">
                        <label class="control-label">Telefone Fixo</label>
                        <input name="escolaridade" type="text" class="form-control error" 
                               value="{{ $solicitante->telefone->numero or old('numero') }}">
                     </div>
                  </div>
                  <div class="input-group">
                     <span class="input-group-addon">
                        <i class="material-icons">stay_current_portrait</i>
                     </span>
                     <div class="form-group label-floating has-roxo">
                        <label class="control-label">Telefone Celular</label>
                        <input name="escolaridade" type="text" class="form-control error" 
                               value="{{ $solicitante->telefone->numero or old('numero') }}">
                     </div>
                  </div>
               </div>
            </div> {{-- FIM DIV Contato --}}
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