<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-11
	 * Time: 23:37
	 */

	add_shortcode( 'hiweb-zakaz-lestnic', function(){
		ob_start();
		if( have_rows( 'order_repeater' ) ){
			?>
			</div>
			</div>
			<section class="order">
				<div class="container">
					<?php echo get_field('order_content'); ?>
					<div class="row">
						<?php $i = 1; ?>

						<?php while( have_rows( 'order_repeater' ) ) : the_row(); ?>

							<?php
							$term_id = false;
							$taxonomy = false;
							$term_link = false;

							if( get_sub_field( 'order_repeater_link_bytype' ) ){
								$term_id = get_sub_field( 'order_repeater_link_bytype' );
								$taxonomy = 'stairs_type';
							} else {
								if( get_sub_field( 'order_repeater_link_bymaterial' ) ){
									$term_id = get_sub_field( 'order_repeater_link_bymaterial' );
									$taxonomy = 'stairs_material';
								} else {
									if( get_sub_field( 'order_repeater_link_addserv' ) ){
										$term_id = get_sub_field( 'order_repeater_link_addserv' );
										$taxonomy = 'stairs_addserv';
									}
								}
							}

							$term_link = get_term_link( $term_id, $taxonomy ); ?>

							<?php if( !is_wp_error( $term_link ) ) : ?>
								<div class="col-md-3 col-sm-4 col-xs-6">
									<a class="grid_item" href="<?php echo $term_link; ?>">
										<div class="image"
											 style="background-image: url('<?php echo get_sub_field( 'order_repeater_img' )['sizes']['medium']; ?>')"></div>
										<div class="header">
											<div class="text">
												<?php echo get_sub_field( 'order_repeater_header' ); ?>
											</div>
										</div>
									</a>
								</div>
							<?php else : ?>
								<div class="col-md-3 col-sm-4 col-xs-6">
									<div class="grid_item">
										<div class="image"
											 style="background-image: url('<?php echo get_sub_field( 'order_repeater_img' )['sizes']['medium']; ?>')"></div>
										<div class="header">
											<div class="text">
												<?php echo get_sub_field( 'order_repeater_header' ); ?>
											</div>
										</div>
									</div>
								</div>
							<?php endif; ?>
							<?php $i ++; ?>
						<?php endwhile; ?>

					</div>
				</div>
			</section>
			<br><br>
			<div class="container">
				<div class="the_content">
			<?php

		}
		return ob_get_clean();
	} );