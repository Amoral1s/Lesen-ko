<div class="gallery mag-toggle">
  <?php 
    $gallery_img = get_field('gallery');
    if( $gallery_img ): 
  ?>
    <?php foreach( $gallery_img as $image ): ?>
    <a href="<?php echo esc_url($image['url']); ?>" class="item">
      <?php if (!empty($image['alt'])) : ?>
        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
      <?php else : ?>
        <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php the_title(); ?>" />
      <?php endif; ?>
    </a>
    <?php endforeach; ?>
  <?php endif; ?>
</div>