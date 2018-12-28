<?php 
/**
 * Template name: Standaard
 */
get_header(); 

if (have_rows('flexible_content')) :
    while (have_rows('flexible_content')) : the_row();
        include('flexible_content/' . get_row_layout() . '.php');
    endwhile;
endif;

get_footer();