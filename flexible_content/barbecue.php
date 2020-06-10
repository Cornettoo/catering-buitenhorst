<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

// Block options
$options = get_sub_field('options');
$image = get_sub_field('image');
?>

<section class="block-tables  padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
					<div class="block block--horizontal">
						<div class="block__content list--check">
							<h3><?php the_sub_field('title'); ?></h3>
							<ul>
								<?php
								while (have_rows('menu')) : the_row();
									?>
									<li><?php the_sub_field('title'); ?></li>
									<?php
								endwhile;
								?>
							</ul>
							<div class="badge badge--green">€ <?php the_sub_field('price'); ?></div>
						</div>
						<figure class="block__image img">
							<img src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>">
						</figure>
					</div>

					<div class="tables">
						<div class="tables__heading">
							<h3><?php the_sub_field('title_extra'); ?></h3>
						</div>
						<div class="tables__wrapper row">
							<?php
							while (have_rows('extra')) : the_row();
								?>
								<div class="tables__table col-12 col-md-4">
									<h5><?php the_sub_field('title'); ?></h5>
									<table>
									<?php
									while (have_rows('options')) : the_row();
										?>
										<tr>
												<td><?php the_sub_field('title'); ?></td>
												<td>€ <?php the_sub_field('price'); ?></td>
										</tr>
										<?php
									endwhile;
									?>
									</table>   
								</div>
								<div class="tables__table col-12 col-md-4">
									<h5><?php the_sub_field('title'); ?></h5>
									<table>
									<?php
									while (have_rows('options')) : the_row();
										?>
										<tr>
												<td><?php the_sub_field('title'); ?></td>
												<td>€ <?php the_sub_field('price'); ?></td>
										</tr>
										<?php
									endwhile;
									?>
									</table>   
								</div>
								<div class="tables__table col-12 col-md-4">
									<h5><?php the_sub_field('title'); ?></h5>
									<table>
									<?php
									while (have_rows('options')) : the_row();
										?>
										<tr>
												<td><?php the_sub_field('title'); ?></td>
												<td>€ <?php the_sub_field('price'); ?></td>
										</tr>
										<?php
									endwhile;
									?>
									</table>   
								</div>
								<div class="tables__table col-12 col-md-4">
									<h5><?php the_sub_field('title'); ?></h5>
									<table>
									<?php
									while (have_rows('options')) : the_row();
										?>
										<tr>
												<td><?php the_sub_field('title'); ?></td>
												<td>€ <?php the_sub_field('price'); ?></td>
										</tr>
										<?php
									endwhile;
									?>
									</table>   
								</div>
								<div class="tables__table col-12 col-md-4">
									<h5><?php the_sub_field('title'); ?></h5>
									<table>
									<?php
									while (have_rows('options')) : the_row();
										?>
										<tr>
												<td><?php the_sub_field('title'); ?></td>
												<td>€ <?php the_sub_field('price'); ?></td>
										</tr>
										<?php
									endwhile;
									?>
									</table>   
								</div>
								<?php
							endwhile;
							?>
						</div>
					</div>
            </div>
        </div>
    </div>
</section>