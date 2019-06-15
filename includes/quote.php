<?php

add_action('init', 'create_redvine_quote');
function create_redvine_quote() {
    $labels = [
        'name' => _x('Quotes', 'quotes'),
        'singular_name' => _x('Quotes', 'quotes'),
        'add_new' => _x('Nieuwe quote', 'quotes'),
        'add_new_item' => __('Nieuwe quote'),
        'edit_item' => __('Bewerk quote'),
        'new_item' => __('Nieuwe quote'),
        'view_item' => __('Bekijk quote'),
        'search_items' => __('Zoek naar quote'),
        'not_found' =>  __('Geen quote gevonden'),
        'not_found_in_trash' => __('Geen quote gevonden'),
        'parent_item_colon' => ''
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-format-quote',
        'hierarchical' => false,
        'menu_position' => 20,
        'supports' => ['title','thumbnail','revisions', 'editor', 'page-attributes']
    ];
    register_post_type('quote', $args);
}