<div class="content-table">
  <?php $key_i = 1; if (have_rows('table')) : while(have_rows('table')) : the_row(); ?>
  <div class="item <?php if ($key_i == 1) { echo 'first'; } ?>">
    <span class="key"><?php the_sub_field('key'); ?></span>
    <span class="value"><?php the_sub_field('value'); ?></span>
  </div>
  <?php $key_i++; endwhile; endif; ?>
</div>

