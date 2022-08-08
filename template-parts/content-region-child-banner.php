<header class="entry-header banner text-center black-bg">
	<div class="bg" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/bp-banner-bg.svg);"></div>
	<div class="relative">
		
		<?php 
		$parent_ID = $post->post_parent;
		$image = get_field('logo', $parent_ID);
		if( !empty( $image ) ): ?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?>
		
		<h1><?php echo the_title();?></h1>
		
		<?php get_template_part('template-parts/part-sibling-links');?>
	</div>
	
</header><!-- .entry-header -->