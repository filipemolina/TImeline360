//////////////////// Funções Principais

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
        }


    }, //Fim showSwal1

    

}; //Fim Helper

    
$(function(){
    
    // Mascarás
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
        $.get('/solicitacoes/minhas/'+id_usuario, function(resultado){
            if (resultado == "0")
                demo.notificationRight("top", "right", "rose", "Você ainda não possui Solicitações cadastradas!");   
            else
                window.location.href='/minhassolicitacoes';
        })
    })
    
    // Botão Excluir, ocultar coment-fix, exibir comentario com horário da "exclusão", demonstrar botão desfazer e oculstar botões editar e excluir
    $('.btn-coment-del').click(function () {

        var isto = this;
        var text = $(this).parent().parent().parent().parent().find('div.coment-fix p').show('p');

        event.preventDefault();

        swal({
                type: 'warning',
                title: 'Remover o comentário abaixo?',
                html: text,
                buttonsStyling: false,
                showCancelButton: true,
                cancelButtonClass: 'btn btn-roxo',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Remover',
                confirmButtonClass: 'btn btn-danger'
            }).then(function () {
                swal({
                    type: 'success',
                    title: 'Sucesso!',
                    text: 'Seu comentário foi removido',
                    
                }),
                
                $(isto).parent().parent().find('a.btn-coment-des').removeClass('hide');
                $(isto).parent().parent().find('a.btn-coment-edit').addClass('hide');
                $(isto).parent().parent().find('a.btn-coment-del').addClass('hide');
                $(isto).parent().parent().parent().parent().find('.coment-fix').addClass('hide');
                $(isto).parent().parent().parent().parent().find('.coment-edit').addClass('hide');
                $(isto).parent().parent().parent().parent().find('.coment-fix-rem').removeClass('hide');

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

    // $('.btn-desapoiar').click(function(){
        
    //     event.preventDefault();

    //     $(this).removeClass('apoiar btn-desapoiar').addClass('desapoiar btn-apoiar')
    // });

    // Remover classe card-hidden
    $().ready(function() {
        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });

    // Adicionar efeito de rotação ao ícone do objeto
-
-   $('.rodar-icone')
        
        .click(function(){
            var isto = this;
            
            if($(isto).find('i').hasClass('animated girar-rev')) {
                $(isto).find('i').removeClass('girar-rev').addClass('girar')
            } else if ($(isto).find('i').hasClass('animated girar')) {
                $(isto).find('i').removeClass('girar').addClass('girar-rev')
            }else {
                $(isto).find('i').addClass('animated girar')
            }
        })
});