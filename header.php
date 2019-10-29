<!DOCTYPE html>
<html lang="nl">
    <head>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KBVD2QS');</script>
        <!-- End Google Tag Manager -->

        <meta charset="utf-8">
        <title ><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KBVD2QS"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        
        <nav class="navbar navbar--fixed-top">
            <div class="container">
                <div class="row">
                    <div class="navbar__wrapper col-12">
                        <a class="navbar__logo" href="<?= get_site_url(); ?>">
                           <img src="<?= get_template_directory_uri(); ?>/dist/images/logo.svg" alt="Catering Buitenhorst logo">
                        </a>
                        
                        <ul class="navbar__menu">
                            <?php 
                            wp_nav_menu(['container' => false, 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'depth' => 0 ]);
                            ?>
                        </ul>

                        <div class="navbar__button">
                            <?php
                            $term = get_term(14, 'assortment-categories');
                            $term_link = get_term_link($term);
                            ?>
                            <a href="<?= $term_link; ?>" class="button button--primary"><?= __('Broodjes', 'buitenhorst'); ?></a>
                        </div>

                        <div class="navbar__hamburger">
                            <div class="navbar__hamburger-wrapper">
                                <div class="navbar__hamburger-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div class="mobile-menu">
            <div class="mobile-menu__wrapper">
                <div class="container">
                    <ul>
                        <?php 
                        wp_nav_menu(['container' => false, 'theme_location' => 'secondary', 'items_wrap' => '%3$s', 'depth' => 0]);
                        ?>
                    </ul>
                </div>
            </div>
        </div>