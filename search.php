<?php get_header(); ?>

<div class="page-top">
  <div class="container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">', '</p>'); }
    ?>
  </div>
</div>

<section class="page page-search blog-page">
	<div class="container">
		<h1 class="page-title"><?php printf( esc_html__( 'Результаты поиска: %s', 'main-theme' ), get_search_query()); ?></h1>
		<div class="search">
      <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </div>
		<!-- <div class="news-cats">
      <?php
        $args = array(
          'show_option_all'    => '',
          'show_option_none'   => __('No categories'),
          'orderby'            => 'name',
          'order'              => 'ASC',
          'style'              => 'list',
          'show_count'         => 0,
          'hide_empty'         => 1,
          'use_desc_for_title' => 0,
          'child_of'           => 0,
          'feed'               => '',
          'feed_type'          => '',
          'feed_image'         => '',
          'exclude'            => 48,
          'exclude_tree'       => '',
          'include'            => '',
          'hierarchical'       => false,
          'title_li'           => '',
          'number'             => NULL,
          'echo'               => 1,
          'depth'              => 0,
          'current_category'   => 0,
          'pad_counts'         => 0,
          'taxonomy'           => 'category',
          'walker'             => 'Walker_Category',
          'hide_title_if_empty' => false,
          'separator'          => '',
        );
        
        echo '<ul>';
          wp_list_categories( $args );
        echo '</ul>';
      ?>
    </div> -->
		<div class="news-block-wrap" style="padding-top: 40px">
			<?php if (have_posts()) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
			<a href="<?php the_permalink(); ?>" class="item">
				<img  itemprop="image" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
				<!-- <div class="date"><?php echo get_the_date('d.m.Y') ?></div> -->
				<b><?php the_title(); ?></b>
				<?php 
					if ( has_category() ) {
							$categories = get_the_category();
							echo '<p>' . $categories[0]->name . '</p>'; // Выводим название основной рубрики
					}
				?>
			</a>
			<?php	endwhile; else : ?>

			<b class="page-title">
				По вашему запросу ничего не найдено
			</b>

			<?php endif; ?>
		</div>
	</div>
	<?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); ?>
	

</section><!-- #main -->



<?php get_footer();
