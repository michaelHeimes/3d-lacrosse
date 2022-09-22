<?php
/**
 * Template name: Our Team Page
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
				
					<?php get_template_part('template-parts/content-defaut-banner');?>
				
					<div class="entry-content">
					
						<section class="our-team">
							<div class="grid-container">
								<div class="top grid-x grid-padding-x">
									<div class="cell small-12">
										<div class="text-wrap text-center">
											<?php echo $fields['ot_copy'];?>
										</div>
									</div>
								</div>
								<div class="grid-x grid-padding-x">
									<div class="cell small-12">
										<div class="grid-x grid-padding-x align-center small-up-2 medium-up-3 large-up-4">
											<?php 
												$bio_cards = get_field('bio_cards');
												if( !empty($bio_cards) ):
													$row;
													foreach($bio_cards as $bio_card):
														$bio_card_fields = $bio_card['bio_card'];

														$args = array(
															'photo' => $bio_card_fields['photo'],
															'name' => $bio_card_fields['name'],
															'title_&_affiliation' => $bio_card_fields['title_&_affiliation'],
															'bio' => $bio_card_fields['bio'],
															'row' => $row,
														);

													get_template_part('template-parts/loop', 'team-card', $args);

													$row++; endforeach;
												endif;
											?>
		
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