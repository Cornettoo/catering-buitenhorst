<?php
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
?>


<section class="categories padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
	<div class="container">
		<h2 class="medium"><?php the_sub_field('title'); ?></h2>
		<div class="row categories__wrapper">
			<?php
			$products = get_sub_field('products');
			
			foreach ($products as $product) :
				$id = $product->ID;
				$image = get_the_post_thumbnail($id);

				$wcProduct = wc_get_product($id);
				$variationId = $wcProduct->get_id();
				$variableProduct = new WC_Product_Variable($variationId);
				$variations = $variableProduct->get_available_variations();
				?>
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="categories__item">
						<a href="<?= get_permalink($id); ?>">
							<figure class="img">
								<?= $image; ?>
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