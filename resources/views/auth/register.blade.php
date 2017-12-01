@extends('layouts.material')

@section('titulo')



@endsection

@section('content')

<div class="row">

    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3 login-page">
        <form class="form" method="POST" action="{{ route('user.store') }}">
        {{ csrf_field() }}

        {{-- DIV register-municipe --}}
        <div id="register-municipe" class="card card-login card-hidden">
            
            <div class="logo top logo-roxo pn"></div>
            <div class="card-header text-center" data-background-color="roxo">
                <div class="social-line"><br><br><br></div>
            </div>

            <div class="card-content">
                
                {{-- <div class="input-group">
                    <span class="input-group-addon texto-roxo">
                        <i>Use uma das redes sociais</i>
                    </span>
                </div>

                <div class="input-group social centro">
                    <a href="loginFacebook" class="btn btn-just-icon btn-round azul-face">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="loginFacebook" class="btn btn-just-icon btn-round vermelho-google">
                        <i class="fa fa-google"></i>
                    </a>
                </div>

                <div class="input-group">
                    <span class="input-group-addon texto-roxo">
                        <i>Ou preencha os dados abaixo:</i>
                    </span>
                </div> --}}

                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">face</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">Nome</label>
                        <input name="nome" type="text" class="form-control error" value="{{ old('nome') }}">
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">email</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">E-mail</label>
                            <input name="email" type="email" class="form-control error" value="{{ old('email') }}">
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">credit_card</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">CPF</label>
                            <input name="cpf" id="cpf" type="text" class="form-control error" value="{{ old('cpf') }}">
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock_outline</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">Senha</label>
                        <input  name="password" type="password" class="form-control error">
                    </div>
                </div>
                
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock_outline</i>
                    </span>
                    <div class="form-group label-floating has-roxo">
                        <label class="control-label">Confirmar Senha</label>
                        <input  name="password_confirmation" type="password" class="form-control error">
                    </div>
                </div>
                
                <div class="checkbox">
                    <label style="color: #3d276b;">
                        <input name="aceite" type="checkbox" name="optionsCheckboxes" >
                        Eu Concordo com os
                    </label>
                    <a class="helper-termo">termos e condições</a>.
                </div>
            </div>
            
            <div class="footer text-center">
                <button type="submit" class="btn btn-roxo btn-wd btn-lg">Enviar</button>
            </div>
        </div> {{-- FIM DIV register-municipe --}}
    
    </div>

</div> {{-- FIM ROW --}}
@endsection

@push('scripts')

    <script type="text/javascript">
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

            demo.checkFullPageBackgroundImage();
            
        });
    </script>

    {{-- Animação do card de login/registro --}}
    <script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
    });
    </script>

    <script type="text/javascript">
    $(".helper-termo").click(function() {
        swal({  buttonsStyling: false,
                showCloseButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonClass: 'btn btn-roxo',
                cancelButtonText: 'Fechar',
                title:"Termos de Uso",
                animation: false,
                html:
                $('<div class="termos"><p>Ao utilizar o <strong>Mesquita 360</strong>, o usuário adere aos termos aqui dispostos e concorda em se submeter integralmente às condições mencionadas a seguir.<p><p class="noIndent">1. Sobre o serviço</p><p>O <strong>Mesquita 360</strong> é um aplicativo voltada para a cidadania que tem como objetivo conectar cidadãos com a Prefeitura Municipal De Mesquita de maneira transparente e com foco na resolução de problemas, discussão de projetos e avaliação dos serviços públicos. A estrutura do <strong>Mesquita 360</strong> é formada por um ambiente de interação entre os usuários, via web e aplicativos para smartphones, e um segundo ambiente administrativo, na qual a Prefeitura Municipal De Mesquita gerencia as demandas dos cidadãos de forma prática e inteligente. </p><p class="noIndent">2. Definições</p><p>Para fins deste instrumento considera-se: </p><p><strong>a) Usuário: </strong> qualquer pessoa física que utilize as aplicações do <strong>Mesquita 360</strong>, tendo um perfil cadastrado (para interação), ou sem cadastro (apenas para consulta e visualização); </p><p><strong>b) Serviços Públicos: </strong> conjunto de atividades exercidas pelo Estado, direta ou indiretamente, em prol dos cidadãos e da coletividade. </p><p><strong>c) Plataforma: </strong> ambiente virtual do site <strong>Mesquita 360</strong> que viabiliza a utilização dos serviços oferecidos; </p><p><strong>d) Registro de publicação: </strong> procedimento completo de publicação de fiscalização, proposta ou avaliação pelo usuário do <strong>Mesquita 360</strong>, observado o cumprimento de todas as etapas do procedimento; </p><p><strong>e) Dados cadastrais: </strong> dados pessoais fornecidos pelos usuários para realização do cadastro (exemplo: nome completo, e-mail, CPF, senha, etc); </p><p><strong>f) Informação pública: </strong> informações não individualizadas e nem sigilosas, cuja divulgação seja possibilitada por meio do site <strong>Mesquita 360</strong> (imagens, relato da fiscalização, resposta do provedor dos serviços públicos, etc); </p><p><strong>g) Informação sigilosa: </strong> dados pessoais ou qualquer outra informação cujo caráter sigiloso derive da lei ou de decisões proferidas por órgão administrativo e/ou judicial. </p><p class="noIndent">3. Das modalidades de serviço</p><p>O <strong>Mesquita 360</strong> disponibiliza os seguintes serviços: </p><p>a) Registro de fiscalizações, propostas e avaliações pelos usuários em relação aos serviços públicos exercidos, direta ou indiretamente, pela Prefeitura Municipal De Mesquita, observadas as regras e definições contidas no <strong>Mesquita 360</strong>; </p><p>b) Visualização dos dados e informações coletados a partir das publicações registradas no <strong>Mesquita 360</strong> pelos usuários, com exceção de dados pessoais e sigilosos; </p><p class="noIndent">4. Da utilização do <strong>Mesquita 360</strong></p><p>O acesso ao <strong>Mesquita 360</strong> permite aos usuários devidamente cadastrados: </p><p>a) Registrar fiscalizações, propostas e avaliações direcionadas a Prefeitura Municipal De Mesquita, pela prestação de serviços públicos; </p><p>b) Acompanhar o andamento de suas fiscalizações, propostas e avaliações registradas; </p><p>c) Interagir com a secretaria responsável, direta ou indiretamente, pela prestação de serviços públicos, por meio de canal especialmente criado para que informações complementares possam ser inseridas, com objetivo de se obter uma resolução efetiva e eficaz da demanda apresentada; </p><p>d) Avaliar fiscalizações, propostas e avaliações de outros usuários da plataforma. </p><p class="noIndent">5. Das condições de utilização do <strong>Mesquita 360</strong></p><p>a) Todos os usuários cadastrados no <strong>Mesquita 360</strong> deverão ser pessoas físicas, identificadas nos termos da lei. </p><p>a.1) Perfis falsos serão excluídos. </p><p>b) Todas as publicações na plataforma devem, exclusivamente, visar a melhoria da cidade e serviços públicos. </p><p>b.1) Publicações serão excluídas caso não sigam as condições abaixo: </p><p>b.1.1) A imagem publicada deve ser uma foto tirada pelo usuário; </p><p>b.1.2) A imagem publicada deve estar relacionada à categoria da publicação; </p><p>b.1.3) O texto da publicação deve estar relacionado ao contexto proposto, a partir do provimento de informações relevantes sobre o tema; </p><p>b.1.4) A localização da publicação deve ser verídica; </p><p>b.2) Publicações inadequadas. </p><p>b.2.1) São consideradas publicações inadequadas aquelas que ferirem os termos de uso, bem como aqueles que possuam linguagem inapropriada, desrespeitosa, de cunho racista, preconceituoso, ilegal e imoral; </p><p>b.2.2) Publicações consideradas inadequadas são revisadas pela equipe do <strong>Mesquita 360</strong> e, caso não estejam de acordo com esses termos de uso, serão removidas; </p><p>c) O usuário do site não poderá: </p><p>c.1) Inserir na plataforma informações falsas e/ou errôneas; usar endereços de computadores, de rede ou de correio eletrônico falsos; empregar informações parcialmente ou inteiramente falsas, ou ainda informações cuja procedência não possa ser verificada; </p><p>c.2) Utilizar os serviços do <strong>Mesquita 360</strong> para fins diversos das finalidades do site; </p><p>c.3) Nos campos destinados ao preenchimento de textos, utilizar-se de termos ou materiais ilegais, agressivos, caluniosos, abusivos, difamatórios, obscenos, invasivos à privacidade de terceiros, que atentem contra os bons costumes, a moral ou ainda que contrariem a ordem pública; </p><p>c.4) Realizar cadastro ou publicação utilizando dados ou identificando-se como terceiro sem autorização deste último; </p><p>c.5) Inserir, nos campos de divulgação pública, informações pessoais ou outras quaisquer que, de algum modo, permitam a identificação de informações protegidas por sigilo; </p><p>c.6) Alterar, excluir e/ou corromper dados e informações do site com o simples intuito de dificultar ou obstruir o registro e/ou solução da demanda; </p><p>c.7) Difamar, abusar, assediar, perseguir, ameaçar ou violar quaisquer direitos individuais (como a privacidade dos usuários do sistema); </p><p>c.8) Promover, oferecer e/ou disseminar publicidade, oferta de produtos ou serviços de qualquer natureza; </p><p>d) São obrigações do usuário: </p><p>d.1) Providenciar o seu próprio acesso à Internet e pagar todas as taxas de Serviço eventualmente cobradas por terceiros com relação a tal acesso; </p><p>d.2) Providenciar seu próprio acesso a um endereço para envio de mensagens eletrônicas via Internet e pagar todas as taxas de Serviço eventualmente cobradas por terceiros com relação a tal acesso; </p><p>d.3) Providenciar todo o equipamento necessário para efetuar sua conexão à Internet, incluindo, mas não se limitando, a um computador e um modem; </p><p>d.4) Efetuar seu próprio cadastro no Site, responsabilizando-se pela correção e veracidade dos dados informados, assim como pela guarda de sua senha de acesso; </p><p>d.5) Manter o ambiente de seu computador seguro, com uso de ferramentas disponíveis como antivírus e firewall, entre outras, atualizadas, de modo a contribuir na prevenção de riscos eletrônicos do lado do usuário. </p><p>A prática de alguma das condutas indevidas, acima listadas, pode implicar o cancelamento da publicação e/ou do cadastro do usuário. </p><p class="noIndent">6. Utilização do Portal e de Seus Links</p><p>Em nenhuma hipótese seremos responsáveis pelo uso de nosso Site ou de acesso a links nele indicados, bem como por atos praticados por usuário que tenham por base informações obtidas nos links. Não nos responsabilizamos nem pelo conteúdo nem pelas políticas/práticas de privacidade dos portais que apontam para o nosso Site e daqueles para os quais apontamos. </p><p>O usuário assume toda e qualquer responsabilidade, de caráter civil e/ou criminal, pela utilização indevida das informações, textos, gráficos, marcas, obras, enfim, todo e qualquer direito de propriedade intelectual ou industrial deste Site. </p><p class="noIndent">7. Cadastro do Usuário, Senha e Segurança</p><p>Para que os USUÁRIOS possam desfrutar dos benefícios prestados pelo Site, objeto do presente termo, faz-se necessário o seu prévio cadastro no Site. </p><p>O USUÁRIO, neste Termo de Uso, concorda em: </p><p> (a) fornecer informações verdadeiras, exatas, atuais e completas sobre si mesmo quando do registro no formulário específico para acesso ao Site; </p><p> (b) conservar e atualizar imediatamente tais informações de Registro para mantê-las verdadeiras, exatas, atuais e completas. </p><p>O USUÁRIO deverá informar seu próprio endereço eletrônico (e-mail) a ser utilizado para sua identificação no Site https://360.mesquita.rj.gov.br/ e recebimento de mensagens advindas de seu cadastro no referido Site. O USUÁRIO deverá também criar uma senha, sendo inteiramente responsável pela confidencialidade da sua senha, bem como de qualquer atividade que ocorra no âmbito de seu cadastro. O USUÁRIO pode alterar sua senha a qualquer momento. Tanto o endereço eletrônico informado pelo USUÁRIO quanto à senha por ele criada serão utilizados para sua identificação e permissão de acesso ao Site. Usuários menores de 18 (dezoito anos) ou juridicamente incapazes precisam ser representados ou assistidos, conforme o caso, pelos seus pais ou responsáveis legais para realização cadastro e utilização do site. </p><p>As Informações da Conta do USUÁRIO são protegidas por senha para a sua segurança e privacidade. Em algumas áreas, usamos a criptografia SSL, o padrão da indústria, para proteger transmissões de dados. </p><p>O USUÁRIO concorda em notificar imediatamente o <strong>Mesquita 360</strong> sobre qualquer uso não-autorizado de seu login (identificação do USUÁRIO para acesso ao Site, mediante o preenchimento de seu endereço eletrônico pessoal e senha criada no Site) ou qualquer quebra de segurança de seu conhecimento. Concorda também em não deixar seu cadastro pessoal aberto no computador após entrar com seu endereço eletrônico e senha no Site, evitando, assim, o uso desautorizado por terceiros. </p><p>Faz parte de nossa política respeitar a privacidade de nossos USUÁRIOS. O Site não irá, portanto, monitorar, editar, acessar ou divulgar informações privativas de seus USUÁRIOS, sem autorização prévia, exceto nos casos expressamente previstos nos termos da Política de Privacidade ou a menos que sejamos obrigados a fazê-lo mediante ordem judicial ou por força de lei. </p><p>O USUÁRIO autoriza expressamente o site <strong>Mesquita 360</strong> a comunicar-se com o mesmo através de todos os canais de comunicação disponíveis, incluindo correio eletrônico (e-mail), Celular, SMS, entre outros, ficando ressaltado que a principal via de informação para o usuário é o Site. </p><p>A qualquer momento, poderá o USUÁRIO promover a exclusão de sua conta, juntamente com todos os seus dados cadastrais. </p><p class="noIndent">8. Modificações Destes Termos e Condições</p><p>O <strong>Mesquita 360</strong> se reserva ao direito de modificar a qualquer momento, visando uma melhoria contínua, o presente Termo e Condições de Uso, observando a comunicação ampla e prévia desta alteração aos usuários do serviço. </p><p class="noIndent">9. Disposições Gerais</p><p>A tolerância do eventual descumprimento de quaisquer das cláusulas e condições do presente contrato não constituirá novação das obrigações aqui estipuladas e tampouco impedirá ou inibirá a exigibilidade das mesmas a qualquer tempo. </p><p>O presente instrumento constitui o acordo integral entre as partes, prevalecendo sobre qualquer outro entendimento firmado anteriormente. </p><p>O presente termo vigorará por tempo indeterminado ou durante o período em que o sistema estiver disponível via internet. </p><p class="noIndent">10. Legislação Aplicável</p><p>O presente Termo de Uso é regido única e exclusivamente pelas leis da República Federativa do Brasil e qualquer discussão judicial que surja tendo por base sua interpretação ou aplicação deverá ser julgado por tribunais brasileiros. </p><p class="noIndent">11. Dúvidas</p><p>Caso tenha qualquer dúvida em relação ao presente documento, favor entrar em contato através do e-mail 360@mesquita.rj.gov.br com o site <strong>Mesquita 360</strong>. </p></div>'),
                    customClass: 'animated fadeIn',
        });
    });
    </script>

@endpush