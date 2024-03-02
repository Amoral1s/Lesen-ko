<?php
	$count = count( hw_get_sub_field( 'images' ) ) ? count( hw_get_sub_field( 'images' ) ) : 0;
	if( $count > 0 ){
		?>
		<div class="item-type-images" data-items-count="<?= $count ?>">
			<?php
				foreach( hw_get_sub_field( 'images' ) as $index => $image_data ){
					$image = get_image( $image_data['image'] );
					?>
					<div class="item-wrap">
						<div class="item" data-click-reselect="<?= $index ?>" data-price="<?= htmlentities( $image_data['price'] ) ?>" data-selected="<?= $index == 0 ? 'true' : 'false' ?>">
							<div class="thumbnail-wrap"><?= $image->get_html( ( $count < 3 ? [ 500, 220 ] : [ 220, 220 ] ) ) ?></div>
							<div class="item-title"><?= $image_data['title'] ?></div>
						</div>
					</div>
					<?php
				}
			?>
		</div>
		<?php
	}