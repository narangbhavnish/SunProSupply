<?php
function program_product_other_details() {
	ob_start();
	$page = get_the_ID();
	?>
	<section class="product_other_details">
		<div class="product_block product_block_size ">
			<div class="value_title">SIZE </div>
			<div class="values"><?php 
				$SIZE = ot_meta('pr_size');
				if( $SIZE ) {
					echo $SIZE;
				} else {
					echo '-';
				}
			 	?>
			</div>
		</div>
		<div class="product_block product_block_method">
			<div class="value_title">IMPRINT METHOD</div>
			<div class="values"><?php 
				$IMPRINT = ot_meta('pr_printing');
				if( $IMPRINT ) {
					echo $IMPRINT;
				} else {
					echo '-';
				}
			 	?>
			</div>
		</div>
		<div class="product_block product_block_material">
			<div class="value_title">MATERIALS</div>
			<div class="values"><?php 
				$MATERIALS = ot_meta('pr_materials');
				if( $MATERIALS ) {
					echo $MATERIALS;
				} else {
					echo '-';
				}
			 	?>
			</div>
		</div>
		<div class="product_block product_block_other">
			<div class="value_title">OTHER</div>
			<div class="values"><?php 
				$OTHER = ot_meta('pr_other');
				if( $OTHER ) {
					echo $OTHER;
				} else {
					echo '-';
				}
			 	?>
			</div>
		</div>
		
	</section>
	<?php
	return ob_get_clean();
}
add_shortcode('show_product_other_details', 'program_product_other_details');
?>