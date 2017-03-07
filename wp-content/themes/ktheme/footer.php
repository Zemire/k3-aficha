				<footer class="footer" role="contentinfo">
                    <div class="row">
                        <div class="large-12 medium-12 small-12 columns">
                            
                            <?php if(is_active_sidebar('footer_sidebar')) : ?>
                                <?php  dynamic_sidebar('footer_sidebar'); ?>
                            <?php endif;?>
                            
                        </div>
                    </div>
					<div id="inner-footer" class="row">
						<div class="large-12 medium-12 columns">
							<nav role="navigation">
	    						<?php joints_footer_links(); ?>
	    					</nav>
	    				</div>
						<div class="large-6 medium-6 small-12 columns">
							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
						</div>
						<div class="large-6 medium-6 small-12 columns">
							<?php if($rows = get_field('social_icons', 'option')):?>
                                <div class="social_icons_holder">
                                    <?php foreach( $rows as $row ):?>
                                        <?php if ($row['icon'] && $row['link'] && $row['background']):
                                        ?>
                                            <a href="<?= $row['link'];?>" class="social_icon" style="background:<?= $row['background'];?>;" target="_blank"><?= $row['icon'];?></a>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            <?php endif;?>
						</div>
					</div> <!-- end #inner-footer -->
				</footer> <!-- end .footer -->
			</div>  <!-- end .main-content -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->