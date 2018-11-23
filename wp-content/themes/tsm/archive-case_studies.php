<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div class="cpt-header-area">
			<?php 
			if (get_field('case_study_archive_header_img') ) : ?>
			<div class="et_pb_section" style="background-image: url(<?php the_field('case_study_archive_header_img'); ?>); padding-bottom: 0;">
			
			<?php else : ?>
			<div class="et_pb_section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/backgrounds/case-studies.jpg); padding-bottom: 0;">
			
			<?php endif; ?>
				<div class="et_pb_row" style="padding-bottom: 0;">
					<?php if ( get_field( 'taller_header_image' ) ) : ?>
					<div class="cpt-title" style="padding-top: 40%;">
						<h1>
							<?php _e('Case Studies'); ?>
						</h1>
					</div>
					<?php else: ?>
					<div class="cpt-title">
						<h1>
							<span class="hide-on-mobile">Case<br />Study</span>
							<span class="hide-on-desktop"><?php _e('Case Study'); ?></span>
							<?php the_title(); ?>
						</h1>
					</div>
					<?php endif; ?>
				</div>
			</div> 
		</div>
		<div id="content-area" class="clearfix">
			<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post(); ?>
			
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
			
									<div class="service-container-wrap">
									  	<div class="service-container-wrap-inner clearfix">
										  		<div class="service-bucket-container clearfix">
										  			
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
										  				<div class="colour-overlay" style="background-color: <?php the_sub_field('colour_overlay'); ?>;"></div>
										  			</div>
										  		</div>
									  	</div>
									</div>
								</article> <!-- .et_pb_post -->
							<?php endwhile; else:
						endif; ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php

get_footer();
