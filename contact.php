<?php 
/**
 * Template name: Contact
 */
get_header(); 

// Image
$image = get_field('header_image');
?>

<header class="header header--image" style="background-image: url(<?= $image['url']; ?>)"></header>

<section class="contact padding-top--large padding-bottom--large">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-5 offset-lg-1 col--info">
                <h2><?php the_field('title_info') ?></h2>
                <?php the_field('text_info'); ?>
                <br />
                <h3><?php the_field('title_times'); ?></h3>
                <table class="times">
                    <?php
                    while (have_rows('times')) : the_row();
                        ?>
                        <tr>
                            <td><b><?php the_sub_field('day'); ?></b></td>
                            <td><?php the_sub_field('time'); ?></td>
                        </tr>
                        <?php
                    endwhile;
                    ?>
                </table>
                <p><b><?php the_field('text_times'); ?></b></p>
            </div>
            <div class="col-12 col-md-6 col-lg-5 col--form form">
                <h2><?php the_field('title_form') ?></h2>
                <?= do_shortcode('[contact-form-7 id="207" title="Contactformulier"]'); ?>
            </div>
        </div>
    </div>
</section>

<section class="newsletter padding-top--none padding-bottom--large">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="newsletter__wrapper">
                    <div class="newsletter__text">
                        <h3><?php the_field('title_news'); ?></h3>
                        <p><?php the_field('text_news'); ?></p>
                    </div>
                    <div class="newsletter__form form">
                        <form action="https://cateringbuitenhorst.us17.list-manage.com/subscribe/post?u=8cfce515236d967c115874406&amp;id=35c6a82138" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="E-mailadres" required>
                                <button type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button button--submit"><i class="icon-arrow"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();