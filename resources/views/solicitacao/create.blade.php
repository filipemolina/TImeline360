@extends('layouts.material')

@section('titulo')

@endsection

@section('content')

<div class="row">
   <div class="col-sm-8 col-sm-offset-2">
      <!--      Wizard container        -->
      <div class="wizard-container">
         <div class="card wizard-card active" data-color="rose" id="wizardProfile">
            <form action="" method="">
               <div class="wizard-header">
                  <h3 class="wizard-title">
                     Crie sua solicitação
                  </h3>
               </div>

               {{-- Menus --}}
               <div class="wizard-navigation">
                  <ul>
                     <li class="wizard">
                        <a href="#categoria" data-toggle="tab">Categoria</a>
                     </li>

                     <li class="wizard">
                        <a href="#foto" data-toggle="tab">Descrição</a>
                     </li>

                     <li class="wizard">
                        <a href="#local" data-toggle="tab">Local</a>
                     </li>
                  </ul>
               </div>

               {{-- Conteúdo dos Menus --}}
               <div class="tab-content no-padding">

                  {{-- Primeiro menu --}}
                  <div class="tab-pane" id="categoria">
                     <div class="row">
                        <div class="form-group label-floating">
                           <h4 class="info-text no-margin"> Escolha a categoria da sua solicitação</h4>
                        </div>

                        {{-- Categoria selecionada --}}
                        <figure class="highlight pq col-md-8 col-md-offset-2">

                           {{-- Ícone da categoria --}}
                           <div class="input-group form-group">
                              <div class="form-group label-floating" >
                                 <select class="js-example-data-array" data-live-search="true" style="width: 550px;"> 
                                    <option value="" selected>Selecione uma opção</option>
                                    @foreach($setores as $setor)
                                       <optgroup label="{{ $setor->nome }}">
                                          @foreach($setor->servicos as $servico)
                                             <option value="{{$servico->id}}">{{$servico->nome}}</option>  
                                          @endforeach
                                       </optgroup>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </figure>

{{-- Botões das categorias --}}
{{-- <div class="col-md-12">

@foreach($setores as $setor)

<div class="col-md-3 container-btn no-pa">
<div class="dropdown">
<button href="#" class="btn btn-just-icon btn-round dropdown-toggle" style="background-color: {{ $setor->cor }};" data-toggle="dropdown" aria-expanded="true" rel="tooltip" >
<i class="mdi {{ $setor->icone }}"></i>
</button>                                               

<ul class="dropdown-menu">

@foreach($setor->servicos as $servico)

<li><a class="previnir" href="#">{{ $servico->nome }}</a></li>

@endforeach

</ul>
</div>

<p> {{ $setor->nome }} </p>
</div>

@endforeach

</div> --}}
</div>
</div>

{{-- Segundo menu --}}
<div class="tab-pane" id="foto">
<div class="row">
<div class="fileinput fileinput-new text-center col-md-5 col-md-offset-1" data-provides="fileinput">
<h4 class="info-text"> Envie a foto </h4>
<div class="fileinput-new thumbnail">
<img src="{{asset ('/img/image_placeholder.jpg')}}" alt="...">
</div>

<div class="fileinput-preview fileinput-exists thumbnail"></div>
<div>
<span class="btn btn-rose btn-round btn-file">
<span class="fileinput-new">Selecione uma foto</span>
<span class="fileinput-exists">Atelrar</span>
<input name="firstname" type="file" name="..." />
</span>
{{-- <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a> --}}
</div>
</div>

<div class="col-md-5">
<h4 class="info-text"> Descreva a solicitação </h4>
<textarea name="lastname" class="form-control" placeholder="Clique aqui para digitar" rows="9"></textarea>
</div>
</div>
</div>

{{-- Terceiro menu --}}
<div class="tab-pane" id="local">
<div class="row">
<div class="col-sm-12">
<h4 class="info-text"> Informe o local</h4>
</div>

<div class="mapa"></div>
</div>
</div>
</div>

<div class="wizard-footer">
<div class="pull-right">
<input type='button' class='btn btn-next btn-fill btn-rose btn-wd' name='next' value='Next' />
<input type='button' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' />
</div>

<div class="pull-left">
<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
</div>

<div class="clearfix"></div>
</div>
</form>
</div>
</div> <!-- wizard container -->
</div>
</div> {{-- FIM ROW --}}

@endsection

@push('scripts')

<script type="text/javascript">


  $().ready(function() {

   

    var data = $.map(JSON.parse('{!! $setores->toJson() !!}') , function (obj) {
      return {
         
         id: obj.id,
         text: obj.servicos,
         children: obj.nome,
     };
  });

    console.log(data);

    $(".js-example-data-array").select2({
      placeholder: 'Selecione uma opção',
      allowClear: true,
      
      language: "pt-BR",
      debug: true,

      /*data: [{
               text: "group",
               "id": 1,
               
                  children: [{
                     "text": "Test 2",
                     "id": "2"
                  }, {
                     "text": "Test 3",
                     "id": "3",
                     "selected": true
                  }]
            }]*/
            
   });

    demo.initMaterialWizard();
 });
</script>



@endpush

{{-- 


   console.log(JSON.parse('

   [{"id":1,
      "nome":"Ilumina\u00e7\u00e3o P\u00fablica",
      "icone":"mdi-ceiling-light",
      "cor":"#6495ED",
      "secretaria_id":11,
      "created_at":null,
      "updated_at":null,
      "servicos":[{"id":1,
                  "nome":"TROCA DE L\u00c2MPADAS ( ILUMINA\u00c7\u00c3O P\u00daBLICA)",
                  "setor_id":1,
                  "deleted_at":null,
                  "created_at":null,
                  "updated_at":null},

                  {"id":2,
                  "nome":"NOVO PONTO DE ILUMINA\u00c7\u00c3O P\u00daBLICA",
                  "setor_id":1,
                  "deleted_at":null,
                  "created_at":null,
                  "updated_at":null},

                  {"id":3,
                  "nome":"MANUTEN\u00c7\u00c3O DO PONTO DE ILUMINA\u00c7\u00c3O P\u00daBLICA",
                  "setor_id":1,
                  "deleted_at":null,
                  "created_at":null,
                  "updated_at":null}]}








   ,{"id":2,"nome":"Asfaltamento","icone":"mdi-road-variant","cor":"#0000CD","secretaria_id":11,"created_at":null,"updated_at":null,"servicos":[{"id":4,"nome":"BURACOS NA RUA (PAVIMENTA\u00c7\u00c3O)","setor_id":2,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":3,"nome":"Esgoto","icone":"mdi-pipe-disconnected","cor":"#6495ED","secretaria_id":11,"created_at":null,"updated_at":null,"servicos":[{"id":5,"nome":"MANUTEN\u00c7\u00c3O DE ESGOTO","setor_id":3,"deleted_at":null,"created_at":null,"updated_at":null},{"id":6,"nome":"MANUTEN\u00c7\u00c3O DE BUEIROS","setor_id":3,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":4,"nome":"Limpeza Urbana","icone":"mdi-delete","cor":"#696969","secretaria_id":11,"created_at":null,"updated_at":null,"servicos":[{"id":7,"nome":"RETIRADA DE ENTULHOS","setor_id":4,"deleted_at":null,"created_at":null,"updated_at":null},{"id":8,"nome":"COLETA DE LIXO","setor_id":4,"deleted_at":null,"created_at":null,"updated_at":null},{"id":9,"nome":"LIMPEZA URBANA","setor_id":4,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":5,"nome":"Patrim\u00f4nio P\u00fablico","icone":"mdi-city","cor":"#8A2BE2","secretaria_id":11,"created_at":null,"updated_at":null,"servicos":[{"id":10,"nome":"CONSERVA\u00c7\u00c3O","setor_id":5,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":6,"nome":"Tr\u00e2nsito","icone":"mdi-car","cor":"#00CED1","secretaria_id":15,"created_at":null,"updated_at":null,"servicos":[{"id":11,"nome":"DEN\u00daNCIA DE TR\u00c2NSITO","setor_id":6,"deleted_at":null,"created_at":null,"updated_at":null},{"id":12,"nome":"SOLICITA\u00c7\u00c3O DE REDUTOR DE VELOCIDADE","setor_id":6,"deleted_at":null,"created_at":null,"updated_at":null},{"id":13,"nome":"SOLICITA\u00c7\u00c3O DE AGENTE DE TR\u00c2NSITO","setor_id":6,"deleted_at":null,"created_at":null,"updated_at":null},{"id":14,"nome":"SOLITA\u00c7\u00c3O DE REBOQUE","setor_id":6,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":7,"nome":"Sem\u00e1foro","icone":"mdi-traffic-light","cor":"#FFA500","secretaria_id":15,"created_at":null,"updated_at":null,"servicos":[{"id":15,"nome":"MANUTEN\u00c7\u00c3O DE SEM\u00c1FORO","setor_id":7,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":8,"nome":"Estacionamento Irregular","icone":"mdi-car-side","cor":"#A0522D","secretaria_id":15,"created_at":null,"updated_at":null,"servicos":[{"id":16,"nome":"ESTACIONAMENTO IRREGULAR","setor_id":8,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":9,"nome":"Transporte P\u00fablico","icone":"mdi-bus-side","cor":"#FF00FF","secretaria_id":15,"created_at":null,"updated_at":null,"servicos":[{"id":17,"nome":"DEN\u00daNCIA TRANSPORTE P\u00daBLICO MUNICIPAL","setor_id":9,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":10,"nome":"Fiscaliza\u00e7\u00e3o","icone":"mdi-magnify","cor":"#A9A9A9","secretaria_id":19,"created_at":null,"updated_at":null,"servicos":[{"id":18,"nome":"FISCALIZA\u00c7\u00c3O DEFESA CIVIL","setor_id":10,"deleted_at":null,"created_at":null,"updated_at":null},{"id":19,"nome":"VISTORIA DE ESTRUTURA","setor_id":10,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":11,"nome":"Captura de Abelhas","icone":"mdi-bug","cor":"#FFD700","secretaria_id":19,"created_at":null,"updated_at":null,"servicos":[{"id":20,"nome":"CAPTURA DE ABELHA","setor_id":11,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":12,"nome":"Visita do Agente de Sa\u00fade","icone":"mdi-medical-bag","cor":"#FF0000","secretaria_id":12,"created_at":null,"updated_at":null,"servicos":[{"id":21,"nome":"VISITA DO AGENTE DE SA\u00daDE","setor_id":12,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":13,"nome":"Vigil\u00e2ncia Sanit\u00e1ria","icone":"mdi-food-fork-drink","cor":"#1E90FF","secretaria_id":12,"created_at":null,"updated_at":null,"servicos":[{"id":22,"nome":"FISCALIZA\u00c7\u00c3O VIGIL\u00c2NCIA SANIT\u00c1RIA","setor_id":13,"deleted_at":null,"created_at":null,"updated_at":null},{"id":23,"nome":"FISCALIZA\u00c7\u00c3O EPIDEMIOL\u00d3GI","setor_id":13,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":14,"nome":"Benef\u00edcios Sociais","icone":"mdi-security-home","cor":"#32CD32","secretaria_id":6,"created_at":null,"updated_at":null,"servicos":[{"id":24,"nome":"BENEF\u00cdCIOS SOCIAIS","setor_id":14,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":15,"nome":"Pessoas em Situa\u00e7\u00e3o de Risco","icone":"mdi-account-multiple","cor":"#CD853F","secretaria_id":6,"created_at":null,"updated_at":null,"servicos":[{"id":25,"nome":"ACOLHIMENTO DE PESSOAS EM SITUA\u00c7\u00c3O DE RISCO","setor_id":15,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":16,"nome":"Fiscaliza\u00e7\u00e3o Ambiental","icone":"mdi-nature-people","cor":"#228B22","secretaria_id":10,"created_at":null,"updated_at":null,"servicos":[{"id":26,"nome":"FISCALIZA\u00c7\u00c3O URBANISMO","setor_id":16,"deleted_at":null,"created_at":null,"updated_at":null},{"id":27,"nome":"FISCALIZA\u00c7\u00c3O AMBIENTAL\/POLUI\u00c7\u00c3O SONORA","setor_id":16,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":17,"nome":"Poda de \u00c1rvore","icone":"mdi-tree","cor":"#7CFC00","secretaria_id":10,"created_at":null,"updated_at":null,"servicos":[{"id":28,"nome":"PODA DE \u00c1RVORE","setor_id":17,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":18,"nome":"Den\u00fancias","icone":"mdi-bullhorn","cor":"#FF4500","secretaria_id":17,"created_at":null,"updated_at":null,"servicos":[{"id":29,"nome":"DEN\u00daNCIA SERVIDOR MUNICIPAL","setor_id":18,"deleted_at":null,"created_at":null,"updated_at":null},{"id":30,"nome":"DEN\u00daNCIA PRESTADORA DE SERVI\u00c7O","setor_id":18,"deleted_at":null,"created_at":null,"updated_at":null}]},{"id":19,"nome":"Guarda Municipal","icone":"mdi-security","cor":"#4169E1","secretaria_id":13,"created_at":null,"updated_at":null,"servicos":[{"id":31,"nome":"FISCALIZA\u00c7\u00c3O ORDEM P\u00daBLICA","setor_id":19,"deleted_at":null,"created_at":null,"updated_at":null},{"id":32,"nome":"GUARDA MUNICIPAL  ","setor_id":19,"deleted_at":null,"created_at":null,"updated_at":null},{"id":33,"nome":"POLICIAMENTO  ","setor_id":19,"deleted_at":null,"created_at":null,"updated_at":null}]}]');
 --}}