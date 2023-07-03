<?php
function couplesforchrist_post_types(){

    // Homepage Slideshow
    register_post_type('slideshow', array(
      'supports' => array('title', 'editor'),
      'public' => true,
      'labels' => array(
          'name' => 'Homepage Slideshow',
          'add_new_item' => 'Add New Slideshow',
          'edit_item' => 'Edit Slideshow',
          'all_items' => 'All Slideshow',
          'singular_name' => 'Slideshow'
      ),
      'menu_icon' => 'dashicons-welcome-view-site'
    ));

    // Organisation page
    register_post_type('organisation', array(
        'show_in_rest'=> true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('slug' => 'organisation'),
        'has_archive' => true,
        'public' => true,
        'labels' => array(
            'name' => 'Organisation',
            'add_new_item' => 'Add New Organi',
            'edit_item' => 'Edit Organisation',
            'all_items' => 'All Organisation',
            'singular_name' => 'Organisation'
        ),
        'menu_icon' => 'dashicons-networking'
    ));

    // Event page
    register_post_type('event', array(
        'capability_type'     => 'event',
        'map_meta_cap'        => true,
        'show_in_rest'        => true,
        'supports'            => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite'             => array('slug' => 'events'),
        'has_archive'         => true,
        'public'              => true,
        'labels'              => array(
                                    'name' => 'Events',
                                    'add_new_item' => 'Add New Event',
                                    'edit_item' => 'Edit Event',
                                    'all_items' => 'All Events',
                                    'singular_name' => 'Event'
                                ),
        'menu_icon'           => 'dashicons-calendar-alt'
    ));

    // testimonials
    register_post_type('testimonial', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'testimonials'),
        'has_archive' => true,
        'public'=> true,
        'labels' => array(
          'name' => 'Testimonials',
          'add_new_item' => 'Add New Testimonial',
          'edit_item' => 'Edit Testimonial',
          'all_items' => 'All Testimonials',
          'singular_name' => 'Testimonial'
        ),
        'menu_icon' => 'dashicons-admin-comments'
    ));

    // socmin
    register_post_type('social_ministry', array(
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite' => array('slug' => 'social-ministry'),
        'has_archive' => true,
        'public'=> true,
        'labels' => array(
          'name' => 'Social Ministry',
          'add_new_item' => 'Add New Social Ministry',
          'edit_item' => 'Edit Social Ministry',
          'all_items' => 'All Social Ministry',
          'singular_name' => 'Social Ministry'
        ),
        'menu_icon' => 'dashicons-universal-access',
    ));
}

add_action('init','couplesforchrist_post_types');

// Adding taxonomies for the recipes post type
function taxonomies_social_ministry(){
    $labels = array(
        'name'              => _x( 'Social Ministry Activities', 'taxonomy general name' ),
        'singular_name'     => _x( 'Social Ministry Activity', 'taxonomy singular name' ),
        'search_items'      => __( 'Social Ministry Activity'),
        'popular_items'     => __( 'Popular Activity'),
        'all_items'         => __( 'All Activities'),
        'parent_item'       => null,
        'parent_item_colon' => null,
        'edit_item'         => __( 'Edit Activity' ), 
        'update_item'       => __( 'Update Activity' ),
        'add_new_item'      => __( 'Add New Activity' ),
        'new_item_name'     => __( 'New Activity Name' ),
        'menu_name'         => __( 'Activities' ),
      );      

    register_taxonomy('activity', array('social_ministry'),  array(
        'show_in_rest' => true,
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'activity' )
    ));
}

add_action('init', 'taxonomies_social_ministry', 0);