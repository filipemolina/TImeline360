// Esse é o document.ready

$(function() {

	console.log("aqui esteve");
   
   @if (session('sucesso_alteracao_senha'))
      setTimeout(function(){demo.notificationRight("top", "right", "green", "Senha alterada com sucesso"); }, tempo);
   @endif
       

});
