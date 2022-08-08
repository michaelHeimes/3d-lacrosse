<?php 
	global $post;
	$parent_ID = $post->post_parent;
	$page_ID = get_the_ID();
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
							'post_parent'    => $parent_ID,
		 				);
						
						
						$parent = new WP_Query( $args );
						
						if ( $parent->have_posts() ) : ?>
						
							<div class="cell shrink">
								<a href="<?php the_permalink($parent_ID); ?>" title="<?php the_title($parent_ID); ?>"><?php $title = get_the_title($parent_ID); echo $title; ?></a>
							</div>
						
							<?php while ( $parent->have_posts() ) : $parent->the_post(); 
								$loop_ID = get_the_ID();
							?>
							
							
							<?php $post_link_slug = $post->post_name;?>
							
							<div class="cell shrink">
								<?php if($page_ID == $loop_ID ):?>
									<span><?php the_title(); ?></span>
								<?php else:?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								<?php endif;?>
							</div>

							<?php endwhile; ?>
						
						<?php endif; wp_reset_postdata(); ?>	
						
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>