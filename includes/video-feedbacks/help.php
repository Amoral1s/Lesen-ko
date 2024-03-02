<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-04
	 * Time: 08:45
	 */

	if(\hiweb\components\Context::is_admin_page()){
		include_js(HIWEB_DIR_VENDOR.'/font-awesome-5/js/all.min.js');
	}

	add_admin_menu_page('video-feedbacks-help','<i class="far fa-info-circle"></i> Помощь','edit.php?post_type=video-feedbacks')->function_(function(){
		?>
		<div class="wrap">
			<h1>Помощь для раздела ВИДЕООТЗЫВЫ</h1>

			<p>&nbsp;</p>
			<h3>Использование шорткода на страницах</h3>
			<p>
				используйте шорткод на страницах айта, например:<br>
				<code>[hiweb-video-feedbacks ids="12,14" cols="3" float="left"]</code>, где<br>
				<b>ids="..."</b> - ID каждого видеоотзыва через запятую, допускаются пробелы между цифрами и запятыми. Если не указывать ID, то в таком случае будет выведена архивная сетка всех видеоотзывов с пагинацией<br>
				<b>cols="..."</b> - количество элементов в строке. Если не указывать, по-умолчанию значение 2. Можно указывать ТОЛЬКО цифру от 1 до 8.<br>
				<!--<b>float="..."</b> - данный параметр устанавливает сетку внутри текста7 Это удобно, если необходимо вставить 1 видеоотзыв прямо в тексте на странице. Устанавливается параметр "left" или "right".-->
			</p>
			<p>Допускается использовать простой шорткод <code>[hiweb-video-feedbacks]</code> - в таком случае на страницу будет выведена архивная страница с пагинацией в 2 элемента в ряду</p>

			<p>&nbsp;</p>
			<h3>Шаблоны архивных страниц</h3>
			<p>Изначально вместе с установленным модулем "Видеоотзывы" включается архивная страница типа записей, и имеет ссылку <a href="<?=get_post_type_archive_link('video-feedbacks')?>" target="_blank"><?=get_post_type_archive_link('video-feedbacks')?></a></p>
			<p>Кроме того, можно использовать шаблон страницы "Видеоотзывы", создав страницу и указав соответствующий шаблон.</p>
			<p>На данной странице можно не указывать шорткод, в таком случае архивная страница будет выведена автоматически. Текс страницы (контент) будет выведен под архивной сеткой.</p>
			<p>При необходимости, можно в тексте установить шорткод <code>[hiweb-video-feedbacks]</code> (включая необходимые параметры), в таком случае архивная сетка будет выведена строко в указанном шорткодом месте.</p>
		</div>
		<?php
	});