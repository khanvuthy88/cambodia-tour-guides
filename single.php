<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Cambodia_Tour_Guides
 */

get_header();
?>
<div style="clear: both;position: relative;"></div>
<?php if (have_posts()): ?>
	<?php while (have_posts()) {
		the_post();
		?>
		<div class="single-post-summary clear">
			<div class="container clear">
				
				<?php 
					$images = get_field('_images_gallery');
					$size = 'post-thumbnail'; // (thumbnail, medium, large, full or custom size)
					if( $images ): ?>
						<div class="post-slider">
							<div class="flexslider">
								<ul class="slides">
									<?php foreach( $images as $image ): ?>
										<li>
											<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</div>
					<?php else: ?>
						<?php cambodia_tour_guides_post_thumbnail(); ?>
					<?php endif ?>


				<div class="content-summary">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<?php 
					if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							cambodia_tour_guides_posted_on();
							cambodia_tour_guides_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
					<p class="tour-price">
						<i class="icon-usd"></i> Tour Price : 
						<?php if (get_field('_tour_price')){ 
							echo '$ '.number_format(get_field('_tour_price'),2); 
						}else{
							echo 'N/A';
						} ?>
					</p>
					<p class="tour-duration">
						<i class="icon-time"></i> Duration : <?php if (get_field('_tour_duration')): the_field('_tour_duration'); else: echo 'N/A';endif ?>
					</p>
					<p class="tour_summary">
						<?php cambodia_tourguides_com_tags();?>
					</p>
					<?php the_excerpt(); ?>
				</div>
				<div style="clear: both;position: relative;"></div>
			</div>
		</div>
	<div class="container clear">
		<div id="primary" class="content-area clear">
			<main id="main" class="site-main">
				<?php 
					get_template_part( 'template-parts/content', 'single' );

					// the_post_navigation();
					// Get related post
					$related=cambodia_tour_guides_get_related_posts(get_the_ID(), 3);
					if ( $related->have_posts() ):
						?>
						<div class="related-posts">
							<h1 class="page-title">Related posts</h1>
								<?php while ( $related->have_posts() ): $related->the_post(); ?>
									<?php $i+=1; ?>
									<article id="post-<?php the_ID(); ?>" <?php if(($i+2)%3===0){ echo 'class="first"'; } ?>
										<?php 
											if($i%3===0){ echo 'class="last"';$i=0;}?>>
										<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
									</article>
								<?php endwhile; ?>
						</div>
						<?php
					endif;
					wp_reset_postdata();

					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) :
					// 	comments_template();
					// endif;
			 	?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
	</div>
	<?php } ?>
<?php endif ?>


<?php

get_footer();
