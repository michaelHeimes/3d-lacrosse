<?php
/**
 * Template name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 3D_Lacrosse
 */

get_header();
$fields = get_fields();
?>
	<div class="content">
		<div class="inner-content grid-x grid-padding-x">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<header class="entry-header home-banner">
						<?php 
						$image = get_field('hero_background_image');
						if( !empty( $image ) ): ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
					</header><!-- .entry-header -->
				
					<div class="entry-content">
						<div class="img-copy-card img-right">
							<div class="bg" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/home-hero-bg.svg);"></div>
							<div class="grid-container">
								<div class="grid-x grid-padding-x tablet-flex-dir-row-reverse">
									<?php 
										$hero_image_copy_card = $fields['hero_image_&_copy_card'];
										if( !empty($hero_image_copy_card) ):	
									?>
									<div class="left cell small-12 tablet-6">
										<?php 
											if( !empty($hero_image_copy_card['image']) ):
											$image = $hero_image_copy_card['image'];
										?>
										<div class="img-wrap">
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										</div>
										<?php endif;?>
									</div>
									<div class="right black-bg cell small-12 tablet-6">
										<?php 
											if( !empty($hero_image_copy_card['text']) ):
										?>
										<div class="text-wrap black-bg">
											<?php echo $hero_image_copy_card['text'];?>
										</div>
										<?php endif;?>
									</div>									
									<?php endif;?>
								</div>
							</div>
						</div>
					</div><!-- .entry-content -->
				
					<footer class="entry-footer">

					</footer><!-- .entry-footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();