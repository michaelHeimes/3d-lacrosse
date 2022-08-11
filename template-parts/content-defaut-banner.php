<header class="entry-header banner text-center black-bg relative">
	<div class="bg" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/bp-banner-bg.svg);"></div>
	<div class="relative">
		
		<?php 		
		global $post;
		
		//$parent_ID = $post->post_parent;
		$parent_data = get_post($post->post_parent);
		$parent_slug = $parent_data->post_name;		
		$current = get_post($post->ID);
		
		if($current->post_parent){      
			  $parent = get_post($current->post_parent);
			  $image = get_field('logo', $parent->ID);
			  if($parent->post_parent){
					$grandparent = get_post($parent->post_parent);
					$image = get_field('logo', $grandparent->ID);
			  }
		} else {
			$image = get_field('logo');
		}
		
		
		if( !empty( $image ) ): ?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
		<?php endif; ?>
		
		<h1>
			<?php 
				if( is_page_template('page-templates/page-roster.php') && $parent_slug == 'boys' ) {
					echo 'Boys Roster';
				} elseif( is_page_template('page-templates/page-roster.php') && $parent_slug == 'girls' ) {
					echo 'Girls Roster';
				} elseif( $alt_title = get_field('alternative_banner_heading') ) {
					echo $alt_title;
				} else {
					echo the_title();
				}
			?>
		</h1>
		
		<?php get_template_part('template-parts/nav-banner-nav');?>
	</div>
	
</header><!-- .entry-header -->