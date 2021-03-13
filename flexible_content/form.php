<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$form = get_sub_field('form');
?>

<section class="form padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2">
                <h2><?php the_sub_field('title'); ?></h2>
                <?php
                switch($form) {
                    case 'contact':
                        echo do_shortcode('[forminator_form id="3636"]');
                        break;
                    case 'picnic':
								echo do_shortcode('[contact-form-7 id="2481" title="Picknick formulier"]');
                        break;
                    case 'picnic_regular':
								echo do_shortcode('[forminator_form id="2947"]');
                        break;
                    case 'picnic_luxe':
								echo do_shortcode('[forminator_form id="2946"]');
                        break;
                    case 'high_tea':
								echo do_shortcode('[forminator_form id="3612"]');
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</section>
