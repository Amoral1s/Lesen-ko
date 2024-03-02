<div class="item-type-numbers">
	<?php
		foreach( hw_get_sub_field( 'images' ) as $index => $item_data ){
			$image = get_image( $item_data['image'] );
			?>
			<div class="item-wrap">
				<div class="item">
					<div class="thumbnail-wrap"><?= $image->get_html( [ 220, 220 ] ) ?></div>
					<div class="item-data">
						<p class="item-title"><?= $item_data['title'] ?></p>
						<p class="item-input-wrap">
							<?php
								$tags = [];
								$tags['value'] = 0;
								if( $item_data['default'] != '' && intval($item_data['default']) > 0 ) $tags['value'] = floatval( $item_data['default'] );
								if( $item_data['min'] != '' ) $tags['min'] = floatval( $item_data['min'] );
								if( $item_data['max'] != '' ) $tags['max'] = floatval( $item_data['max'] );
								if( $item_data['step'] != '' ) $tags['step'] = floatval( $item_data['step'] );
//								if( $item_data['default-min'] != '' ) $tags['data-default-min'] = floatval( $item_data['default-min'] );
//								if( $item_data['default-max'] != '' ) $tags['data-default-max'] = floatval( $item_data['default-max'] );
								if(isset($tags['value']) || (isset($tags['value']) && isset($tags['min']) && $tags['value'] >= $tags['min'])){
									//do nothing
								}
								elseif( $item_data['min'] != '' && $item_data['min'] != '0' ){
									$tags['value'] = $item_data['min'];
								} elseif( $item_data['max'] ) {
									$tags['value'] = $item_data['max'];
								} else {
									$tags['value'] = $item_data['min'];
								}
								$tags_html = '';
								foreach( $tags as $key => $val ){
									$tags_html .= $key . '="' . htmlentities( $val ) . '"';
								}
								if( isset( $item_data['prices'] ) && is_array( $item_data['prices'] ) && count( $item_data['prices'] ) > 0 ){
									$price_arr = [];
									foreach( $item_data['prices'] as $data ){
										$price_arr[] = [ $data['value'], $data['price'] ];
									}
									$tags_html .= 'data-price="' . htmlentities( json_encode( $price_arr ) ) . '"';
								} else {
									$tags_html .= 'data-price="[]"';
								}
							?>
							<input type="number" <?= $tags_html ?> data-change data-multiplication>
							<?= $item_data['after'] ?></p>
						<p class="item-description"><?= nl2br( $item_data['description'] ) ?></p>
					</div>
				</div>
			</div>
			<?php
		}
	?>
</div>