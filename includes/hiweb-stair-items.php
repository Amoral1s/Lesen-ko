<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-02-03
	 * Time: 22:01
	 */

	add_shortcode( 'hiweb-stair-items', function(){
		include_css( __DIR__ . '/hiweb-stair-items.css' );
		$main_image = get_image( get_field( 'image', get_queried_object() ) );
		if( $main_image->is_attachment_exists() ){
			ob_start();
			?>
			<div class="hiweb-stairs-items" style="background-image: url(<?= $main_image->get_original_src() ?>)">
				<div class="image-main-wrap">
					<?= $main_image->html( [ 992, 520 ], - 1 ) ?>
				</div>
				<div class="row items-wrap">
					<div class="col-md-6">

					</div>
					<div class="col-md-6 items-wrap-2">
						<?php
							if( have_rows( 'structure', get_queried_object() ) ){
								while( have_rows( 'structure', get_queried_object() ) ){
									the_row();
									///
									?>
									<div class="item">
										<div class="item-image">
											<?= get_image( get_sub_field( 'image' ) )->get_html( [ 100, 100 ] ) ?>
										</div>
										<div class="item-text">
											<?= get_sub_field( 'text' ) ?>
										</div>
										<div class="clearfix"></div>
									</div>
									<?php
								}
							}
						?>
					</div>
				</div>
			</div>
			<?php
			return ob_get_clean();
		}
		return '';
	} );