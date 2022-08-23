<?php
/**
 * Template name: Region Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 3D_Lacrosse
 */
 
get_header();
$fields = get_fields();
$page_id = get_the_ID();
$region_title = get_the_title();
$image = get_field('logo');
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
							
						<?php 
							$image_copy_card2 = get_field('cloned_image_copy_card2')['image_copy_card'];
							if( !empty($image_copy_card2) ):
								$layout = $image_copy_card2['layout'];
						?>
						<section class="img-copy-card type-text-btn <?php echo $layout;?>">
							<div class="grid-container">
								<div class="grid-x grid-padding-x<?php if($layout == 'image-right'):?> tablet-flex-dir-row-reverse<?php endif;?> align-top">
						
									<div class="left cell small-12 tablet-6">
										<?php 
											if( !empty($image_copy_card2['image']) ):
											$image = $image_copy_card2['image'];
										?>
										<div class="img-wrap">
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										</div>
										<?php endif;?>
									</div>
									<div class="right black-bg cell small-12 tablet-6<?php if($layout == 'image-left'):?> tablet-offset-6 large-offset-6<?php endif;?>">
										<?php if( !empty($image_copy_card2['text']) ):?>
										<div class="text-wrap black-bg">
											<?php echo $image_copy_card2['text'];?>
										</div>
										<?php endif;?>
										<?php 
										if( $buttons = $image_copy_card2['buttons'] ):?>
										<div class="btns-wrap grid-x grid-padding-x">
											<?php foreach($buttons as $button):
												if( $button['button_link'] ):
													$btn_link = $button['button_link'];
													$link_url = $btn_link['url'];
													$link_title = $btn_link['title'];
													$link_target = $btn_link['target'] ? $btn_link['target'] : '_self';
													
													$add_chev = $button['add_right_chevron'];
										
											?>
											<div class="btn-wrap cell shrink">
												<a class="button<?php if($add_chev == 'true'):?> chev-link grid-x align-middle<?php endif;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
													<span><?php echo esc_html( $link_title ); ?></span>
													<?php if($add_chev == 'true'):?>
														<svg xmlns="http://www.w3.org/2000/svg" width="9.254" height="15.679" viewBox="0 0 9.254 15.679">
													  	<path id="Path_773" data-name="Path 773" d="M267.723,1265.463l7.132,7.132-7.132,7.132" transform="translate(-267.016 -1264.756)" fill="none" stroke="#000" stroke-width="2"/>
														</svg>
													<?php endif;?>
												</a>
											</div>
										<?php endif;
											endforeach;?>
										</div>
										<?php endif;?>
									</div>									
								</div>
							</div>
						</section>
						<?php endif;?>
					
						<section class="our-team">
							<div class="grid-container">
								<div class="top grid-x grid-padding-x">
									<div class="cell small-12 tablet-10 tablet-offset-1 xlarge-8 xlarge-offset-2">
										<div class="text-wrap text-center">
											<?php echo $fields['ot_copy'];?>
										</div>
									</div>
								</div>
							</div>
							<div class="lines-wrap relative">
								<div class="lines"></div>
							<div class="grid-container">
								<div class="grid-x grid-padding-x">
									<div class="cell small-12 tablet-10 tablet-offset-1 xlarge-8 xlarge-offset-2">
										<div class="bio-cards grid-x grid-padding-x align-center small-up-2 medium-up-3">
											<?php 
												$bio_cards = get_field('bio_cards');
												if( !empty($bio_cards) ):
													foreach($bio_cards as $bio_card):
														$bio_card_fields = $bio_card['bio_card'];

														$args = array(
															'photo' => $bio_card_fields['photo'],
															'name' => $bio_card_fields['name'],
															'title_&_affiliation' => $bio_card_fields['title_&_affiliation'],
															'bio' => $bio_card_fields['bio'],
														);

													get_template_part('template-parts/loop', 'team-card', $args);

													endforeach;
												endif;
											?>
										</div>
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