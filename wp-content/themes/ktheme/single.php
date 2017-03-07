<?php get_header(); ?>
       
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
        $post_type = get_post_type();
            ?>

            <?php if ( get_template_part('templates/single/' . $post_type) ) : ?>

                <?php get_template_part('templates/single/' . $post_type) ;?>

            <?php else : ?>

                <div id="content">

                    <div id="inner-content" class="row">

                        <main id="main" class="large-8 medium-8 columns" role="main">

                            <?php get_template_part( 'parts/loop', 'single' ); ?>

                        </main> <!-- end #main -->
                        
                        <?php get_sidebar(); ?>

                    </div> <!-- end #inner-content -->

                </div> <!-- end #content -->
                
            <?php endif;?>
            
        <?php endwhile; else : ?>
            
            <div id="content">

                <div id="inner-content" class="row">

                    <main id="main" class="large-8 medium-8 columns" role="main">
                        
                        <?php get_template_part( 'parts/content', 'missing' ); ?>
                        
                    </main> <!-- end #main -->
                    
                    <?php get_sidebar(); ?>

                </div> <!-- end #inner-content -->

            </div> <!-- end #content -->    
            
        <?php endif; ?>

<?php get_footer(); ?>