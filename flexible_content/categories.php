<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$sort_cats = get_sub_field('sort_categories');
?>

<section class="categories padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row categories__wrapper">
		  <?php
            if ($sort_cats == 'edited') {
					$total_rows = count(get_sub_field('categories_edited'));
					$i = 0;
					while (have_rows('categories_edited')) : the_row();
						$i++;
						$image = get_sub_field('image');
						$icon = get_sub_field('icon');
						$options = get_sub_field('options');
						?>
						<div class="col-12 col-sm-6 col-md-4">
							<div class="categories__item">
								<?php
								if ($options == 'link') {
									?>
									<a href="<?php the_sub_field('link'); ?>">
									<?php
								} else {
									$term = get_term(get_sub_field('cat_link'), 'product_cat');
									$term_link = get_term_link( $term );
									?>
									<a href="<?= $term_link; ?>">
									<?php
								}
								?>
									<figure class="img">
										<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
									</figure>
									<div class="categories__item__title">
										<h3><?php the_sub_field('title'); ?></h3>
										<div class="icon">
											<i class="icon-<?= $icon; ?>"></i>
											<i class="icon-arrow"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
						<?php
					endwhile;
            } else {    
					$cats = get_sub_field('categories');
					$all_cats = $cats['all_categories'];

					if ($all_cats == 'no') {
						$terms = $cats['select_categories'];
					} else {
						$terms = get_terms([
							'taxonomy' => 'product_cat',
							'hide_empty' => true,
						]);
					}

					foreach ($terms as $term) :
						$icon = get_field('icon', $term);
						$thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
						$image = wp_get_attachment_image_src( $thumbnail_id, 'large' );
						?>
						<div class="col-12 col-sm-6 col-md-4">
							<div class="categories__item">
								<a href="<?= esc_url(get_term_link($term)); ?>">
									<figure class="img">
										<img src="<?= $image[0]; ?>" alt="<?= $term->name; ?>">
									</figure>
									<div class="categories__item__title">
										<h3><?= $term->name; ?></h3>
										<?php 
										if ($icon != 'none' && $icon != NULL) {
											?>
											<div class="icon">
												<i class="icon-<?= $icon; ?>"></i>
												<i class="icon-arrow"></i>
											</div>
											<?php
										}
										?>
									</div>
								</a>
							</div>
						</div>
						<?php
					endforeach;
            }
            ?>
        </div>
    </div>
</section>