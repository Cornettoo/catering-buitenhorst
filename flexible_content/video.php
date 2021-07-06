<?php
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

$image = get_sub_field('image');
?>

<section class="video padding-top--large padding-bottom--large">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="video__wrapper">
                    <div class="video__placeholder" style="background-image: url(<?= $image['url']; ?>)">
                        <button id="play" class="play-button">
                            <i class="icon-play"></i>
                        </button>
                    </div>
                    <div id="player" data-video-id="<?php the_sub_field('youtube_id'); ?>"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://www.youtube.com/iframe_api"></script>