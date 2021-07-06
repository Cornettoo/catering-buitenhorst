<!DOCTYPE html>
<html lang="nl">
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
							
							<div class="navbar__left">
								<div class="navbar__hamburger">
									<div class="navbar__hamburger-wrapper">
										<div class="navbar__hamburger-bar"></div>
										<span>Menu</span>
									</div>
								</div>

								<ul class="navbar__menu">
									<?php 
									wp_nav_menu(['container' => false, 'theme_location' => 'secondary', 'items_wrap' => '%3$s', 'depth' => 0 ]);
									?>
								</ul>

							</div>

							<div class="navbar__center">
								<a class="navbar__logo" href="<?= get_site_url(); ?>">
									<img src="<?= get_template_directory_uri(); ?>/dist/images/logo.svg" alt="Buitenhorst vers & smakelijk logo">
								</a>
							</div>


							<div class="navbar__right">
								<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">
									<i class="icon-user"></i>
								</a>
								<a href="<?= wc_get_cart_url() ?>" class="cart-total">
									<?php 
									global $woocommerce;
									?>
									<span class="cart-total-count"><?php echo $woocommerce->cart->cart_contents_count; ?></span>
									<i class="icon-bag"></i>
								</a>
							</div>
						</div>
					</div>
            </div>
        </nav>

			<div class="mobile-menu">
				<div class="mobile-menu__wrapper">
						<div class="navbar__hamburger">
							<div class="navbar__hamburger-wrapper">
								<div class="navbar__hamburger-bar navbar__hamburger-bar--close"></div>
								<span>Sluiten</span>
							</div>
						</div>
						<ul>
							<?php 
							wp_nav_menu(['container' => false, 'theme_location' => 'primary', 'items_wrap' => '%3$s', 'depth' => 0 ]);
							?>
						</ul>
				</div>
			</div>