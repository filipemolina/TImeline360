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
                     </div>
                  </div>

                  {{-- Segundo menu --}}
                  <div class="tab-pane" id="foto">
                     <div class="row">
                        <div class="fileinput fileinput-new text-center col-md-5 col-md-offset-1" data-provides="fileinput">
                           <h4 class="info-text"> Escolha uma foto </h4>
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
                        <div class="col-md-12">
                           <h4 class="info-text"> Indique no mapa o local de sua solicitação.</h4>
                        </div>
                     </div>

                     <div style="width: 100%">
                        <input id="pac-input" class="controls" type="text" placeholder="Search Box">
								<div id="map" style="width: 100%; height: 500px;"></div>
                     </div>
                  </div>
               </div>   

               <div class="wizard-footer">
                  <div class="pull-right">
                     <input type='button' class='btn btn-next btn-fill btn-rose btn-wd'   name='next'    value='Next' />
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
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcdW2PsrS1fbsXKmZ6P9Ii8zub5FDu3WQ&libraries=places&callback=initAutocomplete"></script>
   <script src="{{ asset("js/geoxml3/polys/geoxml3.js") }}" type="text/javascript"></script>
   <script src="{{ asset("js/marker-clusterer/src/markerclusterer.js") }}" type="text/javascript" charset="utf-8" async defer></script>

   <script type="text/javascript">

      $().ready(function() {

      	/////////////// Alimentar o combobox de seleção de serviços via vetor do PHP
         
         var data = $.map(JSON.parse('{!! $setores->toJson() !!}') , function (obj) {
            return {
            
               id: obj.id,
               text: obj.servicos,
               children: obj.nome,
            };
         });

         $(".js-example-data-array").select2({
            placeholder: 'Selecione uma opção',
            allowClear: true,
            language: "pt-BR",
            debug: true,
         });

         demo.initMaterialWizard();

         //////////// Mapa de seleção de localização
      });
   </script>

@endpush
