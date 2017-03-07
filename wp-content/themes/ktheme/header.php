<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
			<!--[if IE]>
				<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
			<![endif]-->
			<meta name="msapplication-TileColor" content="#f01d4f">
			<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
	    	<meta name="theme-color" content="#121212">
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

		<!-- Drop Google Analytics here -->
		<!-- end analytics -->
		<style>
            @media screen and (max-width: 782px){
                html{ margin-top:0!important;
                }
                body.admin-bar .title-bar .menu-icon {
                    top:-46px;
                }
            }
            @media screen and (max-width: 600px) {
                body.admin-bar { margin-top:0!important;
                }
                body.admin-bar .title-bar .menu-icon {
                    top:0;
                }
                html #wpadminbar { margin-top:0!important; position: fixed;
                }
                body.admin-bar .logo_holder {
                    margin-top: 46px;
                }
            }
        </style>

	</head>
	
	<!-- Uncomment this line if using the Off-Canvas Menu --> 
		
	<body <?php body_class(); ?>>

		<div class="off-canvas-wrapper">
							
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<header class="header" role="banner">
						
					 <!-- This navs will be applied to the topbar, above all content 
						  To see additional nav styles, visit the /parts directory -->
	 	             <div class="navbar" data-headroom>
                            <div class="row large-uncollapse medium-uncollapse small-collapse">
                                    <div class="columns collapse large-2 medium-2 small-12">
                                        <div class="logo_holder">
                                                       <?php the_custom_logo();?>
                                        </div>
                                    </div>
                                    <div class="columns collapse large-10 medium-10 small-12">
                                     <!-- This navs will be applied to the topbar, above all content 
                                          To see additional nav styles, visit the /parts directory -->
                                     <?php get_template_part( 'parts/nav', 'title-bar' ); ?>
                                     </div>
                            </div>
		 	        </div>
				</header> <!-- end .header -->
				<?php if(is_home()||is_front_page()):?>
				    <div class="custom-header-media">
                        <?php the_custom_header_markup(); ?>
                    </div>
			    <?php endif;?>