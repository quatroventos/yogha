@extends('layouts.site')
@section('content')

<!-- ABA BUSCA -->
<section class="aba collapse" id="aba-busca">
    <div class="container">
        <div class="topo">
            <div class="row">
                <div class="col grow-0">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-busca" class="btn btn-2 btn-ico voltar switch"><i class="uil uil-angle-left"></i></a>
                </div>
                <div class="col">
                    <input type="text" class="d-flex" placeholder="Digite sua busca">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="#!" class="btn btn-primary d-flex">Me surpreenda!</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h2>Suas buscas recentes</h2>
                <div class="slider">
                    <ul>
                        <li><a href="" class="btn btn-3 btn-p">Florianópolis</a></li>
                        <li><a href="" class="btn btn-3 btn-p">Florianópolis</a></li>
                        <li><a href="" class="btn btn-3 btn-p">Florianópolis</a></li>
                        <li><a href="" class="btn btn-3 btn-p">Florianópolis</a></li>
                        <li><a href="" class="btn btn-3 btn-p">Florianópolis</a></li>
                        <li><a href="" class="btn btn-3 btn-p">Florianópolis</a></li>
                        <li><a href="" class="btn btn-3 btn-p">Florianópolis</a></li>
                        <li><a href="" class="btn btn-3 btn-p">Florianópolis</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mb-0">
            <div class="col">
                <h2>Buscas populares</h2>
            </div>
        </div>
        <div class="row resultado">
            <div class="col">
                <div>
                    <ul>
                        <?php foreach($accommodations as $accommodation){ ?>
                        <li>
                            <a href="" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <strong><?php echo $accommodation->AccommodationName ?></strong>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABA LOJA -->
<section class="aba collapse" id="aba-loja">
    <div class="container">
        <div class="topo">
            <div class="row">
                <div class="col grow-0">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-loja" class="btn btn-2 btn-ico switch voltar"><i class="uil uil-angle-left"></i></a>
                </div>
                <div class="col">
                    <h2>Loja Yogha</h2>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col">
                    <p>Parcerias exclusivas para você dar match em serviços incríveis associados a sua estadia</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="text" class="d-flex" placeholder="O que você precisa?">
            </div>
        </div>
        <div class="row mb-0">
            <div class="col">
                <h2>Categorias de busca</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="slider slide-4col">
                    <div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="#!">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Sol e praia</h3>
                                    <h4>20 destinos</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col">
                    <h2>Buscas populares</h2>
                </div>
            </div>
            <div class="row resultado">
                <div class="col">
                    <div>
                        <ul>
                            <li>
                                <a href="" class="anuncio">
                                    <picture style="background-image: url(img/imagem.jpg);"></picture>
                                    <strong>Florianópolis</strong>
                                </a>
                            </li>
                            <li>
                                <a href="" class="anuncio">
                                    <picture style="background-image: url(img/imagem.jpg);"></picture>
                                    <strong>Florianópolis</strong>
                                </a>
                            </li>
                            <li>
                                <a href="" class="anuncio">
                                    <picture style="background-image: url(img/imagem.jpg);"></picture>
                                    <strong>Florianópolis</strong>
                                </a>
                            </li>
                            <li>
                                <a href="" class="anuncio">
                                    <picture style="background-image: url(img/imagem.jpg);"></picture>
                                    <strong>Florianópolis</strong>
                                </a>
                            </li>
                            <li>
                                <a href="" class="anuncio">
                                    <picture style="background-image: url(img/imagem.jpg);"></picture>
                                    <strong>Florianópolis</strong>
                                </a>
                            </li>
                            <li>
                                <a href="" class="anuncio">
                                    <picture style="background-image: url(img/imagem.jpg);"></picture>
                                    <strong>Florianópolis</strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- ABA FAVORITOS -->
<section class="aba collapse" id="aba-favoritos">
    <div class="alerta ativo"><i class="uil uil-heart"></i> Salvo na sa lista de favoritos!</div>
    <div class="container">
        <div class="topo">
            <div class="row">
                <div class="col grow-0">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-favoritos" class="btn btn-2 btn-ico switch voltar"><i class="uil uil-angle-left"></i></a>
                </div>
                <div class="col">
                    <h2>Favoritos</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>Guarde lugares para mais tarde ao tocar no ícone de coração.</p>
                </div>
            </div>
        </div>
        <div class="row resultado">
            <div class="col">
                <div>
                    <ul>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="anuncio">
                                <picture style="background-image: url(img/imagem.jpg);"></picture>
                                <div>
                                    <h3>Helbor Stay Batel</h3>
                                    <h4>Curitiba</h4>
                                    <h4><strong>R$45</strong> / noite</h4>
                                </div>
                            </a>
                            <a href="#!" class="btn btn-2 btn-ico"><i class="uil uil-heart"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ABA MENSAGENS -->
<section class="aba collapse" id="aba-mensagens">
    <div class="container">
        <div class="topo">
            <div class="row">
                <div class="col grow-0">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens" class="btn btn-2 btn-ico switch voltar"><i class="uil uil-angle-left"></i></a>
                </div>
                <div class="col">
                    <h2>Mensagens</h2>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col">
                    <p>Parcerias exclusivas para você dar match em serviços incríveis associados a sua estadia</p>
                </div>
            </div>
        </div>
        <div class="row resultado">
            <div class="col">
                <div>
                    <ul>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa">
                                <i class="uil uil-comment-alt-download"></i>
                                <div>
                                    <p>Essas são as boas vindas da equipe  Yogha para você, estamos aqui para te ouvir, fique a vontade e sinta-se em casa.</p>
                                    <h4>Recebida em: 14/10</h4>
                                </div>
                                <i class="uil uil-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa">
                                <i class="uil uil-comment-alt-upload"></i>
                                <div>
                                    <p>Essas são as boas vindas da equipe  Yogha para você, estamos aqui para te ouvir, fique a vontade e sinta-se em casa.</p>
                                    <h4>Enviada em: 14/10</h4>
                                </div>
                                <i class="uil uil-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa">
                                <i class="uil uil-comment-alt-download"></i>
                                <div>
                                    <p>Essas são as boas vindas da equipe  Yogha para você, estamos aqui para te ouvir, fique a vontade e sinta-se em casa.</p>
                                    <h4>Recebida em: 14/10</h4>
                                </div>
                                <i class="uil uil-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa">
                                <i class="uil uil-comment-alt-download"></i>
                                <div>
                                    <p>Essas são as boas vindas da equipe  Yogha para você, estamos aqui para te ouvir, fique a vontade e sinta-se em casa.</p>
                                    <h4>Recebida em: 14/10</h4>
                                </div>
                                <i class="uil uil-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa">
                                <i class="uil uil-comment-alt-upload"></i>
                                <div>
                                    <p>Essas são as boas vindas da equipe  Yogha para você, estamos aqui para te ouvir, fique a vontade e sinta-se em casa.</p>
                                    <h4>Enviada em: 14/10</h4>
                                </div>
                                <i class="uil uil-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa">
                                <i class="uil uil-comment-alt-upload"></i>
                                <div>
                                    <p>Essas são as boas vindas da equipe  Yogha para você, estamos aqui para te ouvir, fique a vontade e sinta-se em casa.</p>
                                    <h4>Enviada em: 14/10</h4>
                                </div>
                                <i class="uil uil-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa">
                                <i class="uil uil-comment-alt-download"></i>
                                <div>
                                    <p>Essas são as boas vindas da equipe  Yogha para você, estamos aqui para te ouvir, fique a vontade e sinta-se em casa.</p>
                                    <h4>Recebida em: 14/10</h4>
                                </div>
                                <i class="uil uil-angle-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa">
                                <i class="uil uil-comment-alt-download"></i>
                                <div>
                                    <p>Essas são as boas vindas da equipe  Yogha para você, estamos aqui para te ouvir, fique a vontade e sinta-se em casa.</p>
                                    <h4>Recebida em: 14/10</h4>
                                </div>
                                <i class="uil uil-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row botoes">
            <div class="col">
                <a href="#!" class="btn d-flex">Nova mensagem</a>
            </div>
            <div class="col grow-0">
                <a href="#!" class="btn btn-ico"><i class="uil uil-whatsapp"></i></a>
            </div>
        </div>
    </div>
</section>

<!-- ABA MENSAGENS -->
<section class="aba collapse" id="aba-mensagens-conversa">
    <div class="container">
        <div class="topo">
            <div class="row">
                <div class="col grow-0">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-mensagens-conversa" class="btn btn-2 btn-ico voltar"><i class="uil uil-angle-left"></i></a>
                </div>
                <div class="col">
                    <h2>Mensagens</h2>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col">
                    <p>Parcerias exclusivas para você dar match em serviços incríveis associados a sua estadia</p>
                </div>
            </div>
        </div>
        <div class="row resultado conversa">
            <div class="col">
                <div>
                    <ul>
                        <li>
                            <div>
                                <h4>Recebida em: 14/10</h4>
                                <p>Neste sentido, a constante divulgação das informações exige a precisão e a definição dos relacionamentos verticais entre as hierarquias. Acima de tudo, é fundamental ressaltar que a hegemonia do ambiente político estimula a padronização do processo de comunicação como um todo.</p>
                            </div>
                        </li>
                        <li>
                            <picture style="background-image: url(img/imagem.jpg);"></picture>
                            <div>
                                <h4>Enviada em: 14/10</h4>
                                <p>Neste sentido, a constante divulgação das informações exige a precisão e a definição dos relacionamentos verticais entre as hierarquias. Acima de tudo, é fundamental ressaltar que a hegemonia do ambiente político estimula a padronização do processo de comunicação como um todo.</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h4>Recebida em: 14/10</h4>
                                <p>Neste sentido, a constante divulgação das informações exige a precisão e a definição dos relacionamentos verticais entre as hierarquias. Acima de tudo, é fundamental ressaltar que a hegemonia do ambiente político estimula a padronização do processo de comunicação como um todo.</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h4>Recebida em: 14/10</h4>
                                <p>Neste sentido, a constante divulgação das informações exige a precisão e a definição dos relacionamentos verticais entre as hierarquias. Acima de tudo, é fundamental ressaltar que a hegemonia do ambiente político estimula a padronização do processo de comunicação como um todo.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row responder">
            <div class="col">
                <input type="" name="" placeholder="Escreva uma mensagem">
                <button class="btn btn-2 btn-ico"><i class="uil uil-angle-right"></i></button>
            </div>
        </div>
    </div>
</section>

<!-- ABA USUARIO -->
<section class="aba collapse" id="aba-usuario">
    <div class="container">
        <div class="topo">
            <div class="row">
                <div class="col grow-0">
                    <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-usuario" class="btn btn-2 btn-ico switch voltar"><i class="uil uil-angle-left"></i></a>
                </div>
                <div class="col">
                    <h2>Usuário</h2>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col">
                    <p>Parcerias exclusivas para você dar match em serviços incríveis associados a sua estadia</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                conteudo
            </div>
        </div>
    </div>
</section>

<!-- HEADER -->
<header>
    <div class="container">
        <div class="row">
            <div class="col">
                <ul>
                    <li><img src="img/logo-yogha-branco.svg"></li>
                    <li><a href="#!" data-bs-toggle="collapse" data-bs-target="#menu-lateral" class="switch"><i class="uil uil-bars"></i></a></li>
                </ul>
                <ul>
                    <li><h1 class="justify-content-center"><span>Sinta-se em casa onde estiver</span></h1></li>
                    <li><a href="#!" class="btn d-flex btn-2"><i class="uil uil-search"></i><span>Onde você quer morar hoje?</span></a></li>
                    <li><a href="#!" class="btn d-flex btn-primary">Me surpreenda!</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- PROXIMIDADE -->
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Hospedagens perto de você</h2>
            </div>
        </div>
        <div class="slider slide-3col">
            <div>

                <?php foreach($accommodations as $accommodation)
                    <?php $pictures = json_decode($accommodation->Pictures, true); ?>
                    @if(isset($pictures['Picture'][0]['PreparedURI'])){
                        $thumbnail = $pictures['Picture'][0]['ThumbnailURI'];
                    @endif
                ?>
                    <div>
                        <a href="#!"><picture style="background-image: url(<?php echo $thumbnail; ?>);"></picture></a>
                        <h3><?php echo $accommodation->AccommodationName ?></h3>
                        <h4><i class="uil uil-clock"></i>15 minutos de carro</h4>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<!-- MAPA -->
<section id="mapa">
    <div class="container">
        <div class="row">
            <div class="col">
                <i class="uil uil-map-marker"></i>
                <h3>Florianópolis</h3>
                <h4><strong>15 opções</strong> perto de você</h4>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="#!" class="btn d-flex btn-2">Mostrar no mapa</a>
            </div>
        </div>
    </div>
</section>

<!-- AVALIADOS -->
<section>
    <div class="container pb-0">
        <div class="row">
            <div class="col">
                <h2>Mais bem avaliados</h2>
            </div>
        </div>
        <div class="slider slide-3col">
            <div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><i class="uil uil-star"></i> <strong>9,5</strong> (200)</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><i class="uil uil-star"></i> <strong>9,5</strong> (200)</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><i class="uil uil-star"></i> <strong>9,5</strong> (200)</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><i class="uil uil-star"></i> <strong>9,5</strong> (200)</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><i class="uil uil-star"></i> <strong>9,5</strong> (200)</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><i class="uil uil-star"></i> <strong>9,5</strong> (200)</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><i class="uil uil-star"></i> <strong>9,5</strong> (200)</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DESCONTOS -->
<section>
    <div class="container pb-0">
        <div class="row">
            <div class="col">
                <h2>Descontos exclusivosê</h2>
            </div>
        </div>
        <div class="slider slide-3col">
            <div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><strong>R$45</strong> / noite</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><strong>R$45</strong> / noite</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><strong>R$45</strong> / noite</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><strong>R$45</strong> / noite</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><strong>R$45</strong> / noite</h4>
                </div>
                <div>
                    <a href="#!"><picture style="background-image: url(img/imagem.jpg);"></picture></a>
                    <h3>Helbor Stay Batel</h3>
                    <h4>Curitiba</h4>
                    <h4><strong>R$45</strong> / noite</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CORPORATIVO -->
<section id="corporativo">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h4><strong>Corporativo</strong></h4>
                <h3>Vantagens especiais para parceiros Yogha</h3>
                <a href="" class="btn btn-2">Saiba mais</a>
            </div>
        </div>
    </div>
</section>

<!-- PROCURADOS -->
<section>
    <div class="container pb-0">
        <div class="row">
            <div class="col">
                <h2>Mais procurados</h2>
            </div>
        </div>
        <div class="slider slide-4col">
            <div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Florianópolis</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ESTILO -->
<section>
    <div class="container pb-0">
        <div class="row">
            <div class="col">
                <h2>Qual é o seu estilo?</h2>
            </div>
        </div>
        <div class="slider slide-4col">
            <div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
                <div>
                    <a href="#!">
                        <picture style="background-image: url(img/imagem.jpg);"></picture>
                        <div>
                            <h3>Sol e praia</h3>
                            <h4>20 destinos</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ALUGUE -->
<section>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="justify-content-center"><i class="uil uil-house-user"></i> <span>Uma renda extra para você</span></h2>
                <a href="" class="btn d-flex btn-primary">Alugue seu imóvel</a>
            </div>
        </div>
    </div>
</section>
@endsection
