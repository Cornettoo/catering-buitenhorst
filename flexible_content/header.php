<?php
// Options
$options = get_sub_field('options');

if ($options && in_array('text', $options)) {
    $header_type = 'text';
} else {
    $header_type = 'image';
}

// Image
$image = get_sub_field('image');
?>

<header class="header header--<?= $header_type; ?>" style="background-image: url(<?= $image['url']; ?>)">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php the_sub_field('title'); ?></h1>
                <h3><?php the_sub_field('subtitle'); ?></h3>
                <?php
                if ($options && in_array('button', $options)) :
                    $button = get_sub_field('button');
                    ?>
                    <a href="<?= $button['url']; ?>" target="<?= $button['target']; ?>" class="button button--third"><?= $button['title']; ?></a>
                    <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</header>