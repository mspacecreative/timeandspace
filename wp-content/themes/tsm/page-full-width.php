<?php
/* Template Name: Full Width */
get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">

	<div class="container">
		<div class="cpt-header-area">
			<?php 
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
			if ( get_field( 'taller_header_image' ) ) :
			if (has_post_thumbnail( $post->ID ) ) { ?>
			<div class="et_pb_section" style="padding-bottom: 40%; height: 0; padding-top: 0;">
			<?php echo the_post_thumbnail('header-tall'); ?>
			<?php } else { ?>
			<div class="et_pb_section" style="padding-bottom: 40%; height: 0; padding-top: 0;">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/backgrounds/case-studies-tall.jpg" />
			<?php } 
			else : 
			if (has_post_thumbnail( $post->ID ) ) { ?>
			<div class="et_pb_section" style="padding-bottom: 25%; height: 0; padding-top: 0;">
			<?php echo the_post_thumbnail('header'); ?>
			<?php } else { ?>
			<div class="et_pb_section" style="padding-bottom: 25%; height: 0; padding-top: 0;">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/backgrounds/case-studies.jpg" />
			<?php }
			endif; ?>
				<?php if ( get_field('hide_page_title') ): ?>
				<div class="et_pb_row hide-page-title" style="padding-bottom: 0;">
					<?php if ( get_field( 'taller_header_image' ) ) : ?>
					<div class="cpt-title">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
					<?php else: ?>
					<div class="cpt-title">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
					<?php endif; ?>
				</div>
				<?php else : ?>
				<div class="et_pb_row" style="padding-bottom: 0;">
					<div class="cpt-title">
						<h1>
							<?php the_title(); ?>
						</h1>
					</div>
				</div>
				<?php endif; ?>
			</div> 
		</div>
		<div id="content-area" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
			
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
				<?php if ( ! $is_page_builder_used ) : ?>
			
				<div class="cus-container">
					<h1 class="entry-title main_title"><?php the_title(); ?></h1>
				</div>
							<?php
								$thumb = '';
			
								$width = (int) apply_filters( 'et_pb_index_blog_image_width', 1080 );
			
								$height = (int) apply_filters( 'et_pb_index_blog_image_height', 675 );
								$classtext = 'et_featured_image';
								$titletext = get_the_title();
								$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
								$thumb = $thumbnail["thumb"];
			
								if ( 'on' === et_get_option( 'divi_page_thumbnails', 'false' ) && '' !== $thumb )
									print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height );
							?>
			
							<?php endif; ?>
			
								<div class="entry-content">
								<?php
									the_content();
			
									if ( ! $is_page_builder_used )
										wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
								?>
								</div> <!-- .entry-content -->
			
							<?php
								if ( ! $is_page_builder_used && comments_open() && 'on' === et_get_option( 'divi_show_pagescomments', 'false' ) ) comments_template( '', true );
							?>
			
			</article> <!-- .et_pb_post -->
			
			<?php endwhile; ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

</div> <!-- #main-content -->

<?php get_footer(); ?>