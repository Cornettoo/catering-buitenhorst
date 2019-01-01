<?php
add_action('init', 'create_redvine_faq');
function create_redvine_faq() {
    $labels = [
        'name' => _x('Veelgestelde vragen', 'faq'),
        'singular_name' => _x('Veelgestelde vragen', 'faq'),
        'add_new' => _x('Nieuwe vraag', 'faq'),
        'add_new_item' => __('Nieuwe vraag'),
        'edit_item' => __('Bewerk vraag'),
        'new_item' => __('Nieuwe vraag'),
        'view_item' => __('Bekijk vraag'),
        'search_items' => __('Zoek naar vraag'),
        'not_found' =>  __('Geen vraag gevonden'),
        'not_found_in_trash' => __('Geen vraag gevonden'),
        'parent_item_colon' => ''
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-format-status',
        'hierarchical' => false,
        'menu_position' => 20,
        'rewrite' => ['slug' => 'veelgestelde-vragen'],
        'supports' => ['title','thumbnail','revisions', 'editor', 'page-attributes']
    ];
    register_post_type('faq', $args);
}
