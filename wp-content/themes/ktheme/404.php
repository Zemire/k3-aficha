<?php get_header(); ?>
			
	<div id="content">

		<div id="inner-content" class="row">
	
			<main id="main" class="large-8 medium-8 columns" role="main">

				<article id="content-not-found">
				
					<header class="article-header">
						<h1><?php _e( 'Epic 404 - Article Not Found', 'jointswp' ); ?></h1>
					</header> <!-- end article header -->
			        <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    ?>
					<section class="entry-content">
                       
                        <?php if($image[0]):?>
					    <a class="not-found" href="<?php bloginfo('url'); ?>"><img src="<?php echo $image[0] ; ?>"></a>
					    <?php endif;?>
					    
						<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'jointswp' ); ?></p>
					</section> <!-- end article section -->

					<section class="search">
					    <p><?php get_search_form(); ?></p>
					</section> <!-- end search section -->
			
				</article> <!-- end article -->
	
			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>