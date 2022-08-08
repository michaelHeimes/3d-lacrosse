<?php
/**
 * Template name: Boys / Girls Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 3D_Lacrosse
 */
 
get_header();
$fields = get_fields();
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php get_template_part('template-parts/content-region-child-banner');?>
				
					<div class="entry-content">
					
						<div class="hero-bottom">
							<?php get_template_part('template-parts/modules/part-image-copy-card');?>
						</div>
						
						<section>
							<div class="grid-container">
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
													<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="75px"/>
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