<?php
// Options
$options = get_sub_field('options');

if ($options && in_array('text', $options)) {
    $header_type = 'text';
} else {
    $header_type = 'image';
}

// Image
$image = get_sub_field('image');
?>

<header class="header header--<?= $header_type; ?>" style="background-image: url(<?= $image['url']; ?>)">
    <div class="container">
			<?php
			if ($options && in_array('text', $options)) :
				?>
				<h1><?php the_sub_field('title'); ?></h1>
				<?php
			endif;

			if ($options && in_array('button', $options)) :
				$button = get_sub_field('button');
				?>
				<a href="<?= $button['url']; ?>" target="<?= $button['target']; ?>" class="button button--primary"><?= $button['title']; ?></a>
				<?php
			endif;
			?>
    </div>
</header>

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