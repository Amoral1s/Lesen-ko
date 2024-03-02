<div class="item-type-checkbox" data-items-count="<?=count(hw_get_sub_field( 'items' ))?>">
	<?php
		$rand_id = \hiweb\core\Strings::rand();
		foreach( hw_get_sub_field( 'items' ) as $index => $item_data ){
			?>
			<div class="item-wrap">
				<div class="item">
					<label><input type="checkbox" name="<?=$rand_id?>" <?=$index == 0 ? 'checked' : ''?> data-price="<?=intval($item_data['price'])?>" data-click-select><?= $item_data['text'] ?></label>
				</div>
			</div>
			<?php
		}
	?>
</div>