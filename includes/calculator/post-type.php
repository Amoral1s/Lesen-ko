<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-13
	 * Time: 16:09
	 */

	$post_type = add_post_type( 'hiweb-calculator' );
	$post_type->label( 'Калькулятор' )->labels()->name( 'Калькулятор' )->add_new_item( 'Создать новый калькулятор' )->add_new( 'Создать новый' )->view_item( 'Открыть страницу калькулятора' )->view_items( 'Все калькуляторы' )->menu_name( 'Калькуляторы' );
	$post_type->public_( true )->publicly_queryable( true )->show_in_nav_menus( true )->show_in_menu( true )->show_in_admin_bar( true )->show_ui( true );
	$post_type->menu_icon( 'fas fa-calculator' );
	$post_type->supports()->title();
	$post_type->rewrite()->slug( 'calculators' );

	add_field_separator( '', 'Для размещения калькулятора на странице, используйте шорткод <code>[hiweb-calculator-2 id="' . \hiweb\core\Paths\PathsFactory::request('post') . '"]</code><br>Так же в поле "стоимость" можно указывать обычную стоимость со значением <code>1000</code> или - <code>5000</code> р, а так же процент от общей суммы всех предыдущих блоков, например <code>10%</code> или <code>-12%</code>' )->LOCATION()->POST_TYPES( 'hiweb-calculator' )->POSITION()->edit_form_after_title();

	$repeat = add_field_repeat( 'sections' );
	$repeat->LOCATION()->POST_TYPES( 'hiweb-calculator' )->POSITION()->edit_form_after_title();
	///IMAGES
	$images = add_field_repeat( 'images' );
	$images->add_col_field( add_field_image( 'image' ) )->label( 'Изображение' );
	$images->add_col_field( add_field_text( 'title' ) )->label( 'Подпись под изображением' );
	$images->add_col_field( add_field_text( 'price' ) )->label( 'Стоимость' )->description( 'Можно указывать сумму или процент, включая знак "минус"' );
	$repeat->add_col_flex_field( 'Изображения', add_field_text( 'title' )->placeholder( 'Заголовок секции' ) )->label( 'Секция' )->compact( 1 );
	$repeat->add_col_flex_field( 'Изображения', add_field_textarea( 'help' ) )->label( 'Подсказка для секции' )->compact( 1 );
	$repeat->add_col_flex_field( 'Изображения', $images );
	///IMAGES+NUMBER
	$images = add_field_repeat( 'images' );
	$images->add_col_field( add_field_image( 'image' ) )->label( 'Изображение' )->compact( 1 );
	$images->add_col_field( add_field_text( 'title' ) )->label( 'Заголовок значения' )->compact( 1 );
	//$images->add_col_field( add_field_text( 'price' ) )->label( 'Стоимость одного шага' )->description( 'Допускаеться использовать процент' )->compact( 1 );
	//$images->add_col_field( add_field_text( 'default-min' ) )->label( 'Минимум для одной единицы стоимости' )->description( 'не менять стоимость, если она не ниже данного значения' )->compact( 1 );
	//$images->add_col_field( add_field_text( 'default-max' ) )->label( 'Максимум для одной единицы стоимости' )->description( 'не менять стоимость, если она не выше данного значения. Работает только в паре с минимум единицы стоимостим' );

	$images->add_col_field( add_field_text( 'min' ) )->label( 'Минимум физический:' )->description( 'Оставьте поле пустым, чтобы не использовать' )->compact( 1 );
	$images->add_col_field( add_field_text( 'max' ) )->label( 'Максимум физический:' )->description( 'Оставьте поле пустым, чтобы не использовать' )->compact( 1 );
	$images->add_col_field( add_field_text( 'step' ) )->label( 'Шаг физический:' )->description( 'Оставьте поле пустым, чтобы не использовать' )->compact(1);
	$images->add_col_field( add_field_text( 'default' ) )->label( 'Значени по-умолчанию:' );
	//$images->add_col_field( add_field_text( 'price' ) )->label( 'Стоимость и коеффициент' )->compact( 1 );
	$images->add_col_field( add_field_text( 'after' )->placeholder( 'Текст справа от инпута' ) )->label( 'Текст справа от инпута' )->compact( 1 );
	$images->add_col_field( add_field_text( 'description' ) )->label( 'Комментарий к инпуту' )->compact( 1 );
	$subrepeat = add_field_repeat( 'prices' );
	$subrepeat->label( 'Шаги и проценты' );
	$subrepeat->add_col_field( add_field_text( 'value' ) )->label( 'Значение поля макс' );
	$subrepeat->add_col_field( add_field_text( 'price' ) )->label( 'Цена значения' );
	$images->add_col_field( $subrepeat )->label( 'Позиции значения и стоимость' );
	///
	$repeat->add_col_flex_field( 'Изображения с цифрой', add_field_text( 'title' )->placeholder( 'Заголовок секции' ) )->label( 'Секция' )->compact( 1 );
	$repeat->add_col_flex_field( 'Изображения с цифрой', add_field_textarea( 'help' ) )->label( 'Подсказка для секции' )->compact( 1 );
	$repeat->add_col_flex_field( 'Изображения с цифрой', $images );
	///CHECKBOXES
	$checkboxes = add_field_repeat( 'items' );
	$checkboxes->add_col_field( add_field_text( 'text' ) )->label( 'наименование пункта' );
	$repeat->add_col_flex_field( 'Чекбоксы (галочки)', $checkboxes );
	///CHECKBOXES
	$checkboxes = add_field_repeat( 'items' );
	$checkboxes->add_col_field( add_field_text( 'text' ) )->label( 'Наименование пункта' );
	$checkboxes->add_col_field( add_field_text( 'price' ) )->label( 'Стоимость' )->description( 'Можно указывать сумму или процент, включая знак "минус"' );
	$repeat->add_col_flex_field( 'Радиобаттоны (круглые галочки)', $checkboxes );