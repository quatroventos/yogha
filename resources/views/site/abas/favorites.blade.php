<section class="aba collapse" id="aba-favoritos">
    <div class="container fundo-branco pt-15 h-100">
        <div class="row align-items-center">
            <div class="col px-0 grow-0">
                <a href="#!" data-bs-toggle="collapse" data-bs-target="#aba-favoritos" class="btn btn-2 btn-ico mb-0 switch"><i class="uil uil-angle-left"></i></a>
            </div>
            <div class="col ps-0">
                <h2 class="texto-g"><strong>Favoritos</strong></h2>
            </div>
        </div>
        <div class="row mb-15">
            <div class="col">
                <h3 class="texto-m">Guarde lugares para mais tarde ao tocar no ícone de coração.</h3>
            </div>
        </div>
        <div class="row scroll-y">
            <div class="col">
                <ul class="gap-10 lista-colunas">
                    <?php if($favorites != ""){ ?>
                        <?php foreach($favorites as $accommodation){
                        $pictures = json_decode($accommodation->Pictures, true);
                        if(isset($pictures['Picture'][0]['OriginalURI'])){
                            $thumbnail = $pictures['Picture'][0]['OriginalURI'];
                        }
                        ?>
                        <li>
                            <div class="row justify-content-between">
                                <div class="col col-sm-12 grow-0 pe-0">
                                    <?php if(isset($pictures['Picture'][0]['OriginalURI'])){ ?>
                                    <a href="aluguel/<?php echo $accommodation->slug; ?>">
                                        <picture class="pic-p" style="background-image: url(<?php echo $pictures['Picture'][0]['OriginalURI']; ?>);"></picture>
                                    </a>
                                    <?php } ?>
                                </div>
                                <div class="col col-sm-11 texto-marrom-escuro">
                                    <a href="pagina-single-anuncio.shtml">
                                        <h3 class="mb-5"><?php echo $accommodation->AccommodationName; ?></h3>
                                        <h4 class="texto-m mb-5"><?php echo $accommodation->District; ?></h4>
                                        <h4 class="texto-m"><strong class="texto-laranja"><?php echo $accommodation->Price; ?></strong> /noite</h4>
                                    </a>
                                </div>
                                <div class="col grow-0 ps-0">
                                    <a href="#!" class=""><i class="icone-g uil uil-heart"></i></a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                    <?php } ?>


                </ul>
            </div>
        </div>
    </div>
</section>
