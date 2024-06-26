<?php
/**
 Template Name: Гарантия
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

<section class="garanty">
  <div class="container">
    <h1 class="page-title"><?php the_title(); ?></h1>
    <div class="subtitle">
      <p><?php echo get_field('subtitle'); ?></p>
      <?php if (get_field('garantijnyj_talon')) : ?>
      <a href="<?php echo get_field('garantijnyj_talon'); ?>" target="blank" download class="file">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17" viewBox="0 0 18 17" fill="none">
            <path d="M9 10.5L9 0.5M9 10.5L6 7.49979M9 10.5L12 7.49979" stroke="#C01025" stroke-width="1.5"/>
            <path d="M17 12.5L16 15.5H2L1 12.5" stroke="#C01025" stroke-width="1.5"/>
          </svg>
        </div>
        <span>Пример гарантийного талона</span>
      </a>
      <?php endif; ?>
    </div>
    <div class="garanty-time">
      <h2 class="title"><?php echo get_field('time_title'); ?></h2>
      <div class="wrap">
        <?php if(have_rows('time')) : while(have_rows('time')) : the_row(); ?>
        <div class="item">
          <div class="top">
            <?php if (get_sub_field('tekst_ili_ikonka')) : ?>
              <div class="num"><?php the_sub_field('tekst_czifra'); ?></div>
              <span><?php the_sub_field('tekst_oboznachenie'); ?></span>
            <?php else : ?>
              <img  itemprop="image" src="<?php the_sub_field('ikonka'); ?>" alt="Icon">
            <?php endif; ?>
          </div>
          <b><?php the_sub_field('opisanie'); ?></b>
        </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
    <div class="garanty-items">
      <h2 class="title"><?php echo get_field('prod_title'); ?></h2>
      <ul>
        <?php if(have_rows('produkcziya')) : while(have_rows('produkcziya')) : the_row(); ?>
        <li><?php the_sub_field('naimenovanie'); ?></li>
        <?php endwhile; endif; ?>
      </ul>
    </div>
    <div class="content">
      <?php echo get_field('tekst'); ?>
    </div>
  </div>
</section>

<?php
get_footer();
