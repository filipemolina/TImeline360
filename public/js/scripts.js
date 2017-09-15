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

