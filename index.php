<?php 
/**
 * Template name: Standaard
 */
get_header(); 
?>

<header class="header header--text" style="background-image: url(<?= get_template_directory_uri(); ?>/assets/img/breakfest.png);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Catering Buitenhorst</h1>
                <h3>Leerbedrijf voor autisme</h3>
                <a href="" class="button button--third">Assortiment</a>
            </div>
        </div>
    </div>
</header>

<?php
if (have_rows('flexible_content')) :
    while (have_rows('flexible_content')) : the_row();
        include('flexible_content/' . get_row_layout() . '.php');
    endwhile;
endif;

get_footer();