<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambodia_Tour_Guides
 */

get_header();
?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				$i+=1;
				/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/

				?>
				<article id="post-<?php the_ID(); ?>" 
				<?php 
					if(($i+2)%3===0){
						echo 'class="first"';
					}
				?>
				<?php 
					if($i%3===0){
						echo 'class="last"';
						$i=0;
					}
				?>
				
				>
					<?php get_template_part( 'template-parts/content', get_post_type() ); ?>
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php 
				
				if($i%3===0){
					echo '<div class="clear"></div>';
				}

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .container -->
<?php
get_sidebar();
get_footer();
