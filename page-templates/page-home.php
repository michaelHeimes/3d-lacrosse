<?php
/**
 * Template name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 3D_Lacrosse
 */

get_header();
?>
	<div class="content">
		<div class="grid-container">
			<div class="inner-content grid-x grid-padding-x">

				<main id="primary" class="site-main">
			
					<?php
					while ( have_posts() ) :
						the_post();
			
						get_template_part( 'template-parts/content', 'page' );
			
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
			
					endwhile; // End of the loop.
					?>
			
				</main><!-- #main -->
					
			</div>
		</div>
	</div>

<?php
get_footer();