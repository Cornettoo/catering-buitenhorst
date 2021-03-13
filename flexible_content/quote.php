<?php
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
?>

<section class="quote padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-10 offset-lg-1">
				<h2 class="medium"><?php the_sub_field('title'); ?></h2>
				<div class="quote__wrapper carousel-container">
					<?php
					$quote_object = get_sub_field('quote');
					
					foreach ($quote_object as $post) : 
						setup_postdata($post);
						?>
						<div class="quote__slide carousel">
							<?php the_content(); ?>
							<h5><?php the_title(); ?></h5>
						</div>
						<?php
						wp_reset_postdata();
					endforeach;
					?>
				</div>
			</div>
		</div>
	</div>
</section>