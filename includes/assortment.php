<?php
add_action('init', 'create_redvine_assortment');
function create_redvine_assortment() {
    $labels = [
        'name' => _x('Assortiment', 'assortment'),
        'singular_name' => _x('Assortiment', 'assortment'),
        'add_new' => _x('Product toevoegen', 'assortment'),
        'add_new_item' => __('Nieuw product'),
        'edit_item' => __('Bewerk product'),
        'new_item' => __('Nieuw product'),
        'view_item' => __('Bekijk product'),
        'search_items' => __('Zoek naar product'),
        'not_found' =>  __('Geen product(en) gevonden'),
        'not_found_in_trash' => __('Geen product(en) gevonden'),
        'parent_item_colon' => ''
    ];
    $args = [
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'menu_icon' => 'dashicons-carrot',
        'hierarchical' => false,
        'menu_position' => 20,
        'has_archive' => false,
        'rewrite' => ['slug' => 'assortiment/%assortment-categories%'],
        'supports' => ['title','thumbnail','revisions', 'editor', 'page-attributes']
    ];
    register_post_type('assortment', $args);
}

register_taxonomy('assortment-categories',
    ['assortment'],
    [
        'hierarchical' => true,
        'labels' => [
            'name'=>'Categorieën',
            'add_new_item'=>'Nieuwe categorie'
        ],
        'singular_label' => __( 'Field' ),
        'rewrite' => ['slug' => 'assortiment'],
    ]
);

add_filter('post_type_link', 'assortment_permalink_structure', 10, 4);
function assortment_permalink_structure($post_link, $post) {
    if (false !== strpos($post_link, '%assortment-categories%')) {
        $event_type_term = get_the_terms($post->ID, 'assortment-categories');

        if ($event_type_term) 
            $post_link = str_replace( '%assortment-categories%', array_pop( $event_type_term )->slug, $post_link );
    }
    return $post_link;
}