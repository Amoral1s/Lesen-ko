<?php
/**
 Template Name: Доставка и оплата
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


<section class="pay-terms">
  <div class="container">
    <h1 class="page-title title-sub"><?php the_title(); ?></h1>
    <p class="subtitle"><?php the_field('subtitle'); ?></p>
    <h2 class="title title-sub"><?php the_field('pay_title'); ?></h2>
    <p class="subtitle"><?php the_field('pay_subtitle'); ?></p>
    <div class="wrap">
      <?php if(have_rows('pay_terms')) : while(have_rows('pay_terms')) : the_row(); ?>
      <div class="wrap-item">
        <img  itemprop="image" src="<?php the_sub_field('ikonka'); ?>" alt="<?php the_sub_field('nazvanie'); ?>">
        <p><?php the_sub_field('nazvanie'); ?></p>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <h2 class="title title-sub"><?php the_field('deliv_title'); ?></h2>
    <p class="subtitle"><?php the_field('deliv_subtitle'); ?></p>
    <div class="wrap">
      <?php if(have_rows('deliv')) : while(have_rows('deliv')) : the_row(); ?>
      <div class="wrap-item half">
        <b><?php the_sub_field('czifry'); ?></b>
        <p><?php the_sub_field('tekst'); ?></p>
      </div>
      <?php endwhile; endif; ?>
    </div>
    <div class="content">
      <?php the_field('deliv_content'); ?>
    </div>
  </div>
</section>



<?php
get_footer();
