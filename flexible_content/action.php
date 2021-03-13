<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

$image = get_sub_field('image');
$button = get_sub_field('button');
?>

<section class="action padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
   <div class="container">
		<div class="action__wrapper">
			<div class="action__wrapper__content text">
				<h2><?php the_sub_field('title'); ?></h2>
				<?php the_sub_field('text'); ?>
				<a href="<?= $button['url']; ?>" target="<?= $button['target']; ?>" class="button button--primary"><?= $button['title']; ?></a>
			</div>
			<div class="action__wrapper__image">
				<span class="badge-round"><?php the_sub_field('text_round'); ?></span>
				<?php echo wp_get_attachment_image($image, 'large'); ?>
			</div>
		</div>
   </div>
</section>