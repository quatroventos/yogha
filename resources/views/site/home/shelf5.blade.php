{{--//bairros--}}
<section class="mb-15">
    <div class="container">
        @if($title != '')
            <div class="row mb-10">
                <div class="col">
                    <h2><strong>{{$home['shelf1_title']}}</strong></h2>
                </div>
            </div>
        @endif
        <div class="row mb-10">
            <div class="col">
                <div class="slider slide-3col text-center texto-m texto-branco">
                    <ul>
                        <?php foreach($populardistricts as $populardistrict){ ?>
                        <li>
                            <a href="{{URL::to('/searchbydistrict/'.$populardistrict->District)}}" class="btn d-flex" style="height:130px; border-radius: 10px;">{{$populardistrict->District}}</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
