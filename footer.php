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

		<?php wp_footer(); ?>
	</body>
</html>