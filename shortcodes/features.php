<?php if (get_field('features_title', 'options')) : ?>
<section class="features">
  <div class="features-wrap">
    <div class="left">
      <h2 class="title"><?php the_field('features_title', 'options'); ?></h2>
      <p><?php the_field('features_subtitle', 'options'); ?></p>
      <div class="button callback">
        Оставить заявку
      </div>
    </div>
    <div class="right">
      <?php if (have_rows('features', 'options')) : while(have_rows('features', 'options')) : the_row(); ?>
      <div class="item">
        <div class="icon">
          <img src="<?php the_sub_field('ikonka'); ?>" alt="icon">
        </div>
        <b><?php the_sub_field('zagolovok'); ?></b>
        <p><?php the_sub_field('opisanie'); ?></p>
      </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>