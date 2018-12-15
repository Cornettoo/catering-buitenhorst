<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title ><?php wp_title( '|', true, 'right' ); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <nav class="navbar navbar--fixed-top">
            <div class="container">
                <div class="row">
                    <div class="navbar__wrapper col-12">
                        <a class="navbar__logo" href="<?= get_site_url(); ?>">
                           <img src="<?= get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Catering Buitenhorst logo">
                        </a>
                        
                        <ul class="navbar__menu">
                            <?php 
                            wp_nav_menu(['container' => false, 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'depth' => 0 ]);
                            ?>
                        </ul>

                        <div class="navbar__button">
                            <a href="" class="button button--primary">Broodjes</a>
                        </div>
                    </div>

                    <div class="navbar__hamburger col-4 col-sm-4 d-lg-none d-lg-none">
                        <div class="navbar__hamburger-wrapper">
                            <div class="navbar__hamburger-bar"></div>
                        </div>
                    </div>
                  </div>
              </div>
        </nav>
        <div class="mobile-menu col-sm-12 d-lg-none">
            <div class="mobile-menu__wrapper">
                <ul>
                    <?php 
                    wp_nav_menu(['container' => false, 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'depth' => 0]);
                    ?>
                </ul>
            </div>
        </div>