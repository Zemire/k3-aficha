<?php
	
// Adding WP Functions & Theme Support
function joints_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );
	
	// Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', 
	         array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	         ) 
	);
	
	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); 
	
	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );
    
    // Custom Header
     add_theme_support( 'custom-header', array(
//      'default-image' => get_template_directory_uri() . '/images/default_bg.png',
      'height'        => '200',
      'flex-height'    => true,
      'uploads'       => true,
      'header-text'   => false,
      'video' => true,
     ) );
    
    // Custom Logo
    add_theme_support( 'custom-logo', array(
//       'height'      => 175,
//       'width'       => 400,
       'flex-width' => true,
    ) );
	
} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );

/* ================================== Add classes ==================== */
function joints_body_classes( $classes ) {
    
    // Add class on front page.
	if ( is_front_page() && 'posts' !== get_option( 'show_on_front' ) ) {
		$classes[] = 'joints-front-page';
	}
    
    // Add a class if there is a custom header.
	if ( has_header_image() ) {
		$classes[] = 'has-header-image';
	}
    
    return $classes;
}

add_filter( 'body_class', 'joints_body_classes' );

add_action('wp_head', 'wp_head_page_id');
function wp_head_page_id(){
    $post = get_post();
}

/* ====================== Adding .svg type support ================== */
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; //Adding svg extension
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

/* ========================== Excerpt support ====================== */
function joints_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'joints_excerpts_to_pages' );


// Stick Admin Bar To The Top
	if (!is_admin()) {
		add_action('get_header', 'my_filter_head');

		function my_filter_head() {
			remove_action('wp_head', '_admin_bar_bump_cb');
		}

		function stick_admin_bar() {
			echo "
			<style type='text/css'>
				body.admin-bar {margin-top:32px !important}
				@media screen and (max-width: 782px) {
					body.admin-bar { margin-top:46px !important }
				}
			</style>
			";
		}

		add_action('admin_head', 'stick_admin_bar');
		add_action('wp_head', 'stick_admin_bar');
	}
/* ================================= ACF JSON SETTINGS ================================ */

function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/jsons/acf-json';
    
    // return
    return $path;
    
}
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    // append path
    $paths[] = get_stylesheet_directory() . '/jsons/acf-json';
    
    // return
    return $paths;
    
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

/* =============================== ADD GLOBAL OPTION ACF ============================== */

function is_field_group_exists($value, $type='post_title') {
        $exists = 0;
        if ($field_groups = get_posts(array('post_type'=>'acf-field-group'))) {
            foreach ($field_groups as $field_group) {
                if ($field_group->$type == $value) {
                    $exists = 1;
                }
            }
        }
        return $exists;
    }
 
    if( function_exists('acf_add_options_page') ) {
 
     acf_add_options_page(array(
         'page_title'    => 'Theme General Settings',
         'menu_title'    => 'Global Options',
         'menu_slug'     => 'theme-general-settings',
         'capability'    => 'edit_posts',
         'redirect'      => false
     ));
 
 }
/*********************** PUT YOU FUNCTIONS BELOW ********************************/

// Custom Image Sizes
if ( ! function_exists( 'custom_image_sizes' ) ){
    function custom_image_sizes() {
        // add_image_size( 'wud-img', 720, 460, array( 'center', 'center' ) );
        // add_image_size( 'cont-img-image', 1000, 9999, false );
        // add_image_size( 'mark-img', 9999, 90, false );
        // add_image_size( 'tablet-image', 1024, 1600, true );
    }
    add_action( 'after_setup_theme', 'custom_image_sizes' );
}

function retinaLogo() {
 	$thumbnail = str_ireplace('.png', '@2x.png', get_header_image());
 	return $thumbnail;
 }

/* ================================= Custom excerpt lenght ========================================= */
function custom_excerpt($limit, $excerpt){
   if( strlen($excerpt) > $limit) {
        $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);
        $excerpt = substr($excerpt, 0, $limit);
        $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
        $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
        $excerpt = $excerpt.'...';
    }
    return $excerpt;
}
// Use this function with 'get_the_' like this: echo custom_excerpt(35, get_the_title()) 

