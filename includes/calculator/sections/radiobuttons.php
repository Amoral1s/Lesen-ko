<?php

use hiweb\core\Strings;


?>
<div class="item-type-radiobutton" data-items-count="<?=count(hw_get_sub_field( 'items' ))?>">
	<?php
		$rand_id = Strings::rand();
		foreach( hw_get_sub_field( 'items' ) as $index => $item_data ){
			?>
			<div class="item-wrap">
				<div class="item">
					<label><input type="radio" name="<?=$rand_id?>" <?=$index == 0 ? 'checked' : ''?> data-price="<?=intval($item_data['price'])?>" data-click-reselect><?= $item_data['text'] ?></label>
				</div>
			</div>
			<?php
		}
	?>
</div>