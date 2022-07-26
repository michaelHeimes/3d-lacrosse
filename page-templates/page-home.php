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
			
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							
						</header><!-- .entry-header -->
					
					
						<div class="entry-content">
							<?php
							the_content();
					
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lacrosse-3d' ),
									'after'  => '</div>',
								)
							);
							?>
						</div><!-- .entry-content -->
					
						<?php if ( get_edit_post_link() ) : ?>
							<footer class="entry-footer">
								<?php
								edit_post_link(
									sprintf(
										wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
											__( 'Edit <span class="screen-reader-text">%s</span>', 'lacrosse-3d' ),
											array(
												'span' => array(
													'class' => array(),
												),
											)
										),
										wp_kses_post( get_the_title() )
									),
									'<span class="edit-link">',
									'</span>'
								);
								?>
							</footer><!-- .entry-footer -->
						<?php endif; ?>
					</article><!-- #post-<?php the_ID(); ?> -->
			
				</main><!-- #main -->
					
			</div>
		</div>
	</div>

<?php
get_footer();