<?php get_header(); ?>

<div class="page-top">
  <div class="container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">', '</p>'); }
    ?>
  </div>
</div>

<section class="vac-offer error-404 not-found">
	<div class="container">
		<img  itemprop="image" src="<?php echo get_template_directory_uri(); ?>/img/404.png" title="404" alt="404">
		<h1 style="text-align: center;">
			Страница не найдена
		</h1>
		<p>
			Так уж получилось, что из множества страниц нашего сайта вы оказались как раз на той, которая уже не существует
		</p>
		<a href="/" class="button">На главную</a>
	</div>
</section>

<?php get_footer(); ?>
