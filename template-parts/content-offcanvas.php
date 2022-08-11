<?php
/**
 * The template part for displaying offcanvas content
 *
 * For more info: http://lacrosse-3d.com/docs/off-canvas-menu/
 */
?>

<div class="off-canvas" id="off-canvas" data-off-canvas style="display: none;">

	<div class="inner">

		<?php lacrosse_3d_region_nav(); ?>
	
		<?php lacrosse_3d_off_canvas_nav(); ?>
		
		<?php lacrosse_3d_social_links();?>
		
	</div>

	<?php if ( is_active_sidebar( 'offcanvas' ) ) : ?>

		<?php dynamic_sidebar( 'offcanvas' ); ?>

	<?php endif; ?>

</div>
