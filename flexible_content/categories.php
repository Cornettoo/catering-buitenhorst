<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$options = get_sub_field('options');
$sort_cats = get_sub_field('sort_categories');
?>

<section class="categories categories--<?= $sort_cats; ?> padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row">
            <?php
            if ($sort_cats == 'edited') {
                ?>
                <div class="col-12 col-lg-10 offset-lg-1 categories__wrapper">
                    <?php
                    $total_rows = count(get_sub_field('categories_edited'));
                    while (have_rows('categories_edited')) : the_row();
                        $i++;
                        $image = get_sub_field('image');
                        $icon = get_sub_field('icon');
                        if ($total_rows >= 5) {
                            $class_last_three = $i >= 3 ? ' categories__item--small' : '';
                        }
                        ?>
                        <div class="categories__item<?= $class_last_three; ?>">
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
                        'taxonomy' => 'assortment-categories',
                        'hide_empty' => true,
                    ]);
                }
                ?>
                <div class="col-12 categories__wrapper">
                    <?php
                    foreach ($terms as $term) :
                        $image = get_field('image', $term);
                        ?>
                        <div class="categories__item">
                            <a href="<?= esc_url(get_term_link($term)); ?>">
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
</section>