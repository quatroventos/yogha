<div class="slider slide-4col text-center texto-m texto-branco">
    <ul>
        <?php foreach($accommodations as $accommodation){
            $pictures = json_decode($accommodation->Pictures, true);
            if(isset($pictures['Picture'][0]['PreparedURI'])){
                $thumbnail = $pictures['Picture'][0]['ThumbnailURI'];
            }
            ?>
            <li>
                <a href="aluguel/<?php echo $accommodation->slug; ?>">
                    <?php if(isset($pictures['Picture'][0]['OriginalURI'])){ ?>
                        <picture style="background-image: url(<?php echo $pictures['Picture'][0]['OriginalURI']; ?>);"></picture>
                    <?php } ?>
                    <div>
                        <h3><strong><?php echo $accommodation->AccommodationName; ?></strong></h3>
                    </div>
                </a>
            </li>
            <?php } ?>
    </ul>
</div>
