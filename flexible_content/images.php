<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$options = get_sub_field('options');

// Classes
if ($options && in_array('text', $options)) {
    $section_class = 'text';
    $wrapper_class = 'col-12 images__wrapper';
    $text_options = get_sub_field('text_options');
    $col_class = $text_options == 'box_text' ? 'images__text' : 'images__title-icon';
} else {
    $section_class = 'image';
    $wrapper_class = 'col-12 offset-lg-1 col-lg-10 images__wrapper';
}
?>

<section class="images images--<?= $section_class; ?> padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row">
            <div class="<?= $wrapper_class; ?>">
                <?php
                if ($options && in_array('text', $options)) :
                    ?>

                    <div class="image-col--1 <?= $col_class; ?>">
                        <?php
                        if ($text_options == 'box_text') {
                            
                            the_sub_field('text');
                            ?>
                            
                            <?php
                        } else  {
                            while (have_rows('title_icon')) : the_row();
                                $icon = get_sub_field('icon');
                                ?>
                                <div class="item">
                                    <i class="icon-<?= $icon; ?>"></i>
                                    <h4><?php the_sub_field('title'); ?></h4>
                                </div>
                                <?php
                            endwhile;
                        }
                        ?>
                    </div>

                    <?php
                endif;
                ?>
                <div class="image-col--2 images__slider carousel-container">
                    <?php
                    while (have_rows('images')) : the_row();
                        $image = get_sub_field('image');
                        ?>
                        <div class="images__slide carousel" style="background-image: url('<?= $image['url']; ?>')"></div>
                        <?php
                    endwhile;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>