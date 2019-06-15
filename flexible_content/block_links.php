<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$options = get_sub_field('options');
?>

<section class="categories padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1 categories__wrapper">
                <?php
                while (have_rows('categories')) : the_row();
                    $image = get_sub_field('image');
                    $icon = get_sub_field('icon');
                    ?>
                    <div class="categories__item">
                        <a href="<?php the_sub_field('link'); ?>">
                            <figure class="img">
                                <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
                            </figure>
                            <div class="categories__item__title">
                                <h3><?php the_sub_field('title'); ?></h3>
                                <div class="icon">
                                    <i class="icon-<?= $icon; ?>"></i>
                                    <i class="icon-arrow"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                endwhile;
                ?>
            </div>
        </div>
    </div>
</section>