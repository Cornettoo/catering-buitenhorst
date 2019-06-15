<?php

//Register widgets
function register_widgets() {
    if ( function_exists('register_sidebars') ) {
        register_sidebar([
            'name' => 'Footer Widget 1',
            'id' => 'footer1',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3 class="footertitle">',
            'after_title' => '</h3>',
        ]);
        register_sidebar([
            'name' => 'Footer Widget 2',
            'id' => 'footer2',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3 class="footertitle">',
            'after_title' => '</h3>',
        ]);
        register_sidebar([
            'name' => 'Footer Widget 3',
            'id' => 'footer3',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3 class="footertitle">',
            'after_title' => '</h3>',
        ]);
        register_sidebar([
            'name' => 'Footer Widget 4',
            'id' => 'footer4',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3 class="footertitle">',
            'after_title' => '</h3>',
        ]);
        register_sidebar([
            'name' => 'Widget',
            'id' => 'widget',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
        ]);
    }
}
add_action( 'widgets_init', 'register_widgets' );
