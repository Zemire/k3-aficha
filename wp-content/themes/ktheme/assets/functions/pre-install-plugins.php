<?php
// Allow custom host for install plugins
//add_filter( 'http_request_host_is_external', 'allow_my_custom_host', 10, 3 );
//function allow_my_custom_host( $allow, $host, $url ) {
//  if ( $url == 'http://wp.k-3soft.com:81')
//    $allow = true;
//  return $allow;
//}

// Install Recommended plugins

	function my_theme_register_required_plugins() {
		$plugins = array(
			/** This is an example of how to include a plugin pre-packaged with a theme */
			array(
				'name'     => 'Advanced Custom Fields Pro (b3JkZXJfaWQ9OTMxNTd8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE2LTExLTA3IDE1OjE2OjU5)', // The plugin name
				'slug'     => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name)
				'source'   => 'http://k-3soft.com/wp-content/themes/kthreesoft/downplugin/advanced-custom-fields-pro.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Gravity Forms (f4e3d84bdc10137cdad31f96472164fb)', // The plugin name
				'slug'     => 'gravity-forms', // The plugin slug (typically the folder name)
				'source'   => 'http://k-3soft.com/wp-content/themes/kthreesoft/downplugin/gravityforms_2.1.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Gravity Forms ACF field', // The plugin name
				'slug'     => 'gf-acf', // The plugin slug (typically the folder name)
				'source'   => 'http://k-3soft.com/wp-content/themes/kthreesoft/downplugin/gf-acf.zip', // The plugin source
				'required' => false,
			),
            array(
				'name'     => 'Advanced Custom Fields: Font Awesome', // The plugin name
				'slug'     => 'advanced-custom-fields-font-awesome', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/advanced-custom-fields-font-awesome.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Custom Post Type UI', // The plugin name
				'slug'     => 'custom-post-type-ui', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/custom-post-type-ui.1.5.2.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Login LockDown', // The plugin name
				'slug'     => 'login-lockdown', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/login-lockdown.1.7.1.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'WordPress SEO by Yoast', // The plugin name
				'slug'     => 'wordpress-seo', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/wordpress-seo.4.4.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Google Analytics by Yoast', // The plugin name
				'slug'     => 'google-analytics-for-wordpress', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/google-analytics-for-wordpress.6.0.13.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'WordPress Duplicator', // The plugin name
				'slug'     => 'duplicator', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/duplicator.1.1.34.zip', // The plugin source
				'required' => false,
			),
            array(
				'name'     => 'Duplicate Post', // The plugin name
				'slug'     => 'duplicate-post', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/duplicate-post.3.1.2.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'Simple Page Ordering', // The plugin name
				'slug'     => 'simple-page-ordering', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/simple-page-ordering.2.2.4.zip', // The plugin source
				'required' => false,
			),
			array(
				'name'     => 'WP Smush', // The plugin name
				'slug'     => 'wp-smushit', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/wp-smushit.2.5.3.zip', // The plugin source
				'required' => false,
			),
            array(
				'name'     => 'Regenerate Thumbnails', // The plugin name
				'slug'     => 'regenerate-thumbnails', // The plugin slug (typically the folder name)
				'source'   => 'https://downloads.wordpress.org/plugin/regenerate-thumbnails.zip', // The plugin source
				'required' => false,
			)
		);
		tgmpa( $plugins );
	}
	add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );