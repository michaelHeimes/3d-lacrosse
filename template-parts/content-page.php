<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 3D_Lacrosse
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
	<?php get_template_part('template-parts/content-defaut-banner');?>

	<div class="entry-content">
		<?php get_template_part('template-parts/loop-modules');?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
