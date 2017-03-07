<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/dist/what-input.min.js', array(), '', true );
    
    // Fancybox 3.0
    wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/vendor/fancybox/dist/jquery.fancybox.min.css', false );
    wp_enqueue_script( 'fancybox-js', get_template_directory_uri() . '/vendor/fancybox/dist/jquery.fancybox.min.js', array(), '', true );
    
    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/assets/js/foundation.js', array( 'jquery' ), '6.2.3', true );
    
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );
   
    // adding main font
    wp_enqueue_style('Roboto', 'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900', false);
    wp_enqueue_style('Roboto-Condensed', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700', false);
    
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
    
    // google maps
//    wp_enqueue_script( 'google.maps.api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDKMuWpxF5bodwR_s8u6KL3NF5xq3-BneU&v=3.exp', null, null, true );
//    wp_enqueue_script( 'googlemaps-acf-js', get_template_directory_uri() . '/assets/js/googlemaps-acf.min.js', array( 'jquery' ), '', true );
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

// google maps
//function my_acf_init() {
//    acf_update_setting('google_api_key', 'AIzaSyDKMuWpxF5bodwR_s8u6KL3NF5xq3-BneU');
//}
//
//add_action('acf/init', 'my_acf_init');