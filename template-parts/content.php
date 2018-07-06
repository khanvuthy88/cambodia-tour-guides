<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambodia_Tour_Guides
 */

?>


	<?php cambodia_tour_guides_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
		
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				cambodia_tour_guides_posted_on();
				cambodia_tour_guides_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	

	<div class="entry-content">
		<?php 
			echo wp_trim_words( get_the_excerpt(), 15, '...' );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cambodia-tourguides-com' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer clear"> -->
		<!-- <?php cambodia_tour_guides_entry_footer(); ?> -->
	<!-- </footer> --><!-- .entry-footer -->
