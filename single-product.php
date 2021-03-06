<?php 
get_header(); 
global $product;

$productImage = get_the_post_thumbnail_url($post->ID, 'large');
$header_image = get_field('header_image');
// $attribute_keys  = array_keys( $attributes );
// $variations_json = wp_json_encode( $available_variations );
// $variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
?>
<header class="header header--image" style="background-image: url(<?= $header_image['url']; ?>)"></header>
<div class="slider-list-wrapper">
	<div class="container">
		<ul class="list list--check slider-list">
			<?php
			while (have_rows('usp', 'options')) : the_row();
				$rowIndex = get_row_index();
				?>
				<li <?php if ($rowIndex == 1) : ?>class="active"<?php endif; ?>><i class="icon-check"></i><?php the_sub_field('title'); ?></li>
				<?php
			endwhile;
			?>
		</ul>
	</div>
</div>

<section class="image-text-product padding-top--large padding-bottom--large">
	<div class="container">
	
		<div class="row">
			<div class="col-12 col-md-6 col-lg-5 image-text__col-image">
				<figure class="img">
					<img src="<?= $productImage; ?>" alt="<?php the_title(); ?>">
				</figure>
			</div>
			<div class="col-12 col-md-6 col-xl-5 image-text__col-text">
				<h1><?php the_title(); ?></h1>
				<div class="list--check">
					<?php the_field('info_text'); ?>
				</div>
				<?php
				if (have_rows('allergens')) {

					if (get_field('title_allergen')) {
						?>
						<h4><?php the_field('title_allergen'); ?></h4>
						<?php
					}
					?>
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

				if (get_field('nutrition_title')) {
					?>
					<h4><?php the_field('nutrition_title'); ?></h4>
					<?php
				}
				?>
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
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
				add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
				add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
				add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

				do_action( 'woocommerce_single_product_summary' );
		 		?>

		 		<div class="wc-checks list--check">
					<ul>
						<?php	
						if( have_rows('vinkjes_product') ): 
							while( have_rows('vinkjes_product') ): the_row(); ?>
								<li><?php the_sub_field('tekst_bij_vinkje_product'); ?></li>
							<?php
							endwhile; 
						else:
							while (have_rows('vinkjes', 'options')) : the_row(); ?>
								<li><?php the_sub_field('tekst_bij_vinkje'); ?></li>
							<?php
							endwhile;
						endif; 
						?>
					</ul>
		 		</div>

				<!-- <div class="prices__wrapper">
					<div class="notifications">
						<?php do_action( 'woocommerce_before_single_product' ); ?>
						<div class="notifications__succes">
							<?php _e('Product is toegevoegd aan de winkelmand', 'accepta'); ?>
						</div>
					</div>
				</div> -->
			</div>

		</div>
	</div>
</section>

<?php
$products = get_field('related_products');
if ($products) :
    ?>
    <section class="categories categories--standard padding-top--large padding-bottom--large">
        <div class="container">
            <div class="row categories__wrapper">
                <?php
                $related_title = get_field('related_title');
                if ($related_title) :
                    ?>
                    <div class="col-12 categories__header">
                        <h2 class="medium"><?= $related_title; ?></h2>
                    </div>
                    <?php
                endif;
      
					 foreach ($products as $product) :
						 $id = $product->ID;
						 $image = $image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail');
		 
						 $wcProduct = wc_get_product($id);
						 $variationId = $wcProduct->get_id();
						 $variableProduct = new WC_Product_Variable($variationId);
						 $variations = $variableProduct->get_available_variations();
						 ?>
						 <div class="col-12 col-sm-6 col-lg-4">
							 <div class="categories__item">
								 <a href="<?= get_permalink($id); ?>">
									<figure class="img">
										 <img src="<?php echo $image[0]; ?>">
									 </figure>
									 <div class="categories__item__title product">
										 <h3><?= get_the_title($id); ?></h3>
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
					 endforeach;
					 ?>
            </div>
        </div>
    </section>
    <?php
endif;
get_footer(); ?>

