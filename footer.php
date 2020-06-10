		<footer class="footer">
        	<div class="container">
        		<div class="row">
        			<div class="col-12 col-sm-6 col-lg-3 footer__item">
						  <h3><?php the_field('footer_title_first', 'options'); ?></h3>
						  <ul>
							  <?php
							while (have_rows('footer_links', 'options')) : the_row();
								$link = get_sub_field('link');
								?>
								<li>
									<a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
								</li>
								<?php
							endwhile;
							?>
						  </ul>
        			</div>
        			<div class="col-12 col-sm-6 col-lg-3 footer__item">
        				<h3><?php the_field('footer_title', 'options'); ?></h3>
        				<ul>
        					<?php
							while (have_rows('links', 'options')) : the_row();
								$link = get_sub_field('link');
								?>
								<li>
									<a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>"><?= $link['title']; ?></a>
								</li>
								<?php
							endwhile;
							?>
        				</ul>
        			</div>
        			<div class="col-12 col-sm-6 col-lg-3 footer__item">
        				<?php 
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : 
						endif;
						?>
        			</div>
        			<div class="col-12 col-sm-6 col-lg-3 footer__item footer__item-sc-rv">
        				<div class="reviews">
        					<h3><?= __('Wat klanten zeggen', 'catering'); ?></h3>
        					<?php 
							if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : 
							endif;
							?>
        				</div>
        				<div class="social">
        					<a href="<?php the_field('instagram', 'options'); ?>" target="_blank">
        						<i class="icon-instagram"></i>
        					</a>
        					<a href="<?php the_field('facebook', 'options'); ?>" target="_blank">
        						<i class="icon-facebook"></i>
        					</a>
        				</div>
        			</div>
        			<div class="col-12 footer__bottom">
        				<div class="footer__bottom__wrapper">
        					<p><?= __('Copyright Catering Buitenhorst', 'catering'); ?></p>
        					<p><?= __('Realisatie', 'catering'); ?>: <a href="https://accepta.eu" target="_blank">Accepta</a></p>
        				</div>
        			</div>
        		</div>
        	</div>
		</footer>


		<div id="popup-newsletter" class="popup">
			<div class="popup__wrapper">
				<div class="popup__close">Sluiten</div>
				<div class="popup__image">
					<figure class="image">
						<?php
						$imageId = get_field('news_image', 'options');
						$image = wp_get_attachment_image($imageId, 'full');

						echo $image;
						?>
					</figure>
				</div>
				<div class="popup__info">
					<h3><?php the_field('news_title', 'options'); ?></h3>
					<?php the_field('news_text', 'options'); ?>

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

		<?php wp_footer(); ?>
	</body>
</html>