<?php $number_of_posts = get_field('case_studies_posts_homepage'); ?>
<?php $loop = new WP_Query( array( 'post_type' => 'case_studies', 'order' => 'ASC' ) );
		if ( $loop->have_posts() ) : ?>
		
		<div class="case-studies-home-container">
	        <?php $i = 0; while ( $loop->have_posts() && $i < $number_of_posts) : $loop->the_post(); ?>
			
			<div class="case-studies-content-container">
				
				<div class="case-studies-content">
					<div class="case-studies-label"><?php _e('Case Study'); ?></div>
					<h2><?php the_title(); ?></h2>
					<?php the_excerpt(); ?>
					<a style="margin-top: 20px;" class="et_pb_button" href="<?php the_permalink(); ?>"><?php _e('Read More'); ?></a>
				</div>
				
				<?php 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
				if (has_post_thumbnail( $post->ID ) ) { ?>
				<div class="case-studies-feature-img" style="background-image: url(<?php echo $image ?>);">
					<div class="colour-overlay"></div>
				</div>
				<?php } else { ?>
				<div class="case-studies-feature-img" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/backgrounds/case-studies.jpg);">
					<div class="colour-overlay"></div>
				</div>
				<?php }?>
				
			</div>
	        
	        
	        <?php $i++; endwhile; ?>
		</div>
        <?php endif; 
        
 wp_reset_postdata(); ?>