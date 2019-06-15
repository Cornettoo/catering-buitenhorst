<?php
// Block padding
$padding_top = get_sub_field('padding_top');
$padding_bottom = get_sub_field('padding_bottom');

$image = get_sub_field('image');
$button = get_sub_field('button');
?>

<section class="action padding-top--<?= $padding_top; ?> padding-bottom--<?= $padding_bottom; ?>">
   <div class="container">
      <div class="row">
         <div class="col-12 col-lg-10 offset-lg-1">
            <div class="action__wrapper">
               <div class="action__wrapper__image" style="background-image: url(<?= $image['url']; ?>);"></div>
               <div class="action__wrapper__content">
                  <p><?php the_sub_field('title'); ?></p>
                  <div class="action__prices">
                     <span><?= __('Van', 'catering'); ?></span>
                     <div class="badge badge--white">€ <?php the_sub_field('old_price'); ?></div> 
                     <span><?= __('Nu', 'catering'); ?></span>
                     <div class="badge badge--white badge--scaled">€ <?php the_sub_field('dicount_price'); ?></div>
                  </div>
                  <a href="<?= $button['url']; ?>" target="<?= $button['target']; ?>" class="button button--third"><?= $button['title']; ?></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>