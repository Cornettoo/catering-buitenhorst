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

$quantity = get_field('info_quantity');
$info_options = get_field('info_options');
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
                <?php 
                the_field('info_text'); 
                
                if (have_rows('allergens')) {
                    ?> 
                    <h4><?php the_field('title_allergen'); ?></h4>
                    <div class="icon__wrapper">
                        <?php
                        while (have_rows('allergens')) : the_row();
                            $icon = get_sub_field('icon');
                            ?>
                            <div class="icon">
                                <i class="icon-<?= $icon; ?>"></i>
                                <p><?php the_sub_field('name'); ?></p>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
                    <?php
                }
                ?>

                <div class="prices__wrapper">
                    <?php
                    if ($info_options && in_array('multiple_sizes', $info_options)) {
                        while (have_rows('info_prices')) : the_row();
                            ?>
                            <div class="price">
                                <p class="small"><?php the_sub_field('size'); ?></p>
                                <?php
                                if ($info_options && in_array('discount', $info_options)) {
                                    ?>
                                    <div class="badge badge--discount">€ <?php the_sub_field('price'); ?></div>
                                    <div class="badge badge--green">€ <?php the_sub_field('price_discount'); ?></div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="badge badge--green">€ <?php the_sub_field('price'); ?></div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        endwhile;
                    } else {
                        ?>
                        <div class="price">
                            <?php
                            if ($quantity) :
                                ?>
                                <p class="small"><?= $quantity; ?></p>
                                <?php
                            endif;

                            if ($info_options && in_array('discount', $info_options)) {
                                ?>
                                <div class="badge badge--discount">€ <?php the_field('info_price'); ?></div>
                                <div class="badge badge--green">€ <?php the_field('info_price_discount'); ?></div>
                                <?php
                            } else {
                                ?>
                                <div class="badge badge--green">€ <?php the_field('info_price'); ?></div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
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