{{--//descontos--}}

<section class="mb-15">
    <div class="container">
        @if($title != '')
            <div class="row mb-10">
                <div class="col">
                    <h2><strong>{{$home['shelf1_title']}}</strong></h2>
                </div>
            </div>
        @endif
        <div class="slider slide-3col">
            <ul>
                <?php foreach($discount->toArray() as $accommodation){?>
                <li>
                    <a href="aluguel/<?php echo $accommodation['slug']; ?>" class="texto-marrom-escuro">
                        @foreach($accommodation['pictures'] as $key => $pic)
                            @if($key == 0)
                                <picture class="mb-10" style="background-image: url({{Storage::disk('s3')->url($pic['thumbnail'])}});"></picture>
                            @endif
                        @endforeach
                        <h3 class="mb-5"><?php echo $accommodation['AccommodationName']; ?></h3>
                        <h4 class="texto-m d-flex gap-5">a partir de <strong class="texto-laranja">R${{$accommodation['Price']}}</strong>/noite</h4>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>
