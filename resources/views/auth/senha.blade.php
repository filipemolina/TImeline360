@extends('layouts.material')

@section('content')

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4" style="margin-top: 50px; margin-bottom: 50px;" >
				<form class="form" method="post" action="{{ url("solicitante/$solicitante->id") }}">
					{!! method_field('PUT') !!}

					{{ csrf_field() }}

					<div id="login-municipe" class="card card-login card-hidden">
						<div class="card-header card-header-icon" data-background-color="rose">
							<i class="material-icons">security</i>
						</div>


						<div class="card-content">
							<h4 class="card-title">SEGURANÇA</h4>
						</div>


					<div class="card-content">

					<div class="input-group">
			                <span class="input-group-addon">
			                        <i class="material-icons">lock_outline</i>
			                </span>
			            <div class="form-group label-floating has-roxo">
			                <label class="control-label">Senha Atual</label>
			                <input  name="password" type="password" class="form-control error">
			            </div>
                	</div>


					<div class="input-group">
			                <span class="input-group-addon">
			                        <i class="material-icons">lock_outline</i>
			                </span>
			            <div class="form-group label-floating has-roxo">
			                <label class="control-label">Nova Senha</label>
			                <input  name="password" type="password" class="form-control error">
			            </div>
                	</div>
                
	                <div class="input-group">
		                    <span class="input-group-addon">
		                        <i class="material-icons">lock_outline</i>
		                    </span>
	                    <div class="form-group label-floating has-roxo">
	                        <label class="control-label">Confirmar Nova Senha</label>
	                        <input  name="password_confirmation" type="password" class="form-control error">
	                    </div>
	                </div>


					
					</div>
							
													
							{{-- <div class="input-group">
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
							</div> --}}

						</div>
					</div> {{-- FIM DIV Pessoal --}}
				</div>

				<div class="footer text-center" style="">
						<button type="submit" class="btn btn-roxo btn-wd btn-lg" style=" border-radius: 30px;">Salvar</button>
				</div>



@endsection

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