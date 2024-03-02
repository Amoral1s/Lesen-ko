<?php
	/**
	 * Created by PhpStorm.
	 * User: denisivanin
	 * Date: 2019-03-07
	 * Time: 10:07
	 */

	add_admin_menu_page( 'calculator-zhitov-help', 'Калькулятор Житова' )->icon_url( 'dashicons-feedback' )->function_page( function(){
		$templates = [];

		?>
		<div class="wrap">
			<h1>Использование шорткода</h1>
			<p>
				<b>[hiweb-calculator template="90grad"]</b> - вывести калькулятор на страницу, используя шаблон 90grad.php в папке <?= get_file( __DIR__ )->get_path_relative() ?>/templates/90grad.php</p>
			<p>Доступные шаблоны:
			<ul>
				<?php
					foreach( get_file( __DIR__ . '/templates' )->get_sub_files() as $file ){
						if( $file->get_extension() == 'php' ){
							?>
							<li><b style="font-size: 2em"><?= $file->get_filename() ?></b></li>
							<?php
						}
					}
				?>
			</ul>
			</p>
		</div>
		<?php
	} );