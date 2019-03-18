<?php if( have_rows('hero_slider') ): ?>
<div class="hero-slider">
	
	<?php while ( have_rows('hero_slider') ) : the_row(); ?>
	<div class="hero-bg-img" style="background-image: url(<?php the_sub_field('hero_background_image'); ?>);">
		<div class="hero-blurb">
			<div class="blurb-inner">
				<div class="blurb-content">
					<div class="blurb-content-inner">
						
						<!-- BLURB TEXT -->
						<?php if ( get_sub_field('hero_blurb') ) : ?>
						<h1><?php the_sub_field('hero_blurb'); ?></h1>
						<?php endif; ?>
						<?php
						$image = get_sub_field('image_content');
						$size = 'large';
						if ( $image ) : ?>
						<div class="hero-text-img"><?php echo wp_get_attachment_image( $image, $size ); ?></div>
						<?php endif; ?>
						<!-- /BLURB TEXT -->
						
						<?php if( have_rows('hero_button') ): 
							while( have_rows('hero_button') ): the_row();
							$label = get_sub_field('hero_button_label');
							$link = get_sub_field('hero_button_link');
							$externallink = get_sub_field('hero_button_external'); ?>
							
							<!-- BLURB LINK -->
							<?php if( $link ): ?>
							<p class="hero-link">
								<a href="<?php echo $link; ?>"><?php echo $label; ?></a>
							</p>
							<?php endif; ?>
							<!-- /BLURB LINK -->
							
							<!-- BLURB EXTERNAL LINK -->
							<?php if( $externallink ): ?>
							<p class="hero-link">
								<a href="<?php echo $externallink; ?>"><?php echo $label; ?></a>
							</p>
							<?php endif; ?>
							<!-- /BLURB LINK -->
							
							<?php endwhile; 
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	
</div>
<?php else : endif; ?>
