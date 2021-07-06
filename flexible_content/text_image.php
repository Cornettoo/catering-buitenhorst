<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$options = get_sub_field('options');

// Title
$title = get_sub_field('title');
$image = get_sub_field('image');
?>

<section class="text-image margin-top--<?= $padding_top; ?> margin-bottom--<?= $padding_bottom; ?>">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 col-lg-7 col-xl-6 text-image__text text">
				<h2><?= $title; ?></h2>
				<?php
				the_sub_field('text'); 
				
				if ($options && in_array('button', $options)) :
					$button = get_sub_field('button');
					?>
					<a href="<?= $button['url']; ?>" target="<?= $button['target']; ?>" class="button button--primary"><?= $button['title']; ?></a>
					<?php
				endif;
				?>
			</div>
			<div class="col-12 col-md-6 col-lg-5 col-xl-4 offset-xl-1 text-image__image">
				<?php echo wp_get_attachment_image($image, 'large'); ?>
			</div>
		</div>
	</div>
	<?php 
	if ($options && in_array('show_brand', $options)) :
		?>
		<img class="text-image__icon" src="<?= get_template_directory_uri(); ?>/dist/images/logo-icon.png" alt="Buitenhorst vers & smakelijk logo icoon">
		<?php
	endif;
	?>
</section>
