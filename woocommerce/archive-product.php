<?php 
/* Template name: Workshops */

get_header(); 

$post_id = get_option('woocommerce_shop_page_id');
$title = get_the_title($post_id);

$post = get_post($post_id);
$content = wpautop( $post->post_content );
?>

<section class="intro">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xs-12 offset-lg-1 intro__wrapper">
				<h1 class="intro__title"><?php echo $title; ?></h1>

				<div class="intro__content">
					<div class="intro__content__text__wrapper">
						<?php echo $content; ?>
					</div>

					<div class="courses">
						<?php
						
						$args = [
							'post_type'          => 'product',
							'posts_per_page'     => -1,
							'order'              => 'DESC',
						];              
						$posts = get_posts($args);

						foreach ($posts as $key => $post) : 
							setup_postdata($post);
							?>
							<div class="course">
								<h3><?php the_title(); ?></h3>
								<a href="<?php the_permalink(); ?>" class="button button--yellow">Naar workshop</a>
							</div>
							<?php
						endforeach;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php 
get_footer();