//////////////////////////// Variáveis

// Existem algumas variáveis que estão sendo definidas no template layouts/material.blade.php
// Sâo elas:
// id_usuario
// foto_usuario
// nome_usuario
// url_base
// token

let tempo = 0;
let incremento = 500;

///////////////////////////// Funções Principais

// Mostra o mapa

function mostraMapa(latitude,longitude,solicitacao) {
   //console.log(latitude, longitude);
   if ($("#LocalMapa_"+solicitacao).css('height') == "0px")
   {
      $("#LocalMapa_"+solicitacao).css('height', "300px"); 

      // Esperar 200ms para executar o mapa (o tempo que o mapa demora para abrir)

      setTimeout(function(){

         var mapProp = {center:new google.maps.LatLng(latitude, longitude),zoom:18};
         var map     = new google.maps.Map(document.getElementById('LocalMapa_'+solicitacao),mapProp);

         let marker = new google.maps.Marker({
            map: map,
            animation: google.maps.Animation.DROP,
            position: map.getCenter()
         });

      },200);

   }else{
      $("#LocalMapa_"+solicitacao).css('height',"0");
   }
}

// Botão de Enviar Comentário

function enviarComentario(elem, e){

   // Executar essa função apenas se a tecla pressionada for o Enter ou caso nenhuma tecla tenha
   // sido pressionada (click)

   if(e.keyCode == "13" || typeof e.keyCode === 'undefined'){

      let solicitacao = $(elem).data('solicitacao');
      let solicitante = $(elem).data('solicitante');

      var comentario = $(".comentario_"+solicitacao).val().trim();

      // Testar se a comentario está em branco
      if( $(".comentario_"+solicitacao).val().trim() ) {

          // Enviar a comentario para o banco
          $.post(
           url_base+"/comentario",
           {
            comentario: comentario,
            solicitacao_id: solicitacao, 
            _token: token,
         }, function(data){

                  // Apagar o campo de envio de comentario
                  $(".comentario_"+solicitacao).val("");

                  // Colocar o novo card de comentarios embaixo da solicitação
                  var source      = $("#comentario-template").html();
                  var template    = Handlebars.compile(source)

                  var context = { 
                     nome:       nome_usuario,
                     comentario: comentario, 
                     foto:       foto_usuario,
                     id:         data,
                     token:      token,
                  };

                  var html        = template(context);

                  $("div.comentarios").append( $(html) );
                  //console.log(html);   

               }       
               );
       }

    }

 }

 // Enviar apoio

 function enviaApoio(solicitacao, solicitante){ 
   console.log("enviou " +solicitacao +" - " +solicitante);

   $.post(
      url_base+"/apoiar",
      {
         solicitante_id: solicitante,
         solicitacao_id: solicitacao, 
         _token: token,
      }, function(data){      

         $("span.numero_apoios_"+solicitacao).html(data);

         if(data > 0)
         {
            $(".btn_apoios_"+solicitacao).addClass('apoiar');
         }
         else
         {  
            $(".btn_apoios_"+solicitacao).removeClass('apoiar');
         }

         // Testar se o botão de apoiar dessa solicitação possui uma span com a classe apoiado
         // o que indica se o usuário já apoiou essa solicitação ou não

         let span = "button.btn-apoiar.solicitacao_"+solicitacao+" span.texto_apoio";

         if($(span).hasClass('apoiado')){

            // Caso já tenha apoiado
            $(span).removeClass('apoiado').html('Apoiar');

         } else {

            // Caso contrário
            $(span).addClass('apoiado').html('Apoiado');
         }
      }       
      );
};

// Não está sendo usada agora, será utilizada quando as páginas da pesquisa forem carregadas via AJAX

function montaCartoes(solicitacoes){

   $("div.infinite-scroll").empty();

   // TODO: Mostrar imagem de loading

   let token = token;
   
   $.post(url_base+"/batchsolicitacoes", { _token: token, solicitacoes: solicitacoes }, function(data){

      data = JSON.parse(data);

      // Colocar o novo card de comentarios embaixo da solicitação
      var source      = $("#cartao-template").html();
      var template    = Handlebars.compile(source)

      for(let i =0; i < data.length; i++){

         var context = { 
            nome:  data[i].solicitante.nome,
            texto: data[i].conteudo, 
            foto:  data[i].foto
         };

         var html = template(context);

         $("div.infinite-scroll").append( $(html) );

      }

      // TODO: Apagar imagem de Loading

   });

}

// Sweet Alert
var helper = {

    // Como usuar no html:
    // helper.showSwal1('tipo', 'titulo')
    // helper.showSwal2('tipo', 'texto1', 'texto2','texto1Sucesso', 'texto2Sucesso', 'funcaoSucesso')
    
    showSwal1: function(tipo, texto1) {
        
        if(tipo == 'basico'){
            swal({
                title: texto1,
                buttonsStyling: false,
                confirmButtonClass: 'btn btn-roxo'
            });
        } else if (tipo == 'info') {
            swal({
                type: 'info',
                title: texto1,
                buttonsStyling: false,
                confirmButtonClass: "btn btn-info"
            });
        } else if (tipo == 'aviso') {
            swal({
                type: 'warning',
                title: texto1,
                input: 'text',
                buttonsStyling: false,
                showCancelButton: true,
                cancelButtonClass: 'btn btn-roxo',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Alterar',
                confirmButtonClass: 'btn btn-danger'
            });
        } else if (tipo == "erro") {

            swal("Atenção", texto1, 'error');

        }


    }, //Fim showSwal1

    

}; //Fim Helper

    
$(function(){

   // Criar publicação apenas logado
   $(".helper-criaPub").click(function(){
       event.preventDefault();
       helper.showSwal1('info','Efetue o login para criar uma publicação')
   })
    
    
    // Mascaras
    VMasker ($("#cpf")).maskPattern("999.999.999-99");
    VMasker ($(".datepicker")).maskPattern("99/99/9999");

    // Apoiar publicação apenas logado
    $(".helper-apoio").click(function(){
        event.preventDefault();

        helper.showSwal1('info','Efetue o login para apoiar a publicação')

    })    
    
    // Botão editar, ocultar coment-fix e exibir coment-edit
    $('.btn-coment-edit').click(function() {
        
        event.preventDefault();

        $(this).parent().parent().parent().parent().find('.coment-fix').addClass('hide').parent().find('.coment-edit').removeClass('hide')

    })

    $('.minhas_solicitacoes').click(function(e) {
        e.preventDefault();
        $.get(url_base+'/solicitacoes/minhas/'+id_usuario, function(resultado){
            if (resultado == "0")
                demo.notificationRight("top", "right", "rose", "Você ainda não possui Solicitações cadastradas!");   
            else
                window.location.href='/minhassolicitacoes';
        })
    })
    
    // Botão Excluir, ocultar coment-fix, exibir comentario com horário da "exclusão", demonstrar botão desfazer e oculstar botões editar e excluir
    $('.infinite-scroll').on('click', ".btn-coment-del", function () {

        var isto = this;
        var text = $(this).parent().parent().parent().parent().find('div.coment-fix p').show('p');

        event.preventDefault();

        swal({
                type: 'warning',
                title: 'Remover o comentário?',
                html: text,
                buttonsStyling: false,
                showCancelButton: true,
                cancelButtonClass: 'btn btn-roxo',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Remover',
                confirmButtonClass: 'btn btn-danger'
            }).then(function () {
                let id = $(isto).data('id');
                let token = $(isto).data('token');

                $.post(url_base+'/comentario/' + id , {

                   _token: token,
                   _method: 'DELETE' 

                }, function(data){

                    if(data == "0"){

                        // Mostrar a mensagem de erro
                        swal({
                            type: 'error',
                            title: 'Comentário nao removido!',
                            text: 'Seu comentário não pôde ser removido pois já foi respondido pela prefeitura.',
                        });

                    } else {
                        // Deletar a div do comentário
                        $('.comentario_'+id).remove();

                        // Mostrar a mensagem de sucesso
                        swal({
                            type: 'success',
                            title: 'Sucesso!',
                            text: 'Seu comentário foi removido',
                        });
                    }

                });
            }, function (dismiss) {
                if (dismiss === 'cancel') {
                swal({
                    type: 'error',
                    title: 'Cancelado!',
                    html: 'Seu comentário não foi removido',
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-roxo'
                })
            }


            });

    })

    //Botão desfazer, exibir coment-fix, ocultar botão desfazer, demonstrar botões editar e excluir
    $('.btn-coment-des').click(function () {

        event.preventDefault();

        $(this).addClass('hide')
        $(this).parent().parent().find('a.btn-coment-edit').removeClass('hide');
        $(this).parent().parent().find('a.btn-coment-del').removeClass('hide');
        $(this).parent().parent().parent().parent().find('.coment-fix-rem').addClass('hide');
        $(this).parent().parent().parent().parent().find('.coment-fix').removeClass('hide');

    })

    // Enviar alteração, ocultar coment-edit e exibir coment-fix
    $('.btn-coment-alterar').click(function() {
        
        $(this).parent().parent().addClass('hide').parent().find('.coment-fix').removeClass('hide').find('span.label').removeClass('hide')
    })

    // Ocultar coment-edit e exibir coment-fix
    $('.coment-desfazer').click(function() {
        
        event.preventDefault();

        $(this).parent().parent().addClass('hide').parent().find('.coment-fix').removeClass('hide')

    })

    // Deslizar comentários
    $('div.infinite-scroll').on("click", ".slide-coment", function(){
        event.preventDefault();
        $(this).parent().parent().parent().find('.colapso').slideToggle();
    });

    
    // Alterar cor do botão apoiar
    $('div.infinite-scroll').on("click", ".btn-apoiar", function(){
        
        event.preventDefault();

        if ($(this).hasClass('apoiar')){

            $(this).removeClass('apoiar')

        } else {

            $(this).addClass('apoiar')
        }
        
    });

    // Remover classe card-hidden
    setTimeout(function() {
        // after 1000 ms we add the class animated to the login/register card
        $('.card').removeClass('card-hidden');
    }, 700)

    // Adicionar efeito de rotação ao ícone do objeto

    $('.rodar-icone')
        
        .click(function(){
            var isto = this;
            
            if($(isto).find('i').hasClass('animated girar-rev')) {
                $(isto).find('i').removeClass('girar-rev').addClass('girar')
            } else if ($(isto).find('i').hasClass('animated girar')) {
                $(isto).find('i').removeClass('girar').addClass('girar-rev')
            }else {
                $(isto).find('i').addClass('animated girar')
            }
    });

    // Ativar o Infinite Escrôu
    // Deve ser executado apenas se eu estiver na página inicial

    if(window.location.href == url_base+"/")
    {

        $('ul.pagination').hide();
        $('.infinite-scroll').jscroll({
           autoTrigger: true,
           prefill: false,
           scrollThreshold: 0,
           debug: false,
           loadingHtml: '<div style="text-align:center; position: relative;"><div style="position: absolute; width: 100%; top: 88px; color: #fff; font-weight: bold; font-size: 18px;">Carregando</div><img class="center-block" src="/img/DoubleRing.gif" alt="Carregando..." /></div>',
           padding: 0,
           nextSelector: '.pagination li.active + li a',
           contentSelector: 'div.infinite-scroll',
           callback: function() {
               $('ul.pagination').remove();
           }
        });

    }

    // Enviar Comentários

   // Caso o evento seja acionado via "click" no botão de enviar comentário, obter as informações
   // pelas propriedades data do próprio elemento.

    $(".infinite-scroll").on('click', "button.enviar-comentario", function(e){

      // Chamar a função que faz a chamada Ajax
      enviarComentario(this, e);

    });

    // Caso o evento seja acionado pela tecla Enter no input, obter as informações através do botãok
    $(".infinite-scroll").on('keyup', "input.comentario", function(e){

      // Chamar a função que faz a chamada Ajax apenas se a tecla pressionada for Enter
      enviarComentario(this, e);

    });

    // Deletar solicitações

    $(".infinite-scroll").on("click", "a.btn-card-del", function(e){

        // Obter o id da solicitação à ser excluída
        let id = $(this).data('solicitacao');

        $.post(url_base + "/solicitacao/"+id, { 
            _token: token, 
            _method: "DELETE" 
        }, function(data){

            // Caso a solicitação tenha sido deletada no banco
            if(data == "1"){

                $("#solicitacao_card_"+id).remove();

                helper.showSwal1("info", "Solicitação excluída!");

            } else {

                helper.showSwal1("erro", data);

            }

        });

    });

   // Não me pergunte

   demo.initFormExtendedDatetimepickers();

});

