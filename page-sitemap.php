<?php 
/**
 Template Name: Sitemap
 */

get_header(); ?>

<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>

<div class="page-top">
  <div class="container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">', '</p>'); }
    ?>
  </div>
</div>

<section class="single-page">
  <div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="content">
      <?php the_content() ?>
    </div>
  </div>
  <!-- /.single container -->
</section>

<?php endwhile; endif; ?>

<?php get_footer();