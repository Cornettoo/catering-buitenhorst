<?php
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  

$term = get_terms([
    'taxonomy'      => 'product_cat',
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
					 <?= $term[0]->description; ?>
            </div>
        </div>
    </div>
</section>

<?php 
$args = array(
	'post_type'      => 'product',
	'posts_per_page' => -1,
	'product_cat'    => $term[0]->slug,
);

$loop = new WP_Query( $args );

if ($loop) {
    ?>
    <section class="categories categories--standard padding-top--none padding-bottom--large">
        <div class="container">
            <div class="row categories__wrapper">
						<?php
						while ( $loop->have_posts() ) : $loop->the_post();
							global $product;
							$image = get_field('image');
							$wcProduct = wc_get_product();
							$variationId = $wcProduct->get_id();
							$variableProduct = new WC_Product_Variable($variationId);
							$variations = $variableProduct->get_available_variations();
							?>
							<div class="col-12 col-sm-6 col-lg-4">
								<div class="categories__item">
									<a href="<?= get_permalink(); ?>">
										<figure class="img">
												<?= woocommerce_get_product_thumbnail('large') ?>
										</figure>
										<div class="categories__item__title product">
											<h3><?= get_the_title(); ?></h3>
											<div class="price">
												<?php 
												if ($variations) {
													if ($variations[0]['display_price'] != $variations[0]['display_regular_price']) {
														?>
														<span>€ <?= number_format($variations[0]['display_price'], 2, ',', ' '); ?></span>
														<?php
													}
													?>
													<span>€ <?= number_format($variations[0]['display_regular_price'], 2, ',', ' '); ?></span>
													<?php
												} else {
													?>
													<span>€ <?= $wcProduct->regular_price; ?></span>
													<?php
													if ($wcProduct->sale_price) {
														?>
														<span>€ <?= $wcProduct->sale_price; ?></span>
														<?php
													}
												}
												?>
											</div>
										</div>
									</a>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_query();
						?>
            </div>
        </div>
    </section>
    <?php
}