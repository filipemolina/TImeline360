@extends('layouts.material')

@section('content')

	<div class="container">
		<div class="row cartao-principal">
			<div class="col-md-4 col-sm-4 col-md-offset-4 col-sm-offset-4" style="margin-top: 50px; margin-bottom: 40px;" >
				<form class="form" method="post" action="{{ url("salva") }}">
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
									<input  name="id" type="hidden" value="{{ $usuario->id }}">	

			                	<span class="input-group-addon">
				                        <i class="material-icons">lock_outline</i>
			                	</span>
				            <div class="form-group label-floating has-roxo">
				                <label class="control-label">Senha Atual</label>
				                <input  name="password_atual" type="password" class="form-control error">
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
					</div>
					<div class="footer text-center" style="">
						<a href="javascript:history.back()" class="btn btn-roxo btn-wd btn-lg"
									style="border-radius: 30px;">Cancelar
						</a>
						<button type="submit" class="btn btn-roxo btn-wd btn-lg" 
								style=" border-radius: 30px;"> &nbsp; Salvar &nbsp;  &nbsp;
						</button>
					</div>
				</form>
			</div> {{-- FIM DIV Pessoal --}}
		</div>
	</div>
@endsection




@push('scripts')
	<script type="text/javascript">
		$(document).ready(function() {
			var tempo = 0;
			var incremento = 500;
			
			// Testar se há algum erro, e mostrar a notificação
			@if ($errors->any())
				@foreach ($errors->all() as $error)
					setTimeout(function(){demo.notificationRight("top", "right", "rose", "{{ $error }}"); }, tempo);
					tempo += incremento;
				@endforeach
			@endif
			demo.initFormExtendedDatetimepickers();
			});
	</script>
@endpush

