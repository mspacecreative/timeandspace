<?php $loop = new WP_Query( array( 'post_type' => 'case_studies', 'order' => 'ASC' ) );
		if ( $loop->have_posts() ) : ?>
		
		<div class="case-studies-home-container">
	        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<div class="case-studies-content-container">
				<?php 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
				if (has_post_thumbnail( $post->ID ) ) { ?>
				<div class="case-studies-feature-img" style="background-image: url(<?php echo $image ?>);">
					
				</div>
				<?php } else { ?>
				<div class="case-studies-feature-img" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/backgrounds/case-studies.jpg);">
					
				</div>
				<?php }?>
				<div class="case-studies-content">
					<div class="case-studies-label"><?php _e('Case Study'); ?></div>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					<a style="margin-top: 20px;" class="et_pb_button" href="<?php the_permalink(); ?>"><?php _e('Read More'); ?></a>
				</div>
			</div>
	        
	        
	        <?php endwhile; ?>
		</div>
        <?php endif; 
        
 wp_reset_postdata(); ?>