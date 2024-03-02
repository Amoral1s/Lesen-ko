<?php

	add_admin_menu_page( 'forms-options', 'Формы и опции', 'themes.php' );

	add_field_text( 'agree-label' )->default_value( 'Я даю свое согласие на обработку персональных данных и принимаю условия {политики конфидициальности}' )->label( 'Текст справа от чекбокса' )->description( 'Используйте фигурные скобки, чтобы текст в них стал ссылкой на страницу политики, например <code>{ссылка на страницу}</code>' )->location()->admin_menus( 'forms-options' );
	add_field_post( 'agree-page-id' )->post_type( [ 'page', 'post' ] )->label( 'Страница политики конфидициальности для ссылки на тексте галочки' )->location( true );

	add_field_checkbox('agree-checked')->label_checkbox('По-умолчанию галочки должны быть все отмечены')->location(true);

	function hiweb_the_form_checkbox_field(){
		?>
		<div class="field_wrap hiweb-forms-checkbox-agree">
			<div class="checkbox">
				<label style="float: none; width: unset;">
					<input type="checkbox" <?=_get_field('agree-checked','forms-options') ? 'checked' : ''?> name="agree" required style="width: auto;">
					<?php
						$text = _get_field( 'agree-label', 'forms-options' );
						$page_id = intval( _get_field( 'agree-page-id', 'forms-options' ) );
						if( $page_id != 0 ){
							$page_wp_post = get_post( $page_id );
							if( $page_wp_post instanceof WP_Post ){
								$text = strtr( $text, [ '{' => '<a href="' . get_permalink( $page_wp_post ) . '" target="_blank">', '}' => '</a>' ] );
							}
						}
						echo $text;
					?>
				</label>
			</div>
		</div>
		<?php
	}

	/**
	 * @return false|string
	 */
	function hiweb_get_form_checkbox_field(){
		ob_start();
		hiweb_the_form_checkbox_field();
		return ob_get_clean();
	}