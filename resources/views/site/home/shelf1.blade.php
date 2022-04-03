{{--//mais accessados--}}
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
                @foreach($mostvisited as $accommodation)
                    <li>
                        <a href="aluguel/{{$accommodation->slug}}" class="texto-marrom-escuro">
                            @foreach($accommodation->pictures as $key => $pic)
                                @if($key == 0)
                                    <picture class="mb-10" style="background-image: url({{Storage::disk('s3')->url($pic['thumbnail'])}});"></picture>
                                @endif
                            @endforeach
                            <h3 class="mb-5">{{$accommodation->AccommodationName}}</h3>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
