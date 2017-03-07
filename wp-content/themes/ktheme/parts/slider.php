<?php if( $rows = get_field('slider') ) :?>
<section class="slider">
    <?php foreach( $rows as $row ):?>
        <?php if( $row['image']):?>
            <div class="slider_item" style="background-image: url('<?php echo $row['image'];?>');">
                <?php if( $row['title'] ||  $row['content'] ):?>

                <div class="container">

                    <?php if( $row['title'] ) : ?>
                        <h2><?php echo $row['title'];?></h2>
                    <?php endif;?>

                    <?php if( $row['content'] ) : ?>
                        <p><?php echo $row['content'];?></p>
                    <?php endif;?>

                </div>

                <?php endif;?>
            </div>
        <?php endif;?>
    <?php endforeach;?>
</section>
<?php endif;?>