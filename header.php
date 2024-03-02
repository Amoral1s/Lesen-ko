<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/header.min.css" />
  <?php if (is_home()) { ?>
    <link rel="preload" as="image" href="<?php the_field('offer_bg_mob', 'options'); ?>" />
  <?php } else { ?>

  <?php } ?>
  <meta charset="UTF-8">
  <meta name="viewport" id="myViewport" content="width=device-width, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="format-detection" content="telephone=no">

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon.ico" sizes="any"><!-- 32×32 -->
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/icon.png" type="image/svg+xml">
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon.png"><!-- 180×180 -->
  <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.webmanifest">
  
  <?php wp_head(); ?>
</head>

<body id="top">

<header itemscope itemtype="http://schema.org/WPHeader" class="header"> 
  <div class="container"> 
    <div class="header-top">
      <?php if (is_home()) : ?>
        <div  class="logo">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" title="lesen-ko.ru" alt="lesen-ko.ru">
          <p>Лестницы на заказ из дерева в Москве и МО</p>
        </div>
        <?php else : ?>
        <div class="logo">
          <a href="/" class="">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" title="lesen-ko.ru" alt="lesen-ko.ru">
          </a>
          <p>Лестницы на заказ из дерева в Москве и МО</p>
        </div>
        
      <?php endif; ?> 
      <div class="right" style="display: none">
        <a class="email" href="mailto:<?php the_field('email', 'options'); ?>" target="blank">
          <?php the_field('email', 'options'); ?>         
        </a> 
        <a class="button button-transparent" href="<?php the_field('whatsapp', 'options'); ?>" target="blank">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3991 13.9056C16.1595 13.7864 14.9851 13.212 14.7665 13.132C14.5478 13.0528 14.3886 13.0136 14.2287 13.252C14.0695 13.4888 13.6121 14.0248 13.4731 14.1832C13.3332 14.3424 13.1941 14.3616 12.9554 14.2432C12.7166 14.1232 11.9465 13.8728 11.0342 13.0632C10.3244 12.4328 9.84448 11.6544 9.70541 11.416C9.56635 11.1784 9.69014 11.0496 9.80991 10.9312C9.91763 10.8248 10.0487 10.6536 10.1684 10.5152C10.2882 10.376 10.3276 10.2768 10.4072 10.1176C10.4876 9.95922 10.4474 9.82082 10.3871 9.70162C10.3276 9.58242 9.85011 8.41202 9.65075 7.93603C9.45702 7.47283 9.26008 7.53603 9.11378 7.52803C8.97391 7.52163 8.81475 7.52003 8.65558 7.52003C8.49642 7.52003 8.23758 7.57923 8.01893 7.81763C7.79948 8.05522 7.18293 8.63042 7.18293 9.80082C7.18293 10.9704 8.03823 12.1008 8.158 12.26C8.27777 12.4184 9.84207 14.82 12.2383 15.8496C12.8091 16.0944 13.2536 16.2408 13.6001 16.3496C14.1724 16.5312 14.6933 16.5056 15.1049 16.444C15.5631 16.376 16.518 15.8688 16.7174 15.3136C16.9159 14.7584 16.9159 14.2824 16.8565 14.1832C16.797 14.084 16.6378 14.0248 16.3983 13.9056H16.3991ZM12.0406 19.828H12.0374C10.6141 19.8283 9.21697 19.4475 7.99241 18.7256L7.70302 18.5544L4.69502 19.34L5.49806 16.4216L5.30916 16.1224C4.51346 14.8619 4.09237 13.403 4.09454 11.9144C4.09615 7.55443 7.66042 4.00723 12.0438 4.00723C14.166 4.00723 16.1611 4.83123 17.6611 6.32563C18.401 7.05889 18.9874 7.93088 19.3864 8.89114C19.7854 9.85141 19.9892 10.8809 19.9858 11.92C19.9842 16.28 16.42 19.828 12.0406 19.828ZM18.8026 5.19043C17.9169 4.30317 16.8631 3.59966 15.7022 3.12067C14.5413 2.64168 13.2965 2.39674 12.0398 2.40003C6.77136 2.40003 2.48202 6.66803 2.48041 11.9136C2.47961 13.5904 2.91931 15.2272 3.75612 16.6696L2.40002 21.6L7.46749 20.2768C8.86931 21.0369 10.4402 21.4352 12.0366 21.4352H12.0406C17.309 21.4352 21.5984 17.1672 21.6 11.9208C21.6039 10.6706 21.3586 9.4321 20.8785 8.27685C20.3983 7.1216 19.6927 6.07256 18.8026 5.19043Z" fill="#03AE00"/>
            </svg>
          </div>
          <p>Whatsapp</p>      
        </a> 
        <div class="button button-transparent callback">
          Заказать звонок      
        </div> 
        <div class="header-top-contacts">
          <a class="phone" href="tel:<?php the_field('phone', 'options'); ?>" target="blank">
            <?php the_field('phone', 'options'); ?>         
          </a> 
          <time>
            <?php the_field('work_time', 'options'); ?>  
          </time>
        </div>
      </div>
      <div class="burger">
        <svg class="close" xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 5.5C2.25 5.08579 2.58579 4.75 3 4.75H21C21.4142 4.75 21.75 5.08579 21.75 5.5C21.75 5.91421 21.4142 6.25 21 6.25H3C2.58579 6.25 2.25 5.91421 2.25 5.5Z" fill="#2F2B43"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 12.5C2.25 12.0858 2.58579 11.75 3 11.75H21C21.4142 11.75 21.75 12.0858 21.75 12.5C21.75 12.9142 21.4142 13.25 21 13.25H3C2.58579 13.25 2.25 12.9142 2.25 12.5Z" fill="#2F2B43"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 19.5C2.25 19.0858 2.58579 18.75 3 18.75H21C21.4142 18.75 21.75 19.0858 21.75 19.5C21.75 19.9142 21.4142 20.25 21 20.25H3C2.58579 20.25 2.25 19.9142 2.25 19.5Z" fill="#2F2B43"/>
        </svg>
        <svg style="display: none" class="open" xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
          <path d="M15.0005 1.49989L1.00049 15.4999M1.00049 1.49989L15.0005 15.4999" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
        </svg>
      </div>
    </div>
    <div class="header-bottom" style="display: none"> 
      <div class="cat-btn-wrap">
        <?php global $post; if ($post->ID == 1264) : ?>
        <span class="cat-btn">
          <div class="icon closed">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 5C2.25 4.58579 2.58579 4.25 3 4.25H21C21.4142 4.25 21.75 4.58579 21.75 5C21.75 5.41421 21.4142 5.75 21 5.75H3C2.58579 5.75 2.25 5.41421 2.25 5Z" fill="#C01025"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 12C2.25 11.5858 2.58579 11.25 3 11.25H21C21.4142 11.25 21.75 11.5858 21.75 12C21.75 12.4142 21.4142 12.75 21 12.75H3C2.58579 12.75 2.25 12.4142 2.25 12Z" fill="#C01025"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 19C2.25 18.5858 2.58579 18.25 3 18.25H21C21.4142 18.25 21.75 18.5858 21.75 19C21.75 19.4142 21.4142 19.75 21 19.75H3C2.58579 19.75 2.25 19.4142 2.25 19Z" fill="#C01025"/>
            </svg>
          </div>
          <div class="icon open" style="display: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M15.0005 0.999893L1.00049 14.9999M1.00049 0.999893L15.0005 14.9999" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
            </svg>
          </div>
          <p>Каталог</p>
          
        </span>
        <?php else : ?>
        <a href="<?php the_permalink(1264); ?>" class="cat-btn">
          <div class="icon closed">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 5C2.25 4.58579 2.58579 4.25 3 4.25H21C21.4142 4.25 21.75 4.58579 21.75 5C21.75 5.41421 21.4142 5.75 21 5.75H3C2.58579 5.75 2.25 5.41421 2.25 5Z" fill="#C01025"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 12C2.25 11.5858 2.58579 11.25 3 11.25H21C21.4142 11.25 21.75 11.5858 21.75 12C21.75 12.4142 21.4142 12.75 21 12.75H3C2.58579 12.75 2.25 12.4142 2.25 12Z" fill="#C01025"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 19C2.25 18.5858 2.58579 18.25 3 18.25H21C21.4142 18.25 21.75 18.5858 21.75 19C21.75 19.4142 21.4142 19.75 21 19.75H3C2.58579 19.75 2.25 19.4142 2.25 19Z" fill="#C01025"/>
            </svg>
          </div>
          <div class="icon open" style="display: none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M15.0005 0.999893L1.00049 14.9999M1.00049 0.999893L15.0005 14.9999" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
            </svg>
          </div>
          <p>Каталог</p>
          
        </a>
        <?php endif; ?>
        
        <div class="catalog-menu" style="display: none">
          <div class="container">
            <div class="catalog-menu-wrap">
              <nav class="left" itemscope itemtype="http://schema.org/SiteNavigationElement">
                <?php if (have_rows('catalog_menu', 'options')) : while(have_rows('catalog_menu', 'options')) : the_row(); ?>
                  <div class="item">
                    <div class="icon">
                      <img src="<?php the_sub_field('ikonka'); ?>" alt="Icon">
                    </div>
                    <b><?php the_sub_field('nazvanie_punkta'); ?></b>
                    <ul itemprop="about" itemscope itemtype="http://schema.org/ItemList">
                      <?php if (have_rows('punkty_menyu')) : while(have_rows('punkty_menyu')) : the_row(); ?>
                      <li><a href="<?php the_sub_field('ssylka'); ?>"><?php the_sub_field('imya'); ?></a></li>
                      <?php endwhile; endif; ?>
                    </ul>
                  </div>
                <?php endwhile; endif; ?>
              </nav>
              <?php $cat_menu_img = get_field('banner', 'options'); if ($cat_menu_img) : ?>
              <?php if (!is_page(1313)) : ?>
                <a href="<?php echo get_field('banner_href', 'options'); ?>" class="right">
                  <?php 
                    if ($cat_menu_img['alt']) {
                      echo '<img src="' . esc_url($cat_menu_img['url']) . '" alt="' . esc_attr($cat_menu_img['alt']) . '">'; // Выводим изображение
                    } else {
                      echo '<img src="' . esc_url($cat_menu_img['url']) . '" alt="' . get_sub_field('name') . '">'; // Выводим изображение
                    }
                  ?>
                </a>
              <?php else : ?>
                <span class="right">
                  <?php 
                    if ($cat_menu_img['alt']) {
                      echo '<img src="' . esc_url($cat_menu_img['url']) . '" alt="' . esc_attr($cat_menu_img['alt']) . '">'; // Выводим изображение
                    } else {
                      echo '<img src="' . esc_url($cat_menu_img['url']) . '" alt="' . get_sub_field('name') . '">'; // Выводим изображение
                    }
                  ?>
                </span>
              <?php endif; ?>
              
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <nav class="menu" itemscope itemtype="http://schema.org/SiteNavigationElement" style="display: none"> 
        <ul itemprop="about" itemscope itemtype="http://schema.org/ItemList">
        <?php  
          wp_nav_menu( array(
            'menu_class' => '',
            'theme_location' => 'menu-1',
            'container' => null,
            'walker'=> new True_Walker_Nav_Menu() // этот параметр нужно добавить
          )); 
        ?>
        </ul>
      </nav> 
    </div> 
  </div> 
</header>






	