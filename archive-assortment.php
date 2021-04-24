<?php 
/**
 * Template name: Assortiment
 */
get_header(); 
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

<section class="categories categories--<?= $sort_cats; ?> padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row">
            <?php
            if ($sort_cats == 'edited') {
                ?>
                <div class="col-12 col-lg-10 offset-lg-1 categories__wrapper">
                    <?php
                    while (have_rows('categories_edited')) : the_row();
                        $image = get_sub_field('image');
                        $icon = get_sub_field('icon');
                        ?>
                        <div class="categories__item">
                            <a href="<?php the_sub_field('link'); ?>">
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
                        <?php
                    endwhile;
                    ?>
                </div>
                <?php
                } else {    
                    $cats = get_sub_field('categories');
                    $all_cats = $cats['all_categories'];

                    if ($all_cats == 'no') {
                        $terms = $cats['select_categories'];
                    } else {
                        $terms = get_terms([
                            'taxonomy' => 'assortment-category',
                            'hide_empty' => false,
                        ]);
                    }
                    ?>
                    <div class="col-12 categories__wrapper">
                        <?php
                        foreach ($terms as $term) :
                            $image = get_field('image', $term);
                            ?>
                            <div class="categories__item">
                                <a href="<?php the_field('link', $term); ?>">
                                    <figure class="img">
                                        <img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
                                    </figure>
                                    <div class="categories__item__title">
                                        <h3><?= $term->name; ?></h3>
                                    </div>
                                </a>
                            </div>
                            <?php
                        endforeach;
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();