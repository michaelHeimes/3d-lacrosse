<?php 
	global $post;
	$page_id = get_the_id();
?>
<div class="child-sibling-links">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell small-12">
				<div class="page-nav">
				
					<div class="grid-x grid-margin-x align-justify">
			
					<?php
					
					$args = array(
						'post_type'      => 'page',
						'posts_per_page' => -1,
						'post_parent'    => $post->ID,
		 			);
					
					
					$parent = new WP_Query( $args );
					
					if ( $parent->have_posts() ) : ?>
					
						<div class="cell shrink">
							<span><?php the_title(); ?></span>
						</div>
					
						<?php while ( $parent->have_posts() ) : $parent->the_post(); ?>
												
						<?php $post_link_slug = $post->post_name;?>
						
							<div class="cell shrink">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</div>
										
						<?php endwhile; ?>
					
					<?php endif; wp_reset_postdata(); ?>	
					
					</div>	
					
				</div>
			</div>
		</div>
	</div>
</div>