<?php
// Calling your own login css so you can style it
//function joints_login_css() {
    wp_enqueue_style( 'joints_login_css', get_template_directory_uri() . '/assets/css/login.css', false );
//}

// changing the logo link from wordpress.org to your site
function joints_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function joints_login_title() { return get_option('blogname'); }

// Customize Login Screen
	function joints_login_styling() { 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
    $default_logo = get_template_directory_uri() . '/images/custom-logo.png';
?>
		<style type="text/css">
            <?php if( $image[0] || $default_logo ) : ?>
			.login #login h1 a {
				background-image: url('<?php echo ($image[0]) ? $image[0] : $default_logo; ?>');
			}
            <?php endif;?>
		   body.login{
			   background-color: #<?php echo get_background_color(); ?>;
			   background-image: url('<?php echo get_header_image(); ?>') !important;
		   };

		</style>
	<?php }

// calling it only on the login page
//add_action( 'login_enqueue_scripts', 'joints_login_css', 10 );
add_action( 'login_enqueue_scripts', 'joints_login_styling' );

add_filter('login_headerurl', 'joints_login_url');
add_filter('login_headertitle', 'joints_login_title');
