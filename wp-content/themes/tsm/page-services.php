<?php
/*
Template Name: Services Page
*/
?>

<?php

get_header();


?>

<div id="main-content">

	<div class="container">
		<div class="cpt-header-area">
			<?php 
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
			if (has_post_thumbnail( $post->ID ) ) { ?>
			<div class="et_pb_section" style="background-image: url(<?php echo $image ?>); padding-bottom: 0;">
			<?php } else { ?>
			<div class="et_pb_section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/backgrounds/case-studies.jpg); padding-bottom: 0;">
			<?php } ?>
				<div class="et_pb_row" style="padding-bottom: 0;">
					<div class="cpt-title">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
				</div>
			</div> 
		</div>
		<div id="content-area">
			<div class="service-container-wrap">
			  	<div class="service-container-wrap-inner clearfix">
			  		<?php if( have_rows('service_bucket') ):
			  		      	while ( have_rows('service_bucket') ) : the_row(); ?>
			  		<div class="service-bucket-container clearfix">
			  			<div class="service-bucket" style="background: url('<?php the_sub_field('bucket_background_image'); ?>') no-repeat center center;">
			  				<div class="colour-overlay" style="background-color: <?php the_sub_field('colour_overlay'); ?>;"></div>
			  			</div>
			  			
			  			<div class="service-bg">
			  				<div class="service-description">
			  					<h1><?php the_sub_field('bucket_title'); ?></h1>
			  					<?php if( get_sub_field('bucket_description') ): ?>
			  						<p><?php the_sub_field('bucket_description'); ?></p>
			  					<?php endif; ?>
			  				</div>
			  				<div class="service-button">
			  					<a href="<?php the_sub_field('bucket_cta_button'); ?>" class="et_pb_button">Learn More</a>
			  				</div>
			  			</div>
			  			
			  		</div>
			  		<?php endwhile; else : endif; ?>
			  	</div>
			</div>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

</div> <!-- #main-content -->

<?php get_footer(); ?>