<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-04
	 * Time: 08:35
	 */

	$post_type = add_post_type( 'video-feedbacks' );
	$post_type->label( 'Видеоотзывы' )->publicly_queryable( true )->public_( true )->has_archive( true )->show_in_nav_menus( true )->menu_icon( 'dashicons-format-video' );
	$post_type->supports()->title()->editor()->thumbnail();

	add_field_text( 'video-url' )->label( 'Ссылка на видеоотзыв' )->description( 'Допускаются адреса с сайта <a href="https://www.youtube.com/" target="_blank">Youtube</a>, например <code>https://www.youtube.com/watch?v=omrk3qUC5xE</code>' )->location()
        ->posts('video-feedbacks')->POSITION()->edit_form_after_title();


	///TEMPLATE META
	add_field_select('sidebar-show')->options(['true' => 'Показывать','false' => 'Скрывать'])->label('Показать сайдбар с категориями слева')->LOCATION()->posts('page')->template('template-video-feedbacks.php')->position()->edit_form_after_title();