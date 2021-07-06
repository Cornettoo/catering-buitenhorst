<?php 
/**
 * Template name: Standaard
 */
get_header(); 

if (is_cart() || is_checkout() || is_account_page()) {
	$header_image = get_the_post_thumbnail_url();
	?>
	
	<header class="header header--image" style="background-image: url(<?= $header_image; ?>)"></header>
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
	
	<section class="section <?php if (is_cart() || is_checkout()) { ?>cart-checkout<?php } else { ?>account<?php } ?> padding-top--large padding-bottom--large">
		<div class="container">
			<?php 
			if (is_cart()) {
				?>
				<h1><?php the_title(); ?></h1>
				<?php
			}

			while( have_posts() ) : 
				the_post();
				the_content(); 
			endwhile;
			?>
		</div>
	</section>
	<?php
} else {
	if (is_tax( 'product_cat' )) {
		get_template_part('template-parts/tax');
	} else {
		if (have_rows('flexible_content')) :
			while (have_rows('flexible_content')) : the_row();
				include('flexible_content/' . get_row_layout() . '.php');
			endwhile;
		endif;
	}
}

get_footer();