<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');
?>

<section class="faq padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 faq__header">
                <h2><?php get_sub_field('title'); ?></h2>
            </div>
            <div class="faq__content">
                <?php
                $faq_object = get_sub_field('faq');
                
                foreach ($faq_object as $post) : 
                    setup_postdata($post);
                    $i++;
                    ?>
                    <div class="faq__accordion">
                        <div class="faq__title">
                            <a href="#accordion-<?= $i; ?>">
                                <div class="toggle-icon">
                                    <span></span>
                                    <span></span>
                                </div>
                                <h5><?php the_title(); ?></h5>
                            </a>
                        </div>
                        <div id="accordion-<?= $i; ?>" class="faq__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php
                    wp_reset_postdata();
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>