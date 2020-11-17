<?php 
function hooliCustomPostTypes(){
    register_post_type('event', array(
        'supports' => array(
            'title', 'editor', 'excerpt', 'thumbnail'
        ),
        'taxonomies' => array('category'),
        'has_archive' => true,
        'public' => true,
        'show_in_rest' => true,
        'labels' => array(
            'name' => 'Events',
            'add_new_item' => 'Add new Event',
            'edit_item' => 'Edit Event',
            'all_items' => 'All Events',
            'singular_name' => 'Event'
        ),
        'menu_icon' => 'dashicons-calendar-alt'
    ));
}

add_action('init', 'hooliCustomPostTypes');