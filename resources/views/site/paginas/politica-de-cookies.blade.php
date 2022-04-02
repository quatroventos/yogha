@extends('site.layouts.site')
@section('content')

    <!-- HEADER -->
    <header class="mb-50 d-none d-md-block" style="background-image: url(img/header/faq.png)">
        <div class="container h-100 pt-15">
            <div class="row mb-30">
                <div class="col">
                    <a href="{{URL::to('/')}}"><img class="img-m" src="img/logo-yogha-branco.svg"></a>
                </div>
                <div class="col align-items-end justify-content-center">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="texto-branco switch"><i class="icone-g uil uil-bars"></i></a>
                </div>
            </div>
            <div class="row mb-30 h-100 text-center texto-branco">
                <div class="col">
                    <h1 class="mb-15"><strong>POLÍTICA DE COOKIES</strong></h1>
                    {{--                    <h2 class="texto-fino texto-g">Acreditamos que é possível se sentir em casa seja onde estiver</h2>--}}
                </div>
            </div>
        </div>
    </header>

    <header class="mb-50 d-block d-md-none" style="background-image: url(img/header/faq.png)">
        <div class="container h-100 pt-15">
            <div class="row mb-30">
                <div class="col">
                    <a href="{{URL::to('/')}}"><img class="img-m" src="img/logo-yogha-branco.svg"></a>
                </div>
                <div class="col align-items-end justify-content-center">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="texto-branco switch"><i class="icone-g uil uil-bars"></i></a>
                </div>
            </div>
            <div class="row mb-30 h-100 text-center texto-branco">
                <div class="col">
                    <h1 class="mb-15"><strong>POLÍTICA DE COOKIES</strong></h1>
                    {{--                    <h2 class="texto-fino texto-g">Acreditamos que é possível se sentir em casa seja onde estiver</h2>--}}
                </div>
            </div>
        </div>
    </header>

    <!-- BLOCO --->
    <section class="text-left mb-50">
        <div class="container mb-10">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-8">
                    <div id="contentPoliticaCookies">

                        <p>Esta política de Cookies complementa os Termos de Uso e Política de Privacidade da <strong>YOGHA</strong>.</p>
                        <p>&nbsp;</p>
                        <ol>
                            <li><strong>O que é um cookie? </strong></li>
                        </ol>
                        <p>&nbsp;</p>
                        <p>Um cookie é um dado que o website solicita ao seu navegador para armazenar no seu computador ou dispositivo móvel. O cookie permite que o website “salve” informações que servem para identificar o visitante, para personalizar a página de acordo com o perfil do usuário ou para facilitar o transporte de dados entre as páginas de um mesmo <em>site</em>. Por exemplo, podemos coletar informações usando cookies, a fim de melhorar e otimizar a navegação no site.</p>
                        <ol>
                            <li><strong>Por que usamos cookies? </strong></li>
                        </ol>
                        <p><strong>&nbsp;</strong></p>
                        <p>Usamos cookies para:</p>
                        <p>&nbsp;</p>
                        <p>a) Permitir o acesso à Plataforma da <strong>YOGHA</strong>; às informações de reserva e aos Serviços de Pagamento.</p>
                        <p>b) Permitir, facilitar e agilizar o processo de funcionamento da Plataforma <strong>YOGHA</strong>.</p>
                        <p>c) Aprender como o usuário interage com a Plataforma <strong>YOGHA </strong>e para melhorar a experiência ao visitar o website.</p>
                        <p>d) Oferecer publicidade, anúncios de forma personalizada e vocacionada.</p>
                        <p>e) Melhorar o desempenho e eficácia dos anúncios da Plataforma <strong>YOGHA</strong>.</p>
                        <p>f) Executar os acordos legais que regem a Plataforma <strong>YOGHA</strong>.</p>
                        <p>g) Detectar e prevenir fraudes.</p>
                        <ol>
                            <li><strong>Como eu rejeito ou apago Cookies? </strong></li>
                        </ol>
                        <p><strong>&nbsp;</strong></p>
                        <p>A maioria dos navegadores da Internet aceita cookies, porém, é possível aos usuários configurarem seus dispositivos para recusar cookies ou certos tipos de cookies. Acesse a seção “ajuda” do seu navegador para saber mais sobre preferências de cookies e outras configurações de privacidade.</p>
                        <p>Na seção “ajuda”, o usuário pode “rejeitar, remover cookies ou limpar o armazenamento local” da Plataforma <strong>YOGHA</strong>, porém, algumas funções do website poderão não funcionar corretamente.</p>
                        <ol>
                            <li><strong>Quais os tipos de cookies que utilizamos?</strong></li>
                        </ol>
                        <p>&nbsp;</p>
                        <p><strong>(i) cookies de sessão</strong>: usualmente, expiram quando o navegador é fechado</p>
                        <p><strong>(ii) cookies persistentes</strong>: permanecem em seu dispositivo mesmo quando o navegador é fechado, de forma que o usuário pode usá-los novamente quando acessar a Plataforma <strong>YOGHA</strong>.</p>
                        <p><strong>Cookies Obrigatórios</strong></p>
                        <p>Usamos os cookies obrigatórios para realizar funções essenciais do site. Por exemplo, salvar suas preferências; melhorar o desempenho; direcionar o tráfego; detectar o tamanho da tela; determinar o tempo de carregamento da página; melhorar a experiência do usuário e medir a audiência. Esses cookies são necessários para que o nosso site funcione corretamente.</p>
                        <p><strong>Cookies de Análise </strong></p>
                        <p>Usamos os cookies do Google Analytics para nos ajudar a melhorar nosso site, coletando e relatando informações sobre como você o usa. Os cookies coletam informações de uma forma que não há identificação do usuário diretamente.</p>
                        <p><strong>Cookies de Mídias Sociais (cookies de terceiros)</strong></p>
                        <p>Usamos cookies de mídias sociais para mostrar anúncios e conteúdo com base nos perfis de redes sociais e na atividade em nossos sites. São usados para conectar sua atividade em nossos sites aos perfis de redes sociais para que os anúncios e o conteúdo visualizados em nossos sites e nas mídias sociais possam refletir melhor seus interesses.</p>
                        <p><strong>Publicidade (cookies de terceiros)</strong></p>
                        <p>Usamos cookies de publicidade e marketing para mostrar novos anúncios após registrar os anúncios que você já viu. Inclusive, são usados para rastrear os anúncios nos quais você clica por meio de compras que você faz após clicar em um anúncio, além de mostrar anúncios mais relevantes para você. Por exemplo, eles são usados para detectar quando você clica em um anúncio para mostrar anúncios com base em seus interesses nas mídias sociais e no histórico de navegação do site.</p></div>
            </div>
        </div>
        </div>
    </section>

@endsection
