        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 offset-lg-2 footer__item">
                        <?php 
                        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) : 
                        endif;    
                        ?>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 offset-md-1 offset-lg-0 footer__item">
                        <?php 
                        if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) : 
                        endif;
                        ?>
                    </div>
                    <div class="footer__bottom">
                        <div class="col">
                            <p>Copyright</p>
                            <p>Realisatie door <a href="mailto:cornehuisman@outlook.com" target="_blank">Corné Huisman</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>