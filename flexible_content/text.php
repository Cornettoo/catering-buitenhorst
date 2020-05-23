<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$options = get_sub_field('options');

// Title
$title = get_sub_field('title');
$titleHeading = get_sub_field('title_heading');
?>

<section class="text padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 text__wrapper list--line">
					<?php
					if ($titleHeading)  {
						?>
						<<?= $titleHeading; ?>><?= $title; ?></<?= $titleHeading; ?>>
						<?php 
					} else {
						?>
						<h2><?= $title; ?></h2>
						<?php
					}
					
                the_sub_field('text'); 
                
                if ($options && in_array('columns', $options)) :
                    ?>
                    <div class="text-columns">
                        <?php
                        while (have_rows('columns')) : the_row();
                            ?>
                            <div class="text-columns__column">
                                <h4><?php the_sub_field('title'); ?></h4>
                                <?php the_sub_field('text'); ?>
                            </div>
                            <?php
                        endwhile;
                        ?>
                    </div>
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
        </div>
    </div>
</section>
