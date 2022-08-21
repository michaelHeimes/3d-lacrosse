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
		<div class="inner-content">

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
						
						<div class="hero-bottom">
							<div class="bg" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/home-hero-bg.svg);"></div>
							<?php get_template_part('template-parts/modules/part-image-copy-card');?>
							<div class="grid-container">
								<div class="grid-x grid-padding-x">
									<div class="cell small-12">
										<a class="region-link" href="#regions" data-smooth-scroll>
											<svg xmlns="http://www.w3.org/2000/svg" width="24.447" height="28.414" viewBox="0 0 24.447 28.414">
							  				<g id="Group_196" data-name="Group 196" transform="translate(-104.793 -1412.525)">
												<line id="Line_3" data-name="Line 3" y2="27" transform="translate(117.016 1412.525)" fill="none" stroke="#fff" stroke-width="2"/>
												<path id="Path_733" data-name="Path 733" d="M281,13884.472l11.516,11.517,11.516-11.517" transform="translate(-175.5 -12456.463)" fill="none" stroke="#fff" stroke-width="2"/>
							  				</g>
											</svg>
										</a>
									</div>
								</div>
							</div>
						</div>
						
						
						<section id="regions" class="find-region text-center">
							<div class="grid-container">
								<div class="grid-x grid-padding-x">
									<div class="cell small-12">
										<?php if( $rf_heading = $fields['rf_heading'] ):?>
											<h2><?php echo $rf_heading;?></h2>
										<?php endif;?>
										<?php lacrosse_3d_region_nav();?>
										<?php 
										$image = $fields['rf_map_image'];
										if( !empty( $image ) ): ?>
										<div class="map-wrap text-center">
											<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</section>
						
						<div class="wrap-for-bg" style="background-image: url(<?php echo $fields['section_background_image']['url'];?>);">
							
							<?php $cc_cards = $fields['cc_cards'];
								if( !empty($cc_cards) ):?>
								<section class="copy-cards">
									<div class="grid-container">
										<div class="grid-x grid-padding-x small-up-1 medium-up-3 tablet-up-4">
											<?php foreach( $cc_cards as $cc_card ):?>
												<div class="cell">
													<div class="inner black-bg">
														<div class="copy-wrap"><?php echo $cc_card['copy'];?></div>
													</div>
												</div>
											<?php endforeach;?>
										</div>
									</div>
								</section>
							<?php endif;?>
							
							<?php if( !empty($fields['cb_copy']) ):?>
							<section class="copy-block color-white text-center">
								<div class="grid-container">
									<div class="grid-x grid-padding-x">
										<div class="cell small-12 tablet-10 tablet-offset-1">
											<?php echo $fields['cb_copy'];?>
										</div>
									</div>
								</div>
							</section>
							<?php endif;?>
							
							<section class="img-copy-card type-quote img-left">
								<div class="grid-container">
									<div class="grid-x grid-padding-x align-top">
										<?php 
											$quote= $fields['quote'];
											if( !empty($quote) ):	
										?>
										<div class="left cell small-12 tablet-6">
											<?php 
												if( !empty($quote['image']) ):
												$image = $quote['image'];
											?>
											<div class="img-wrap">
												<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											</div>
											<?php endif;?>
										</div>
										<div class="right black-bg cell small-12 tablet-6">
											<div class="quote-mark">“</div>
											<?php if( !empty($quote['text']) ):?>
											<div class="text-wrap black-bg">
												<p><?php echo $quote['text'];?></p>
												<citation><?php echo $quote['citation'];?></citation>
											</div>
											<?php endif;?>
										</div>									
										<?php endif;?>
									</div>
								</div>
							</section>
							
						</div><!-- .wrap-for-bg -->
							
						<section class="pros text-center">
							<div class="grid-container">
								<div class="top grid-x grid-padding-x">
									<div class="cell small-12 tablet-10 tablet-offset-1 large-8 large-offset-2">
										<div class="inner">
										<?php if( $pros_heading = $fields['pros_heading']):?>
											<h2><?php echo $pros_heading;?></h2>
										<?php endif;?>
										<?php if( $pros_text = $fields['pros_text']):?>
											<p><?php echo $pros_text;?></p>
										<?php endif;?>
										</div>
									</div>
								</div>
								<?php if ($pros_slides = $fields['pros_slider']):?>
								<div class="cards-wrap pros-slider grid-x align-middle">
									<button class="swiper-button-prev">
										<svg xmlns="http://www.w3.org/2000/svg" width="51.5" height="103" viewBox="0 0 51.5 103">
										  <g id="Group_76" data-name="Group 76" transform="translate(-51 -4343.303)">
											<path id="Path_736" data-name="Path 736" d="M51.5,0V103a51.5,51.5,0,0,1,0-103Z" transform="translate(51 4343.303)" fill="#efefef" opacity="0.794"/>
											<path id="Path_737" data-name="Path 737" d="M86.7,16741.152l-18.483,18.482,18.483,18.482" transform="translate(1.285 -12365.35)" fill="none" stroke="#019fdb" stroke-width="2"/>
										  </g>
										</svg>
									</button>
									<div class="swiper-wrapper small-up-1 medium-up-2 tablet-up-3 large-up-4">
										<?php foreach($pros_slides as $pros_slide):?>
										<div class="swiper-slide cell">
											<div class="inner">
												<div class="photo-wrap">
													<?php 
													$image = $pros_slide['photo'];
													if( !empty( $image ) ): ?>
														<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
													<?php endif; ?>
												</div>
												<div class="text-wrap">
													<h4><?php echo $pros_slide['name'];?></h4>
													<p><?php echo $pros_slide['team_position'];?></p>
													<p class="region"><?php echo $pros_slide['region'];?></p>
												</div>
											</div>
										</div>
										<?php endforeach;?>
									</div>
									<button class="swiper-button-next">
										<svg xmlns="http://www.w3.org/2000/svg" width="51.5" height="103" viewBox="0 0 51.5 103">
									  	<g id="Group_32" data-name="Group 32" transform="translate(102.5 4271) rotate(180)">
											<path id="Path_736" data-name="Path 736" d="M51.5,0V103a51.5,51.5,0,0,1,0-103Z" transform="translate(51 4168)" fill="#efefef" opacity="0.794"/>
											<path id="Path_737" data-name="Path 737" d="M86.7,16741.152l-18.483,18.482,18.483,18.482" transform="translate(1.285 -12540.652)" fill="none" stroke="#019fdb" stroke-width="2"/>
									  	</g>
										</svg>
									</button>
								</div>
								<?php endif;?>
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