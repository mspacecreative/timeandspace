<?php $loop = new WP_Query( array( 'post_type' => 'case_studies', 'order' => 'ASC') ); 
if ( $loop->have_posts() ) : ?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<div class="service-bucket-container">
			  			
		<div class="service-bg">
			<div class="service-description">
				<h1><?php the_title(); ?></h1>
				<p><?php the_excerpt(); ?></p>
			</div>
			<div class="service-button">
				<a href="<?php the_permalink(); ?>" class="et_pb_button">Learn More</a>
			</div>  				
		</div>
					  			
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
		if (has_post_thumbnail( $post->ID ) ) { ?>
		<div class="service-bucket" style="background: url('<?php echo $image; ?>') no-repeat center center;">
		<?php } else { ?>
		<div class="service-bucket" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/backgrounds/case-studies.jpg); padding-bottom: 0;">
		<?php } ?>
			<div class="colour-overlay"></div>
		</div>
		
	</div>
	
<?php endwhile;
endif;
wp_reset_postdata(); ?>