<?php
/**
 Template Name: Блог
 */

get_header();
?>
<div class="page-top">
  <div class="container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">', '</p>'); }
    ?>
  </div>
</div>

<section  itemscope itemtype="http://schema.org/BlogPosting" class="blog-page">
  <link itemprop="image" href="<?php echo get_template_directory_uri(); ?>/img/logo.svg">
	<link itemprop="url" href="<?php echo get_permalink(); ?>">
	<meta itemprop="description" content="<?php the_excerpt(); ?>">
	<meta itemprop="author" content="<?php the_author(); ?>">
	<meta itemprop="datePublished" content="<?php the_time('c'); ?>">
	<meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>">
  <div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="search">
      <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </div>
    <?php if (get_tags()) { ?>
		<div class="single-tags">
      <?php 
        $tags = get_tags();

        foreach ( $tags as $tag ) {
          $tag_link = get_tag_link( $tag->term_id ); ?>
          <a href="<?php echo $tag_link; ?>" title="<?php echo $tag->name; ?>">
            <?php echo $tag->name; ?>
          </a>
        <?php } ?>
		</div>
		<?php } ?>
    <div class="news-cats">
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
    </div>
    <div class="news-block-wrap">
      <?php
        $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // определяем текущую страницу блога
        $args = array(
          'posts_per_page' => get_option('posts_per_page'), // значение по умолчанию берётся из настроек, но вы можете использовать и собственное
          'paged'          => $current_page, // текущая страница
          'post_type'      => 'post',
          'category__not_in' => array( 48 )
        );
        query_posts( $args );
        $wp_query->is_archive = true;
        $wp_query->is_home = false;
        while(have_posts()): the_post();
      ?>
      <a href="<?php the_permalink(); ?>" class="item">
        <img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>">
        <!-- <div class="date"><?php echo get_the_date('d.m.Y') ?></div> -->
        <b><?php the_title(); ?></b>
        <?php 
          if ( has_category() ) {
              $categories = get_the_category();
              echo '<p>' . $categories[0]->name . '</p>'; // Выводим название основной рубрики
          }
        ?>
      </a>
      <?php endwhile; ?>
    </div>
    <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); ?>
  </div>
</section>


<?php
get_footer();
