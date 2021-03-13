<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$options = get_sub_field('options');
?>

<section class="title-icon padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
	<div class="container">
		<div class="title-icon__wrapper">
			<?php
			while (have_rows('title_icon')) : the_row();
				$icon = get_sub_field('icon');
				?>
				<div class="item">
						<i class="icon-<?= $icon; ?>"></i>
						<h4><?php the_sub_field('title'); ?></h4>
				</div>
				<?php
			endwhile;
			?>
		</div>
	</div>
</section>