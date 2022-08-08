<?php 
	$image_copy_card = get_field('image_copy_card');
	if( !empty($image_copy_card) ):
		$layout = $image_copy_card['layout'];
?>
<section class="img-copy-card type-text-btn <?php echo $layout;?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x<?php if($layout == 'image-right'):?> tablet-flex-dir-row-reverse<?php endif;?> align-top">

			<div class="left cell small-12 tablet-6">
				<?php 
					if( !empty($image_copy_card['image']) ):
					$image = $image_copy_card['image'];
				?>
				<div class="img-wrap">
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				</div>
				<?php endif;?>
			</div>
			<div class="right black-bg cell small-12 tablet-6">
				<?php if( !empty($image_copy_card['text']) ):?>
				<div class="text-wrap black-bg">
					<?php echo $image_copy_card['text'];?>
				</div>
				<?php endif;?>
				<?php 
				if( $buttons = $image_copy_card['buttons'] ):?>
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