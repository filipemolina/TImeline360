@extends('layouts.material')

@section('content')

	<div class="container">
		<div class="row cartao-principal">
			<form class="form" method="post" action="{{ url("solicitante/$solicitante->id") }}">
				{!! method_field('PUT') !!}
				{{ csrf_field() }}

				<div class="col-md-6 col-sm-6 card-esquerdo" >
					<div id="login-municipe" class="card card-login card-hidden">
						<div class="card-header card-header-icon" data-background-color="rose">
							<i class="material-icons">person</i>
						</div>

						{{-- Avatar do usuário --}}
            		<div class="fileinput fileinput-new text-center foto-edit col-md-4 col-sm-4 tablet mobile" data-provides="fileinput">
                		<div class="fileinput-preview thumbnail img-circle card-header card-header-icon avatar-fixo pull-right" style="margin: 0px 10px 0px; bottom: 22px;">

                			@if($solicitante->foto)
                    			<img src="{{ $solicitante->foto }}"/>
                    		@elseif(old('foto'))
                    			<img src="{{ old('foto') }}"/>
                    		@else
                    			<img src="{{ asset('img/placeholder.jpg') }}"/>
                    		@endif
                		</div>
 

                		<input type="hidden" name="foto" value="{{ $solicitante->foto }}">

                    	<span class="btn btn-round btn-rose btn-file edit-foto">
                           <span class="fileinput-new">				Adicionar 	</span>
                           <span class="fileinput-exists">			Alterar		</span>
                           <input type="file" name="abacaxi">
                    	</span>
                               

                    	<a href="#pablo" class="btn btn-danger btn-round fileinput-exists exclui-foto" data-dismiss="fileinput"><i></i> Excluir<div class="ripple ripple-on ripple-out" style=" background-color: rgb(255, 255, 255);"></div></a>
            		</div>
           			{{-- Fim do Avatar do usuário --}}
						
						<div class="card-content">
							<h4 class="card-title">PESSOAL</h4>
						</div>

						<div class="card-content">
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">face</i>
								</span>
							
								<div class="form-group label-floating has-roxo col-md-10">
									<label class="control-label">Nome</label>
									<input name="nome" type="text" class="form-control error" 
									value="{{$solicitante->nome or old('nome')}}" autofocus>
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
										<option value=""> 	 </option>
										@foreach($sexos as $sexo)
											@if ( $solicitante->sexo == $sexo)
												<option value="{{$sexo}}" selected="selected">{{$sexo}}</option>
											@else
												<option value="{{$sexo}}">{{$sexo}}</option>  
											@endif
										@endforeach
									</select>
								</div>

								<span class="input-group-addon">
									<i class="material-icons">card_membership</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">Escolaridade</label>
									<select   name="escolaridade" id="escolaridade"  class="form-control form-control error">
										<option value="">  </option>
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
						</div>
					</div> {{-- FIM DIV Pessoal --}}
				</div>

{{-- ====================================================================================================== --}}
{{-- ====================================================================================================== --}}
{{-- ====================================================================================================== --}}
{{-- ====================================================================================================== --}}
{{-- ====================================================================================================== --}}



				<div class="col-md-6 col-sm-6 card-direito">
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
									<i class="material-icons">mail_outline</i>
								</span>


								<div class="form-group label-floating has-roxo">
									<label class="control-label">CEP</label>
									<input id="cep" name="endereco[cep]" type="text" class="form-control error" 
									value="{{ $solicitante->endereco->cep or old('endereco.cep') }}">
								</div>

								<span class="input-group-addon">
									<i class="material-icons">map</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">UF</label>
									<select   name="endereco[uf]" id="uf"  class="form-control form-control error">
										<option value=""  selected style="color: #ccc;"> --- </option>

										@foreach($ufs as $uf)
											@if ( $solicitante->endereco->uf == $uf)
												<option value="{{$uf}}" selected="selected">{{$uf}}</option>
											@else
												<option value="{{$uf}}">{{$uf}}</option>  
											@endif
										@endforeach
									</select>
								</div>
							</div>

						
							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">business</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">Municipio</label>
									<input id="cidade" name="endereco[municipio]"  type="text" class="form-control error" 
									value="{{ $solicitante->endereco->municipio or old('endereco.municipio') }}">
								</div>
							</div>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">explore</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">Bairro</label>
									<input id="bairro" name="endereco[bairro]" type="text" class="form-control error"  
									value="{{ $solicitante->endereco->bairro or  old('endereco.bairro') }}">
								</div>
							</div>


							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">call_split</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">Logradouro</label>
									<input id="rua" name="endereco[logradouro]" type="text" class="form-control error" 
									value="{{ $solicitante->endereco->logradouro or old('endereco.logradouro') }}">
								</div>
							</div>


							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">home</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">Numero</label>
									<input id="numero" name="endereco[numero]" type="text" class="form-control error" 
									value="{{ $solicitante->endereco->numero or old('endereco.numero') }}">
								</div>

								<span class="input-group-addon">
									<i class="material-icons">location_on</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">Complemento</label>
									<input name="endereco[complemento]" type="text" class="form-control error" 
									value="{{ $solicitante->endereco->complemento  or  old('endereco.complemento') }}">
								</div>
							</div>

							<div class="input-group">
								<span class="input-group-addon">
									<i class="material-icons">phone</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">Telefone Fixo</label>
									<input id="telefone_fixo" name="telefones[0][numero]" type="text" class="form-control error" 
									value="{{ $fixo or old('telefones.0.numero') }}">
									
									<input type="hidden" name="telefones[0][tipo_telefone]" value="Fixo">
								</div>

									<span class="input-group-addon">
									<i class="material-icons">stay_current_portrait</i>
								</span>
								<div class="form-group label-floating has-roxo">
									<label class="control-label">Telefone Celular</label>
									<input id="telefone_celular" name="telefones[1][numero]" type="text" class="form-control error" 
									value="{{ $celular or old('telefones.1.numero') }}">

									<input type="hidden" name="telefones[1][tipo_telefone]" value="Celular">
								</div>
							</div>
						</div>
					</div> {{-- FIM DIV Contato --}}
				</div>
				<div class="footer text-center" >
					<a href="javascript:history.back()" class="btn btn-roxo btn-wd btn-lg"
						style="border-radius: 30px;">Cancelar
					</a>
					<button 	type="submit" class="btn btn-roxo btn-wd btn-lg" 
								style="/*right: 300px; bottom: 25px; */border-radius: 30px;">  &nbsp; Salvar &nbsp;  &nbsp; 
					</button>
				</div>
			</form>
		</div>
	</div>

@endsection

						{{-- <a href="{{ URL::route('index') }}"
					  				class="btn btn-roxo btn-wd btn-lg" 
					  				style="right: 300px; bottom: 25px; border-radius: 30px;">Cancelar</a>
		  				</a>
 --}}


@push("scripts")
	{{-- Atualiza os campos do endereço de acordo com o cep digitado --}}
  	<script src="{{ asset("js/endereco.js") }}"></script>

	<!-- DateTimePicker Plugin -->
	<script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			VMasker ($("#cep")).maskPattern("99999-999");
			VMasker ($("#telefone_fixo")).maskPattern("(99) 9999-9999");
			VMasker ($("#telefone_celular")).maskPattern("(99) 99999-9999");


			//para adicionar a foto 
			$("body").on("change.bs.fileinput", function(e){ 
				var base64 = $(".fileinput-preview img").attr('src');
				$("input[name=foto]").val(base64);
		 	});



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
			demo.initFormExtendedDatetimepickers();
		});
	</script>

@endpush