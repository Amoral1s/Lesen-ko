<?php get_header(); ?>

<?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>

<div class="page-top">
  <div class="container">
    <?php
      if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">', '</p>'); }
    ?>
  </div>
</div>

<section class="single-page only-single-page">
	<div class="container">
		<h1 class="page-title"><?php the_title(); ?></h1>
		<?php if (get_field('post_subtitle')) { ?>
		<p class="subtitle"><?php echo get_field('post_subtitle'); ?></p>
		<?php } ?>
		<?php if (get_the_post_thumbnail_url()) : ?>
		<div class="thumb" style="margin-bottom: 40px;">
			<img  itemprop="image" style="object-fit: contain; margin-left: auto; margin-right: auto; aspect-ratio: auto; height: auto;" src="<?php echo the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" >
		</div>
		<?php endif; ?>
		<div class="content">
			<?php the_content() ?>
		</div>
	</div>
	<!-- /.single container -->
</section>

<?php endwhile; endif; ?>

<?php get_footer();