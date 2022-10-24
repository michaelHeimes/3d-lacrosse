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
				
					<?php get_template_part('template-parts/content-defaut-banner');?>
				
					<div class="entry-content">
					
						<div class="hero-bottom">
							<?php get_template_part('template-parts/modules/part-image-copy-card');?>
						</div>
							
						<?php if( !empty($card_rows) ):?>
						<section class="card-rows alumni">
							<div class="grid-container">
								<div class="grid-x grid-padding-x">
									<div class="cell small-12">
										<h2>Alumni</h2>
									</div>
								</div>
								<?php 
								foreach($card_rows as $card_row):
									$row = $card_row['row'];
									$row_heading = $row['heading'];
									$row_cards = $row['cards'];
								if( !empty($row_heading) ):
								?>
								<div class="grid-x grid-padding-x">
									<div class="cell small-12">
										<h3 class="row-heading"><?php echo $row_heading;?></h3>
									</div>
								</div>
								<?php endif;?>
								
								<?php if ( !empty($row_cards) ):?>
								<div class="row-cards grid-x grid-padding-x small-up-2 medium-up-2 large-up-3">
									<?php foreach($row_cards as $row_card):?>
									
										<div class="cell single-alumni">
											<div class="inner grid-x grid-padding-x align-middle">
												<?php 
												$image = $row_card['image'];
												if( !empty( $image ) ): ?>
												<div class="left image-wrap cell small-6 tablet-5">
													<img src="<?php echo $image['sizes']['team-photo']; ?>" width="129px" alt="<?php echo $image['caption']; ?>" />
												</div>
												<?php endif; ?>
												<div class="right cell small-6 tablet-7">
													<h3 class="h4"><?php echo $row_card['name'];?></h3>
													<p><?php echo $row_card['team'];?></p>
													<p><?php echo $row_card['region'];?></p>
												</div>
											</div>
										</div>
										
									<?php endforeach;?>
								</div>
								<?php endif;?>
								<?php endforeach;?>
								
							</div>
							<div class="lines"></div>
						</section>
						<?php endif;?>
						
						<?php if( $past_alumni = $fields['past_alumni_shortcode']):?>
						<section class="past-alumni">
							<div class="grid-container">
								<div class="grid-x grid-padding-x">
									<div class="cell small-12">
										<h2>Past Alumni</h2>
	
										<div class="table-wrap">
											<?php $alumni_shortcode = get_post_meta($post->ID,'past_alumni_shortcode',true);
											echo do_shortcode($alumni_shortcode);?>
										</div>
										
									</div>
								</div>
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