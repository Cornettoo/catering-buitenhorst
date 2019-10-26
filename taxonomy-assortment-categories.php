<?php
get_header();

$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  

$term = get_terms([
    'taxonomy'      => 'assortment-categories',
    'include'       => $term_id,
    'hide_empty'    => false
]);

$image = get_field('header_image', $taxonomy . '_' . $term_id);

$images = get_field('images', $taxonomy . '_' . $term_id);
?>

<header class="header header--image" style="background-image: url(<?= $image['url']; ?>)"></header>

<section class="text padding-top--large padding-bottom--large">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 text__wrapper">
                <h2><?= $term[0]->name; ?></h2>
                <?php the_field('text', $taxonomy . '_' . $term_id); ?>
            </div>
        </div>
    </div>
</section>

<?php 
if ($images) {
    ?>
    <section class="images images--image padding-top--none padding-bottom--large">
        <div class="container">
            <div class="row">
                <div class="col-12 images__wrapper">
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
    <?php
}

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

if ($products) {
    ?>
    <section class="categories categories--standard padding-top--none padding-bottom--large">
        <div class="container">
            <div class="row">
                <div class="col-12 categories__wrapper">
                    <?php
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
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

get_footer();