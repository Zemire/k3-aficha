<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post();

        $post_type = get_post_type(); ?>
	
	    <?php if ( get_template_part('templates/archive/' . $post_type) ) : ?>

            <?php get_template_part('templates/archive/' . $post_type) ;?>

        <?php else : ?>
        
            <div id="content">

                <div id="inner-content" class="row">

                    <main id="main" class="large-8 medium-8 columns" role="main">

                        <header>
                            <h1 class="page-title"><?php the_archive_title();?></h1>
                            <?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
                        </header>

                            <!-- To see additional archive styles, visit the /parts directory -->
                            <?php get_template_part( 'parts/loop', 'archive' ); ?>
                            
                    </main> <!-- end #main -->

                    <?php get_sidebar(); ?>

                </div> <!-- end #inner-content -->
                        
            </div> <!-- end #inner-content -->
            
        <?php endif;?>

    <?php endwhile; ?>	

        <?php joints_page_navi(); ?>

    <?php else : ?>
                            
            <div id="content">

                <div id="inner-content" class="row">

                    <main id="main" class="large-8 medium-8 columns" role="main">

                        <header>
                            <h1 class="page-title"><?php the_archive_title();?></h1>
                            <?php the_archive_description('<div class="taxonomy-description">', '</div>');?>
                        </header>

                            <?php get_template_part( 'parts/content', 'missing' ); ?>

                    </main> <!-- end #main -->

                    <?php get_sidebar(); ?>

                </div> <!-- end #inner-content -->

            </div> <!-- end #content -->
        
    <?php endif;?>
        
<?php get_footer(); ?>