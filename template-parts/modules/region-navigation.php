<?php 
	$heading = get_sub_field('heading');
?>
<section<?php if( !empty($unique_id) ):?> id="<?php echo slugify($unique_id);?>"<?php endif;?> class="module region-navigation">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="grid-x grid-padding-x">
			
					<?php if( !empty($heading) ):?>
					<div class="cell small-12 text-center">
						<h2><?php echo $heading;?></h2>
					</div>
					<?php endif;?>
					
					<div class="module-region-nav-wrap">
						<?php lacrosse_3d_region_nav();?>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</section>