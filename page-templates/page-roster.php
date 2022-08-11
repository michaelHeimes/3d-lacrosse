<?php
/**
 * Template name: Roster Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 3D_Lacrosse
 */
 
get_header();
$fields = get_fields();

global $post;
$current = get_post($post->ID);
if($current->post_parent){      
	  $parent = get_post($current->post_parent);
	  if($parent->post_parent){
			$grandparent = get_post($parent->post_parent);
	  }
}

?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php get_template_part('template-parts/content-defaut-banner');?>
				
					<div class="entry-content">
					
						<div class="hero-bottom">
							<?php get_template_part('template-parts/modules/part-image-copy-card');?>
						</div>
						
						<section>
							<div class="grid-container">
								<div class="top grid-x grid-padding-x">
									<div class="left cell small-12 tablet-3">
										<h2><?php the_title();?></h2>
									</div>
									<div class="cell right small-12 tablet-9">
										<button class="h3 black-bg grid-x grid-padding-x" data-toggle="dropdown-for-teams">
											<div class="cell auto">Select a Team</div>
											<div class="shrink">
												<svg xmlns="http://www.w3.org/2000/svg" width="15.679" height="9.253" viewBox="0 0 15.679 9.253">
											  	<path id="Path_798" data-name="Path 798" d="M0,0,7.132,7.132,0,14.265" transform="translate(14.972 0.707) rotate(90)" fill="none" stroke="#fff" stroke-width="2"/>
												</svg>
											</div>
										</button>
										<div class="dropdown-pane" id="dropdown-for-teams" data-dropdown data-auto-focus="true" data-position="bottom" data-alignment="right" data-hover-delay="0" data-closing-time="0" data-close-on-click="true">
											<ul class="menu">
											<?php
												$args = array(
													'post_type'      => 'page',
													'posts_per_page' => -1,
													'post_parent'    => $parent->ID,
													'post__not_in'   => array( get_the_ID() ),
												);
												
												$loop = new WP_Query( $args );
											
												if ( $loop->have_posts() ) : 
													while ( $loop->have_posts() ) : $loop->the_post(); ?>
											
													<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php $title = get_the_title(); echo $title; ?></a></li>
											
												<?php endwhile; endif; wp_reset_postdata(); ?>
											
											<?php
											foreach ($pages as $page):?>
											
												<li<?php if( $loop_ID ==  $post->ID):?> class="is-active-page"<?php endif;?>><a href="<?php echo get_permalink($page->ID);?>"><?php echo $page->post_title;?></a></li>
											
											  <?php endforeach;?>
											</ul>
										</div>
									</div>
								</div>
								<div class="grid-x grid-padding-x">
									<div class="left cell small-12 tablet-3">
										<?php 
											if( $coaches = $fields['coaches'] ):
											foreach($coaches as $coach):
										?>
										<div class="coach grid-x grid-padding-x align-middle">
											<?php if( $image = $coach['photo'] ):?>
											<div class="cell shrink">
												<div class="img-wrap">
													<img src="<?php echo $image['sizes']['team-photo']; ?>" width="75px" height="75px" alt="<?php echo $image['caption']; ?>" />
												</div>
											</div>
											<?php endif;?>
											<div class="right cell<?php if( $image = $coach['photo'] ):?> auto<?php else:?> small-12<?php endif;?>">
												<h3 class="h4"><?php echo $coach['name'];?></h3>
												<p><?php echo $coach['title'];?></p>
											</div>	
										</div>
										<?php endforeach; endif;?>
									</div>		
									
									<div class="cell right small-12 tablet-9">
										<div class="table-wrap">
											<?php $roster_shortcode = get_post_meta($post->ID,'roster_shortcode',true);
											echo do_shortcode($roster_shortcode);?>
										</div>
									</div>

								</div>
							</div>
						</section>
					
					</div><!-- .entry-content -->
				
					<footer class="entry-footer">

					</footer><!-- .entry-footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();