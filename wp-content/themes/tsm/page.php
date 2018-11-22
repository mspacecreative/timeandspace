<?php

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

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
					<?php if ( get_field( 'taller_header_image' ) ) : ?>
					<div class="cpt-title" style="padding-top: <?php the_field('taller_header_image'); ?>%;">
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
			</div> 
		</div>
		<div id="content-area" class="clearfix">
			<div id="left-area">

			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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

			</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->

</div> <!-- #main-content -->

<?php get_footer(); ?>