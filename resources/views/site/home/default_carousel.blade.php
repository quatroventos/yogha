<div class="slider slide-3col">
    <ul>
        <?php foreach($accommodations as $accommodation){
        $pictures = json_decode($accommodation->Pictures, true);
        if(isset($pictures['Picture'][0]['PreparedURI'])){
            $thumbnail = $pictures['Picture'][0]['ThumbnailURI'];
        }
        ?>
        <li>
            <a href="accommodation/<?php echo $accommodation->AccommodationId; ?>" class="texto-marrom-escuro">
                <?php if(isset($pictures['Picture'][0]['OriginalURI'])){ ?>
                <picture class="mb-10" style="background-image: url(<?php echo $pictures['Picture'][0]['OriginalURI']; ?>);"></picture>
                <?php } ?>
                <h3 class="mb-5"><?php echo $accommodation->AccommodationName; ?></h3>
                <h4 class="texto-m d-flex gap-5"><i class="texto-laranja icone-p uil uil-clock"></i>15 min. de carro</h4>
            </a>
        </li>
        <?php } ?>
    </ul>
</div>
