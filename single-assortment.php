<?php 
get_header(); 

$image = get_field('image');

$image_options = get_field('image_options');
if ($image_options && in_array('header', $image_options)) :
    $header_image = get_field('header_image');
    ?>
    <header class="header header--image" style="background-image: url(<?= $header_image['url']; ?>)"></header>
    <?php
endif;
?>

<section class="image-text padding-top--large padding-bottom--large">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-5 image-text__col-image">
                <figure class="img">
                    <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
                </figure>
            </div>
            <div class="col-12 col-md-6 image-text__col-text list--check">
                <h1 class="small"><?php the_title(); ?></h1>
                <?php the_field('info_text'); ?> 
                <h4><?php the_field('nutrition_title'); ?></h4>
                <table>
                    <?php
                    while (have_rows('nutritional_values')) : the_row();
                        ?>
                        <tr>
                            <td><?php the_sub_field('title'); ?></td>
                            <td><?php the_sub_field('quantity'); ?></td>
                        </tr>
                        <?php
                    endwhile;
                    ?>
                </table>   
                <?php
                $term = get_term(14, 'assortment-categories');
                $term_link = get_term_link( $term );
                ?>
                <a href="<?= $term_link; ?>" class="button button--small"><i class="icon-arrow"></i> <?= __('Naar het overzicht', 'buitenhorst'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="categories categories--standard padding-top--large padding-bottom--large">
    <div class="container">
        <div class="row">
            <?php
            $related_title = get_field('related_title');
            if ($related_title) :
                ?>
                <div class="col-12 categories__header">
                    <h2 class="medium"><?= $related_title; ?></h2>
                </div>
                <?php
            endif;
            ?>
            <div class="col-12 categories__wrapper">
                <?php
                $products = get_field('related_products');
                if ($products) :
                    foreach ($products as $post) : setup_postdata($post);
                        $image = get_field('image');
                        ?>
                        <div class="categories__item">
                            <a href="<?php the_permalink(); ?>">
                                <figure class="img">
                                    <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
                                </figure>
                                <div class="categories__item__title">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php
                    endforeach;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();