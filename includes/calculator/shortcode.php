<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-13
	 * Time: 19:48
	 */

	add_shortcode( 'hiweb-calculator-2', function( $props ){
		$post_id = !isset( $props['id'] ) ? get_the_ID() : $props['id'];
		$wp_post = get_post( $post_id );
		if( !$wp_post instanceof WP_Post ){
			console_error( '[hiweb-calculator-2] не верно указан ID [' . $post_id . '], он не является постом калькулятора' );
			return;
		}
		if( $wp_post->post_type != 'hiweb-calculator' ){
			console_error( '[hiweb-calculator-2] не верно указан ID [' . $post_id . '], он не является типом записи калькулятора' );
			return;
		}
		///
		//$vue = include_js( __DIR__ . '/vue.min.js' );
		//$bootstrap_js = include_js( get_stylesheet_directory() . '/inc/js/bootstrap.min.js' );
		$bootstrap_js = include_js( __DIR__ . '/bootstrap.min.js' );
		include_js( __DIR__ . '/script.js' );
		include_css( __DIR__ . '/hiweb-calculator.css' );
		include_js( HIWEB_DIR_VENDOR . '/font-awesome-5/js/all.min.js' );
		ob_start();
		?>
		<div class="hiweb-calculator-wrap">
			<?php
				if( !hw_have_rows( 'sections', $wp_post ) ){
					?>
					<div class="hiweb-calculator-empty-wrap">нет не единой позиции калькулятора</div>
					<?php
				} else {
					$sectionIndex = 1;
					while( hw_have_rows( 'sections', $wp_post ) ){
						hw_the_row();
						?>
						<div class="item-section" data-section-index="<?= $sectionIndex ?>">
							<div class="section-title">
								<span class="section-number"><?= $sectionIndex ?></span>
								<?= hw_get_sub_field( 'title' ) ?>
								<?php
									if( hw_get_sub_field( 'help' ) != '' ){
										?><span class="item-help-icon" data-toggle="tooltip" data-placement="auto" title="<?= htmlentities( nl2br( hw_get_sub_field( 'help' ) ) ) ?>"><i class="fas fa-question-circle"></i></span><?php
									}
								?>
							</div>
							<?php
								switch( hw_get_row_layout() ){
									case 'Изображения':
										include __DIR__ . '/sections/images.php';
										break;
									case 'Изображения с цифрой':
										include __DIR__ . '/sections/numbers.php';
										break;
									case 'Радиобаттоны (круглые галочки)':
										include __DIR__ . '/sections/radiobuttons.php';
										break;
									default:
										console_info( 'не найден шаблон для калькулятора [' . hw_get_row_layout() . ']' );
										break;
								}
							?>
						</div>

						<?php
						$sectionIndex ++;
					}
					?>
					<div class="total-section">
						<div class="total-price-wrap">ИТОГО: <b data-total>0</b> руб</div>
						<button class="total-button">Рассчитать</button>
					</div>
					<?php
				}
			?>
		</div>
		<?php

		return ob_get_clean();
		///
	} );