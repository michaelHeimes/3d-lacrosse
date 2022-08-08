<?php 
	global $post;
	$current = get_post($post->ID);
	if($current->post_parent){      
		  $parent = get_post($current->post_parent);
		  if($parent->post_parent){
				$grandparent = get_post($parent->post_parent);
		  }
	}
?>
<div class="child-sibling-links">
	<div class="grid-container">
		<div class="grid-x grid-margin-x">
			<div class="cell small-12">
				<div class="page-nav">
				
					<div class="grid-x grid-margin-x align-justify">

						<?php
							if($parent && !$grandparent) {
								$args = array(
									'post_type'      => 'page',
									'posts_per_page' => -1,
									'post_parent'    => $parent->ID,
		 						);
							}
							elseif($parent && $grandparent) {
								$args = array(
									'post_type'      => 'page',
									'posts_per_page' => -1,
									'post_parent'    => $grandparent->ID,
								 );
							}	
							else {
								$args = array(
									'post_type'      => 'page',
									'posts_per_page' => -1,
									'post_parent'    => $post->ID,
								 );
							}					
							
							$loop = new WP_Query( $args );

							if ( $loop->have_posts() ) : ?>
							
								<?php if($parent && !$grandparent){?>
								
									<div class="cell shrink">
										<a href="<?php the_permalink($parent->ID); ?>" title="<?php the_title($parent->ID); ?>"><?php $title = get_the_title($parent->ID); echo $title; ?></a>
									</div>
									
								<?php } elseif($parent && $grandparent) { ?>
								
									<div class="cell shrink">
										<a href="<?php the_permalink($grandparent->ID); ?>" title="<?php the_title($grandparent->ID); ?>"><?php $title = get_the_title($grandparent->ID); echo $title; ?></a>
									</div>
									
								<?php } else { ?>
								
									<div class="cell shrink">
										<span><?php the_title(); ?></span>
									</div>
									
								<?php };?>
								
							

							
								<?php while ( $loop->have_posts() ) : $loop->the_post(); 
									$loop_ID = get_the_ID();
								?>
								
								
									<?php $post_link_slug = $post->post_name;?>
									
									<div class="cell shrink">
										<?php if($current->ID == $loop_ID || get_field('remove_from_sitemap') ):?>
											<span><?php the_title(); ?></span>
											<?php elseif ($parent->ID == $loop_ID):?>
										<?php elseif ($parent->ID == $loop_ID):?>
											<span><?php $title = get_the_title($parent->ID);  echo $title;?></span>
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