<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 3D_Lacrosse
 */

?>

				<footer id="colophon" class="site-footer">
					<div class="instagram-feed black-bg">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-middle">
								<div class="cell small-12 medium-shrink">
									<h2>Follow Us</h2>
								</div>
								<div class="cell small-12 medium-auto">
									<a href="<?php the_field('instagram_url', 'option');?>" target="_blank">
										<div class="grid-x align-middle">
											<svg xmlns="http://www.w3.org/2000/svg" width="21.522" height="21.518" viewBox="0 0 21.522 21.518">
											  <path id="Icon_awesome-instagram" data-name="Icon awesome-instagram" d="M10.758,7.48A5.517,5.517,0,1,0,16.275,13,5.508,5.508,0,0,0,10.758,7.48Zm0,9.1A3.587,3.587,0,1,1,14.345,13a3.593,3.593,0,0,1-3.587,3.587Zm7.029-9.329A1.287,1.287,0,1,1,16.5,5.967,1.284,1.284,0,0,1,17.788,7.254ZM21.442,8.56A6.368,6.368,0,0,0,19.7,4.051a6.41,6.41,0,0,0-4.509-1.738c-1.777-.1-7.1-.1-8.878,0A6.4,6.4,0,0,0,1.808,4.047,6.389,6.389,0,0,0,.07,8.555c-.1,1.777-.1,7.1,0,8.878a6.368,6.368,0,0,0,1.738,4.509A6.418,6.418,0,0,0,6.317,23.68c1.777.1,7.1.1,8.878,0A6.368,6.368,0,0,0,19.7,21.942a6.41,6.41,0,0,0,1.738-4.509c.1-1.777.1-7.1,0-8.873Zm-2.3,10.779A3.631,3.631,0,0,1,17.1,21.385c-1.416.562-4.777.432-6.343.432s-4.931.125-6.343-.432A3.631,3.631,0,0,1,2.37,19.339c-.562-1.416-.432-4.777-.432-6.343s-.125-4.931.432-6.343A3.631,3.631,0,0,1,4.416,4.608c1.416-.562,4.777-.432,6.343-.432s4.931-.125,6.343.432a3.631,3.631,0,0,1,2.045,2.045c.562,1.416.432,4.777.432,6.343S19.708,17.928,19.146,19.339Z" transform="translate(0.005 -2.238)" fill="#019fdb"/>
											</svg>
											<div class="uppercase h5"><?php the_field('ig_hash', 'option');?></div>
										</div>
									</a>
								</div>
							</div>
							<div class="feed-wrap color-white">
								<?php $ig_shortcode = get_post_meta($post->ID,'instagram_shortcode',true);
								echo do_shortcode($ig_shortcode);?>
							</div>
						</div>
					</div>
					<?php if( $partners_logos = get_field('partners_logos', 'option') ):?>
					<div class="partners black-bg text-center">
						<div class="grid-container">
							<div class="top grid-x grid-padding-x">
								<div class="cell small-12">
									<h2><?php the_field('partners_heading', 'option');?></h2>
								</div>
							</div>
							<div class="grid-x grid-padding-x align-spaced align-middle">
								<?php foreach($partners_logos as $partners_logo):?>
								<div class="cell shrink">
									<img src="<?php echo esc_url($partners_logo['sizes']['large']); ?>" alt="<?php echo esc_attr($partners_logo['alt']); ?>" />
								</div>
								<?php endforeach;?>
							</div>
						</div>
					</div>
					<?php endif;?>
					<div class="site-info black-bg">
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								<div class="left cell shrink">
									<div class="grid-x flex-dir-column">
										<div class="top"><?php lacrosse_3d_footer_links(); ?></div>
										<div class="bottom">
											<div class="grid-x aligm-middle">
												<div>Socials</div>
												<?php lacrosse_3d_social_links(); ?>
											</div>
										</div>
									</div>
								</div>
								<div class="right-footer cell small-12 tablet-auto">
									<div class="grid-x grid-padding-x flex-dir-column-reverse tablet-flex-dir-row">
										<div class="center cell small-12 tablet-auto">
											<div class="fh grid-x flex-dir-column align-right">
												<p class="text-center source-org copyright small">Copyright &copy; <?php echo date('Y'); ?>, 3STEP Sports. All Rights Reserved. - 
													<?php 
													$link = get_field('privacy_policy', 'option');
													if( $link ): 
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
														?>
														<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
													<?php endif; ?>
												</p>
											</div>
										</div>
										<div class="right cell small-12 tablet-shrink">
											<?php 
											$image = get_field('footer_logo', 'option');
											if( !empty( $image ) ): ?>
											<div class="top">
												<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											</div>
											<?php endif; ?>
											<?php 
											$link = get_field('parent_company_link', 'option');
											if( $link ): 
												$link_url = $link['url'];
												$link_title = $link['title'];
												$link_target = $link['target'] ? $link['target'] : '_self';
												?>
											<div class="bottom">
												<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											</div>
											<?php endif; ?>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
					
			</div><!-- #page -->
			
		</div>  <!-- end .off-canvas-content -->
							
	</div> <!-- end .off-canvas-wrapper -->
					
<?php wp_footer(); ?>

</body>
</html>
