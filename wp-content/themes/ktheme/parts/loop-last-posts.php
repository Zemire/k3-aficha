<?php $obj = get_post_type_object( get_post_type() );
$slug =  get_post_type();
$used_id = array();
$used_id[] = get_the_ID();
$arg = array(
                    'post_type'	     => $slug,
                    'order'=>'DESC',
                    'posts_per_page' => 3,
                    'post__not_in' => $used_id
                );
$the_query = new WP_Query( $arg );?>

<?php if ( $the_query->have_posts() ) : ?>

<div class="row">
  
   <?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
    <div class="columns large-12 medium-6 small-12">
        <div class="unit">
            <?php if(has_post_thumbnail()): ?>
            <div class="thumb-wrap">
                <img src="<?php the_post_thumbnail(); ?>" alt="">
            </div>
            <?php endif; ?>
            <div class="title matchHeight_title">
                <?php the_title(); ?>
            </div>
            <a href="<?php the_permalink();?>" class="main_btn"><?php _e('Learn more', 'jointswp');?></a>            
        </div>
    </div>
    <?php endwhile;?>
    
</div>

<?php endif;?>

