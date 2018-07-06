<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambodia_Tour_Guides
 */

get_header();
?>

	<div class="about-content">
		<div class="container">
		<h1>About us</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
	</div>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>
			<header>
				<h1 class="page-title">Lastest</h1>
			</header>
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

<?php
get_sidebar();
get_footer();
