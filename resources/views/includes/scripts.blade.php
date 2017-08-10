<script>
$(function(){
	
	// Adicionar efeito de rotação ao ícone do objeto

	$('.rodar_icone')
	.mouseover(function(){
		$(this).find('i').addClass('animated girar')
	})
	.mouseout(function(){
		$(this).find('i').removeClass('animated girar')
	});

	// Trocar o tipo de acesso

	$('.troca-login-municipe').click(function(){
		$('body').removeClass('fundo_roxo').addClass('fundo_dourado')
		$('.navbar-header a.btn-roxo').addClass('animated fadeOutUp').fadeOut()
		$('.navbar-header a.btn-dourado').removeClass('hide fadeOutUp').addClass('animated fadeInDown').fadeIn()
		$('.navbar-collapse a.btn-roxo').addClass('animated fadeOutUp').removeClass('fadeInDown')
		$('#login-municipe').removeClass('animated fadeInDown').addClass('animated fadeOutUp').fadeOut()
		$(function e() { setTimeout(function(){$('#login-servidor').fadeIn().addClass('animated fadeInDown').removeClass('fadeOutUp')}, 1000) })
	
	});

	$('.troca-login-servidor').click(function(){
		$('body').removeClass('fundo_dourado').addClass('fundo_roxo')
		$('.navbar-header a.btn-dourado').addClass('animated fadeOutUp').fadeOut()
		$('.navbar-header a.btn-roxo').removeClass('hide fadeOutUp').addClass('animated fadeInDown').fadeIn()
		$('.navbar-collapse a.btn-roxo').addClass('animated fadeInDown').removeClass('fadeOutUp')
		$('#login-servidor').removeClass('animated fadeInDown').addClass('animated fadeOutUp').fadeOut()
		$(function e() { setTimeout(function(){$('#login-municipe').fadeIn().addClass('animated fadeInDown').removeClass('fadeOutUp')}, 1000) })
	
	});

	$('.slide-coment').click(function(){
		event.preventDefault();
   		$(this).parent().parent().parent().find('.colapso').slideToggle();
   		console.log('teste teste')
	});

	$('.apoiar').click(function(){
		event.preventDefault();
		if ($(this).hasClass('btn-primary')){
			$(this).removeClass('btn-primary')
		} else {
			$(this).addClass('btn-primary')
		}
	})

	
	$().ready(function() {

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

        VMasker ($("#cpf")).maskPattern("999.999.999-99");

        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });

});
</script>