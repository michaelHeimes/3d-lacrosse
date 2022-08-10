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
			<div class="cell small-12 large-10 large-offset-1">
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
									$post_link_slug = $post->post_name;
									$pages = get_pages('child_of=' . $post->ID);
									
									if ( count($pages) > 0) {
										
										$child_args = array(
											'child_of' => $post->ID,
											'parent' => $post->ID
										);
										
										$pages = get_pages($child_args);												
									
									};
								?>

									<div class="cell shrink relative">
										<?php if (count($pages) > 0 && get_field('remove_from_sitemap')):?>
											<button data-toggle="dropdown-for-<?php echo $loop_ID;?>"><?php the_title(); ?></button>
											<div class="dropdown-pane" id="dropdown-for-<?php echo $loop_ID;?>" data-dropdown data-hover="true" data-hover-pane="true" data-auto-focus="true" data-position="bottom" data-alignment="right" data-hover-delay="0" data-closing-time="0">
												<ul class="menu">
												<?php
												foreach ($pages as $page):?>
												
													<li<?php if( $loop_ID ==  $post->ID):?> class="is-active-page"<?php endif;?>><a href="<?php echo get_permalink($page->ID);?>"><?php echo $page->post_title;?></a></li>
												
  												<?php endforeach;?>
												</ul>
											</div>
	
										<?php elseif ($parent->ID == $loop_ID):?>
											<div><?php $title = get_the_title($parent->ID);  echo $title;?></div>
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