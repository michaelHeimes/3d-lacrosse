<?php
/**
 * Template name: Alumni Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 3D_Lacrosse
 */
 
get_header();
$fields = get_fields();
$card_rows = $fields['card_rows'];
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
							
						<?php if( !empty($card_rows) ):?>
						<section class="card-rows">
							<div class="grid-container">
								
								<?php 
								foreach($card_rows as $card_row):
									$row = $card_row['row'];
									$row_heading = $row['heading'];
									$row_cards = $row['cards'];
								if( !empty($row_heading) ):
								?>
								<div class="grid-x grid-padding-x">
									<div class="cell small-12">
										<h2><?php echo $row_heading;?></h2>
									</div>
								</div>
								<?php endif;?>
								
								<?php if ( !empty($row_cards) ):?>
								<div class="row-cards grid-x grid-padding-x small-up-1 medium-up-2 tablet-up-3">
									<?php foreach($row_cards as $row_card):?>
										<div class="cell">
											<div class="inner">
												<?php 
												$image = $row_card['image'];
												if( !empty( $image ) ): ?>
												<div class="image-wrap relative">
													<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
													<p class="callout h5 uppercase"><?php echo $row_card['callout'];?></p>
												</div>
												<?php endif; ?>
												<div class="bottom grid-x grid-padding-x">
													<div class="left cell small-12 medium-auto">
														<h3 class="h4"><?php echo $row_card['title'];?></h3>
														<p class="h6"><?php echo $row_card['date_&_age_group'];?></p>
														<p class="h7"><i><?php echo $row_card['location'];?></i></p>
													</div>
													<?php 
													$link = $row_card['button_link'];
													if( $link ): 
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
														?>
													<div class="cell small-12 medium-shrink">
														<div class="btn-wrap">
															<a class="button<?php if($add_chev == 'true'):?> chev-link grid-x align-middle<?php endif;?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
																<span><?php echo esc_html( $link_title ); ?></span>
																<svg xmlns="http://www.w3.org/2000/svg" width="9.254" height="15.679" viewBox="0 0 9.254 15.679">
																	<path id="Path_773" data-name="Path 773" d="M267.723,1265.463l7.132,7.132-7.132,7.132" transform="translate(-267.016 -1264.756)" fill="none" stroke="#000" stroke-width="2"/>
																</svg>
															</a>
														</div>
													</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endforeach;?>
								</div>
								<?php endif;?>
								<?php endforeach;?>
								
							</div>
						</section>
						<?php endif;?>
					
					
					</div><!-- .entry-content -->
				
					<footer class="entry-footer">

					</footer><!-- .entry-footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();