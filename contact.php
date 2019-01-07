<?php 
/**
 * Template name: Contact
 */
get_header(); 

// Image
$image = get_field('header_image');
?>

<header class="header header--image" style="background-image: url(<?= $image['url']; ?>)"></header>

<section class="contact padding-top--large padding-bottom--none">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5 offset-lg-1 col--info">
                <h2><?php the_field('title_info') ?></h2>
                <?php the_field('text_info'); ?>
                <br />
                <h3><?php the_field('title_times'); ?></h3>
                 <div class="times">
                    <table>
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
                 </div>
                <p><b><?php the_field('text_times'); ?></b></p>
            </div>
            <div class="col-12 col-lg-5 col--form form">
                <h2><?php the_field('title_form') ?></h2>
                <?= do_shortcode('[contact-form-7 id="207" title="Contactformulier"]'); ?>
            </div>
        </div>
    </div>
</section>

<section class="newsletter padding-top--large padding-bottom--large">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="newsletter__wrapper">
                    <div class="newsletter__text">
                        <h3><?php the_field('title_news'); ?></h3>
                        <p><?php the_field('text_news'); ?></p>
                    </div>
                    <div class="newsletter__form">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();