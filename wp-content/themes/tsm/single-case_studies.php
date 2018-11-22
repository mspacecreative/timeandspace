<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div class="container">
		<div class="cpt-header-area">
			<?php 
			if (get_field('page_header_bg_img') ) : ?>
			<div class="et_pb_section" style="background-image: url(<?php the_field('page_header_bg_img'); ?>); padding-bottom: 0;">
			
			<?php else : ?>
			<div class="et_pb_section" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/backgrounds/case-studies.jpg); padding-bottom: 0;">
			
			<?php endif; ?>
				<div class="et_pb_row" style="padding-bottom: 0;">
					<?php if ( get_field( 'taller_header_image' ) ) : ?>
					<div class="cpt-title" style="padding-top: 40%;">
						<h1>
							<span class="hide-on-mobile">Case<br />Study</span>
							<span class="hide-on-desktop"><?php _e('Case Study'); ?></span>
							<?php the_title(); ?>
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
			<?php while ( have_posts() ) : the_post(); ?>
			<?php if (et_get_option('divi_integration_single_top') <> '' && et_get_option('divi_integrate_singletop_enable') == 'on') echo(et_get_option('divi_integration_single_top')); ?>
							
				<div class="cpt-inner">
					<!-- THE CHALLENGE / THE SOLUTION -->
					<div class="cpt-content-section">
						<div class="cpt-content-row clearfix display-fex">
							<div class="the_summary_section">
								<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' . $additional_class ); ?>>
									<h2><?php _e('Summary'); ?></h2>
									<?php the_content(); ?>
								</article> <!-- .et_pb_post -->
							</div>
							<div class="the_challenge_section">
								<h2><?php _e('Challenge'); ?></h2>
								<?php if ( get_field('the_challenge') ):
									the_field('the_challenge');
								endif; ?>
							</div>
						</div>
					</div>
					<!-- /THE CHALLENGE / THE SOLUTION -->
					
					<div class="cpt-content-section cpt-content-section-solution">
						<div class="cpt-content-row clearfix display-flex">
							
							<div class="the_solution_section">
								<h2><?php _e('Solution'); ?></h2>
								<?php if ( get_field('the_solution') ):
									the_field('the_solution');
								endif; ?>
							</div>
							
							<?php 
							$images = get_field('solution_gallery');
							$size = 'large'; // (thumbnail, medium, large, full or custom size)
							
							if( $images ): ?>
							<div class="solution_carousel">
							    <?php foreach( $images as $image ): ?>
							    <div>
									<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
							    </div>
							    <?php endforeach; ?>
							</div>
							<?php endif; ?>
							
						</div>
						<div class="cpt-content-row">
							<div class="the_results_section">
								<h2><?php _e('Results'); ?></h2>
								<?php if ( get_field('the_results') ):
									the_field('the_results');
								endif; ?>
							</div>
						</div>
					</div>
					
					<!-- PAGINATION -->
					<div class="post-navigation">
						<div class="cpt-content-row clearfix">
							<div class="half prev-link">
								<?php previous_post_link('%link', 'Previous Case Study'); ?>
							</div>
							<div class="half next-link">
								<?php next_post_link('%link', 'Next Case Study'); ?>
							</div>
						</div>
					</div>
					<!-- END PAGINATION -->
					
				</div>
			
			<?php endwhile; ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>