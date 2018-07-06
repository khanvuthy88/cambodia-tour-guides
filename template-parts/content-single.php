<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambodia_Tour_Guides
 */

?>	
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php if ( is_singular() ) :
			echo '<p itemprop="description">'.the_content().'</p>';
		else :
			echo wp_trim_words( get_the_excerpt(), 15, '...' );
		endif;

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'cambodia-tourguides-com' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article>
