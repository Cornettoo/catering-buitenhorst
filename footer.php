        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 footer__item">
                        <?php 
                        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : 
                        endif;    
                        ?>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-3 footer__item">
                        <?php 
                        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : 
                        endif;
                        ?>
                    </div>
                    <div class="col-sm-6 col-lg-4 col-xl-5 footer__item footer__item-sc-rv">
                        <div class="social">
                            <a href="<?php the_field('instagram', 'options'); ?>" target="_blank">
                                <i class="icon-instagram"></i>
                            </a>
                            <a href="<?php the_field('facebook', 'options'); ?>" target="_blank">
                                <i class="icon-facebook"></i>
                            </a>
                        </div>
                        <div class="reviews">
                            <h3><?= __('Wat klanten zeggen', 'catering'); ?></h3>
                            <?php 
                            if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) : 
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-12 footer__bottom">
                        <div class="footer__bottom__wrapper">
                            <p><?= __('Copyright Catering Buitenhorst', 'catering'); ?></p>
                            <p><?= __('Realisatie', 'catering'); ?>: <a href="mailto:c.huisman@accepta.eu">Accepta</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>