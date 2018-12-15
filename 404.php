<?php
get_header();
?>

<section class="error_404">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <h1>Oops..</h1>
                <p>Het lijkt er op dat je een pagina geopend hebt die niet bestaat. Klik op de onderstaande button om naar de home te gaan.</p>
                <a href="<?= get_site_url(); ?>" class="button button--yellow">Homepagina</a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();