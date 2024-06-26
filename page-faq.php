<?php
/**
 Template Name: FAQ
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

<section  itemscope itemtype="https://schema.org/FAQPage" class="faq">
  <div class="container">
    <h1 class="page-title title-sub"><?php the_title(); ?></h1>
    <p class="subtitle"><?php echo get_field('subtitle'); ?></p>
    <div class="faq-wrap">
      <?php if(have_rows('questions')) : while(have_rows('questions')) : the_row(); ?>
      <div itemscope itemprop="mainEntity" itemtype="https://schema.org/Question" class="item">
        <b itemprop="name" class="item-title"><?php the_sub_field('q_title'); ?></b>
        <div itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer" class="content">
          <span itemprop="text" ><?php the_sub_field('q_content'); ?></span>
        </div>
      </div>
      <?php endwhile; endif; ?>
    </div>
      
  </div>
</section>

<?php if (get_field('seo_title')) : ?>
<section class="seo">
  <div class="container">
    <h2 class="title"><?php echo get_field('seo_title'); ?></h2>
    <div class="content">
      <?php echo get_field('seo_text'); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<section class="redform">
  <div class="container">
    <div class="redform-wrap">
      <b class="title title-sub">Задайте ваш вопрос</b>
      <b class="title title-sub-mobile" style="display: none">Получите бесплатный индивидуальный расчёт стоимости</b>
      <p class="subtitle">А мы постараемся ответить максимально быстро и подробно</p>
      <div class="form">
        <?php echo do_shortcode('[contact-form-7 id="51ee272" title="Задайте ваш вопрос"]'); ?>
      </div>
    </div>
  </div>
</section>


<?php
get_footer();
