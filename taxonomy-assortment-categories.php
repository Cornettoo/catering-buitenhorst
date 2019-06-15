<?php
get_header();

$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  

$term = get_terms([
    'taxonomy' => 'assortment-categories',
    'include'   => $term_id,
]);

$image = get_field('header_image', $taxonomy . '_' . $term_id);
?>

<header class="header header--image" style="background-image: url(<?= $image['url']; ?>)"></header>

<section class="text padding-top--large padding-bottom--large">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 text__wrapper">
                <h2><?= $term[0]->name; ?></h2>
                <?= $term[0]->description; ?>
            </div>
        </div>
    </div>
</section>

<section class="categories categories--standard padding-top--none padding-bottom--large">
    <div class="container">
        <div class="row">
            <div class="col-12 categories__wrapper">
                <?php
                $args = [
					'post_type'         => 'assortment',
					'posts_per_page'    => -1,
					'order'             => 'ASC',
					'tax_query'         => [
						[
                            'taxonomy'  => 'assortment-categories',
                            'field'     => 'term_id',
							'terms'     => $term_id,
						]
					]
				];
				$products = get_posts($args);
                foreach ($products as $post) : setup_postdata($post);
                    $image = get_field('image');
                    ?>
                    <div class="categories__item">
                        <?php
                        if ($term[0]->term_id == '14') {
                            ?>
                            <a href="<?php the_permalink(); ?>">
                            <?php
                        } else {
                            ?>
                            <a onclick="javascript:jQuery('#popup-<?= $post->post_name;?>');" data-fancybox="products" href="#popup-<?= $post->post_name;?>">
                            <?php
                        }
                        ?>
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
                ?>
            </div>
        </div>
    </div>
</section>

<?php
$args = [
    'post_type'         => 'assortment',
    'posts_per_page'    => -1,
    'order'             => 'ASC',
    'tax_query'         => [
        [
            'taxonomy'  => 'assortment-categories',
            'field'     => 'term_id',
            'terms'     => $term_id,
        ]
    ]
];
$products = get_posts($args);
foreach ($products as $post) : setup_postdata($post);
    $slug = $post->post_name;
    $image = get_field('image');
    $quantity = get_field('info_quantity');
    $info_options = get_field('info_options');
    ?>
    <div style="display: none;" id="popup-<?= $slug; ?>" class="popup">
        <div class="popup__wrapper">
            <div class="popup__image" style="background-image: url('<?= $image['url']; ?>')"></div>
            <div class="popup__info">
                <div class="popup__close"><?= __('Sluiten', 'buitenhorst'); ?></div>
                <div class="popup__content list--check">
                    <h3><?php the_title(); ?></h3>
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
                </div>
                <div class="popup__nutritional-values">
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
                </div>
            </div>
        </div>
    </div>
    <?php
endforeach;
wp_reset_postdata();


get_footer();