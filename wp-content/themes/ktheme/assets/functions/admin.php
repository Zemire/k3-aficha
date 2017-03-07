<?php
// This file handles the admin area and functions - You can use this file to make changes to the dashboard.

/************* DASHBOARD WIDGETS *****************/
// Disable default dashboard widgets
function disable_default_dashboard_widgets() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
    
	// Removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget
}

// Remove unnecessary Menu Items for Client dashboard

function remove_menus(){
		remove_menu_page( 'edit.php' );                   //Posts
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'edit-comments.php' );                  //Tools
}

// Remove New button, Comment counter, WP Logo and Search icon in Admin Bar

function disable_new_content() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('new-content');
		$wp_admin_bar->remove_menu('comments');
		$wp_admin_bar->remove_menu('wp-logo');
		$wp_admin_bar->remove_menu('search');
}

// Remove Add New page button

function modify_menu() {
	  global $submenu;
	  unset($submenu['edit.php?post_type=page'][10]);
}

// Remove Help tab in top

function joints_remove_help_tabs() {
		$screen = get_current_screen();
		$screen->remove_help_tabs();
}

// Apply all actions to Client user role

if (!current_user_can('manage_options')) {
    add_action( 'admin_menu', 'remove_menus' );
    add_action('admin_menu','modify_menu');
    add_action('admin_menu', 'disable_default_dashboard_widgets');
    add_action('admin_head', 'joints_remove_help_tabs');
    add_action( 'wp_before_admin_bar_render', 'disable_new_content' );
}

//Hide Add New button for pages for Editor role
function hide_an_styles() {
    if ( ! current_user_can( 'update_core' ) ) {
    echo '<style type="text/css">
    body.edit-php.post-type-page h1, body.post-php.post-type-page h1 > .page-title-action {display:none;}
    </style>';
    }
}
add_action('admin_head', 'hide_an_styles');

/*
For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// RSS Dashboard Widget
function joints_rss_dashboard_widget() {
	if(function_exists('fetch_feed')) {
		include_once(ABSPATH . WPINC . '/feed.php');               // include the required file
		$feed = fetch_feed('http://jointswp.com/feed/rss/');        // specify the source feed
		$limit = $feed->get_item_quantity(5);                      // specify number of items
		$items = $feed->get_items(0, $limit);                      // create an array of items
	}
	if ($limit == 0) echo '<div>' . __( 'The RSS Feed is either empty or unavailable.', 'jointswp' ) . '</div>';   // fallback message
	else foreach ($items as $item) { ?>

	<h4 style="margin-bottom: 0;">
		<a href="<?php echo $item->get_permalink(); ?>" title="<?php echo mysql2date(__('j F Y @ g:i a', 'jointswp'), $item->get_date('Y-m-d H:i:s')); ?>" target="_blank">
			<?php echo $item->get_title(); ?>
		</a>
	</h4>
	<p style="margin-top: 0.5em;">
		<?php echo substr($item->get_description(), 0, 200); ?>
	</p>
	<?php }
}

// Calling all custom dashboard widgets
function joints_custom_dashboard_widgets() {
	wp_add_dashboard_widget('joints_rss_dashboard_widget', __('Custom RSS Feed (Customize in admin.php)', 'jointswp'), 'joints_rss_dashboard_widget');
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}
// adding any custom widgets
add_action('wp_dashboard_setup', 'joints_custom_dashboard_widgets');

/************* CUSTOMIZE ADMIN *******************/
// Custom Backend Footer
function joints_custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="#" target="_blank">k-3soft</a></span>.', 'jointswp');
}

// adding it to the admin area
add_filter('admin_footer_text', 'joints_custom_admin_footer');