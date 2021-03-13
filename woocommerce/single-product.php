<?php 
get_header(); 
?>
<h1>henk</h1>
<section class="intro">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xs-12 offset-lg-1 intro__wrapper">
				<h1 class="intro__title"><?php the_title(); ?></h1>

				<div class="intro__content">
					<div class="intro__content__text__wrapper">
						<?php the_content(); ?>
						<div class="intro__content__add_cart">
							<?php wc_get_template_part( 'content', 'single-product' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer( 'shop' );
?>