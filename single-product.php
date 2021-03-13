<?php 
get_header(); 

$image = get_field('image');
$header_image = get_field('header_image');
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
					<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
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

				<div class="prices__wrapper">
					<?php 
					$product = wc_get_product($post->ID);
					$variationId = $product->get_variation_id();
					$variableProduct = new WC_Product_Variable($variationId);
					$variations = $variableProduct->get_available_variations();
					
					if ($variations) {
						foreach ($variations as $variation) {
							?>
							<div class="prices__wrapper__item">
								<p><?= $variation['attributes']['attribute_aantal-personen'] ?> Personen</p>
								<p class="price">
									<?php
									if ($variation['display_price'] != $variation['display_regular_price']) {
										?>
										<span>€ <?= number_format($variation['display_price'], 2, ',', ' '); ?></span>
										<?php
									}
									?>
									<span>€ <?= number_format($variation['display_regular_price'], 2, ',', ' '); ?></span>
								</p>
							</div>
							<?php
						}
						?>
						<div id="add-variant" class="add_to_cart_select">
							<div class="select">
								<select name="" id="">
									<?php
									foreach ($variations as $variation) {
										?>
										<option value="<?= $variation['variation_id'] ?>"><?= $variation['attributes']['attribute_aantal-personen'] ?> Personen</option>
										<?php
									}
									?>
								</select>
							</div>
							<a href="<?php echo $product->add_to_cart_url() ?>" class="button button--primary ajax_add_to_cart add_to_cart_button" data-product_id="2345" data-product_sku="<?php echo esc_attr($sku) ?>" aria-label="Voeg <?php the_title_attribute() ?> toe aan je winkelmand"> <?php _e('In winkelmand', 'accepta'); ?></a>
						</div>
						<?php
					} else {
						?>
						<div class="prices__wrapper__item">
							<p class="price">
								<span>€ <?= $product->regular_price; ?></span>
								<?php
								if ($product->sale_price) {
									?>
									<span>€ <?= $product->sale_price; ?></span>
									<?php
								}
								?>
							</p>
							<a href="<?php echo $product->add_to_cart_url() ?>" class="button button--primary ajax_add_to_cart add_to_cart_button" data-product_id="<?php echo get_the_ID(); ?>" data-product_sku="<?php echo esc_attr($sku) ?>" aria-label="Voeg <?php the_title_attribute() ?> toe aan je winkelmand"> <?php _e('In winkelmand', 'accepta'); ?></a>
						</div>
						<?php
					}
					?>

					<div class="notifications">
						<?php do_action( 'woocommerce_before_single_product' ); ?>
						<div class="notifications__succes">
							<?php _e('Product is toegevoegd aan de winkelmand', 'accepta'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();