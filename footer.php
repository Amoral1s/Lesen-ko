
<footer class="footer">
  <div class="container">
    <div class="footer-wrap">
      <div class="footer-wrap-item">
        <?php if (is_home()) : ?>
          <div  class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.svg" title="lesen-ko.ru" alt="lesen-ko.ru">
          </div>
          <?php else : ?>
          <a href="/" class="logo">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.svg" title="lesen-ko.ru" alt="lesen-ko.ru">
          </a>
        <?php endif; ?>
        <div class="block">
          <div class="left">
            <a class="phone" href="tel:<?php the_field('phone', 'options'); ?>" target="blank">
              <?php the_field('phone', 'options'); ?>         
            </a> 
            <time>
              <?php the_field('work_time', 'options'); ?>  
            </time>
          </div>
          <div class="right">
            <a class="email" href="mailto:<?php the_field('email', 'options'); ?>" target="blank">
              <?php the_field('email', 'options'); ?>         
            </a> 
          </div>
        </div>
        <a class="button button-transparent pc" href="<?php the_field('whatsapp', 'options'); ?>" target="blank">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3991 13.9056C16.1595 13.7864 14.9851 13.212 14.7665 13.132C14.5478 13.0528 14.3886 13.0136 14.2287 13.252C14.0695 13.4888 13.6121 14.0248 13.4731 14.1832C13.3332 14.3424 13.1941 14.3616 12.9554 14.2432C12.7166 14.1232 11.9465 13.8728 11.0342 13.0632C10.3244 12.4328 9.84448 11.6544 9.70541 11.416C9.56635 11.1784 9.69014 11.0496 9.80991 10.9312C9.91763 10.8248 10.0487 10.6536 10.1684 10.5152C10.2882 10.376 10.3276 10.2768 10.4072 10.1176C10.4876 9.95922 10.4474 9.82082 10.3871 9.70162C10.3276 9.58242 9.85011 8.41202 9.65075 7.93603C9.45702 7.47283 9.26008 7.53603 9.11378 7.52803C8.97391 7.52163 8.81475 7.52003 8.65558 7.52003C8.49642 7.52003 8.23758 7.57923 8.01893 7.81763C7.79948 8.05522 7.18293 8.63042 7.18293 9.80082C7.18293 10.9704 8.03823 12.1008 8.158 12.26C8.27777 12.4184 9.84207 14.82 12.2383 15.8496C12.8091 16.0944 13.2536 16.2408 13.6001 16.3496C14.1724 16.5312 14.6933 16.5056 15.1049 16.444C15.5631 16.376 16.518 15.8688 16.7174 15.3136C16.9159 14.7584 16.9159 14.2824 16.8565 14.1832C16.797 14.084 16.6378 14.0248 16.3983 13.9056H16.3991ZM12.0406 19.828H12.0374C10.6141 19.8283 9.21697 19.4475 7.99241 18.7256L7.70302 18.5544L4.69502 19.34L5.49806 16.4216L5.30916 16.1224C4.51346 14.8619 4.09237 13.403 4.09454 11.9144C4.09615 7.55443 7.66042 4.00723 12.0438 4.00723C14.166 4.00723 16.1611 4.83123 17.6611 6.32563C18.401 7.05889 18.9874 7.93088 19.3864 8.89114C19.7854 9.85141 19.9892 10.8809 19.9858 11.92C19.9842 16.28 16.42 19.828 12.0406 19.828ZM18.8026 5.19043C17.9169 4.30317 16.8631 3.59966 15.7022 3.12067C14.5413 2.64168 13.2965 2.39674 12.0398 2.40003C6.77136 2.40003 2.48202 6.66803 2.48041 11.9136C2.47961 13.5904 2.91931 15.2272 3.75612 16.6696L2.40002 21.6L7.46749 20.2768C8.86931 21.0369 10.4402 21.4352 12.0366 21.4352H12.0406C17.309 21.4352 21.5984 17.1672 21.6 11.9208C21.6039 10.6706 21.3586 9.4321 20.8785 8.27685C20.3983 7.1216 19.6927 6.07256 18.8026 5.19043Z" fill="#03AE00"/>
            </svg>
          </div>
          <p>Whatsapp</p>      
        </a> 
      </div>
      <div class="footer-wrap-item pc">
        <b>Покупателям</b>
        <nav class="menu" itemscope itemtype="http://schema.org/SiteNavigationElement"> 
          <ul itemprop="about" itemscope itemtype="http://schema.org/ItemList">
          <?php  
            wp_nav_menu( array(
              'menu_class' => '',
              'theme_location' => 'menu-2',
              'container' => null,
              'walker'=> new True_Walker_Nav_Menu() // этот параметр нужно добавить
            )); 
          ?>
          </ul>
        </nav> 
      </div>
      <div class="footer-wrap-item">
        <b>Производство и офис</b>
        <p><?php the_field('adres_proizvodstva', 'options'); ?></p>
        <p><?php the_field('adres_ofisa', 'options'); ?></p>
        <a class="button button-transparent mob" style="display: none" href="<?php the_field('whatsapp', 'options'); ?>" target="blank">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3991 13.9056C16.1595 13.7864 14.9851 13.212 14.7665 13.132C14.5478 13.0528 14.3886 13.0136 14.2287 13.252C14.0695 13.4888 13.6121 14.0248 13.4731 14.1832C13.3332 14.3424 13.1941 14.3616 12.9554 14.2432C12.7166 14.1232 11.9465 13.8728 11.0342 13.0632C10.3244 12.4328 9.84448 11.6544 9.70541 11.416C9.56635 11.1784 9.69014 11.0496 9.80991 10.9312C9.91763 10.8248 10.0487 10.6536 10.1684 10.5152C10.2882 10.376 10.3276 10.2768 10.4072 10.1176C10.4876 9.95922 10.4474 9.82082 10.3871 9.70162C10.3276 9.58242 9.85011 8.41202 9.65075 7.93603C9.45702 7.47283 9.26008 7.53603 9.11378 7.52803C8.97391 7.52163 8.81475 7.52003 8.65558 7.52003C8.49642 7.52003 8.23758 7.57923 8.01893 7.81763C7.79948 8.05522 7.18293 8.63042 7.18293 9.80082C7.18293 10.9704 8.03823 12.1008 8.158 12.26C8.27777 12.4184 9.84207 14.82 12.2383 15.8496C12.8091 16.0944 13.2536 16.2408 13.6001 16.3496C14.1724 16.5312 14.6933 16.5056 15.1049 16.444C15.5631 16.376 16.518 15.8688 16.7174 15.3136C16.9159 14.7584 16.9159 14.2824 16.8565 14.1832C16.797 14.084 16.6378 14.0248 16.3983 13.9056H16.3991ZM12.0406 19.828H12.0374C10.6141 19.8283 9.21697 19.4475 7.99241 18.7256L7.70302 18.5544L4.69502 19.34L5.49806 16.4216L5.30916 16.1224C4.51346 14.8619 4.09237 13.403 4.09454 11.9144C4.09615 7.55443 7.66042 4.00723 12.0438 4.00723C14.166 4.00723 16.1611 4.83123 17.6611 6.32563C18.401 7.05889 18.9874 7.93088 19.3864 8.89114C19.7854 9.85141 19.9892 10.8809 19.9858 11.92C19.9842 16.28 16.42 19.828 12.0406 19.828ZM18.8026 5.19043C17.9169 4.30317 16.8631 3.59966 15.7022 3.12067C14.5413 2.64168 13.2965 2.39674 12.0398 2.40003C6.77136 2.40003 2.48202 6.66803 2.48041 11.9136C2.47961 13.5904 2.91931 15.2272 3.75612 16.6696L2.40002 21.6L7.46749 20.2768C8.86931 21.0369 10.4402 21.4352 12.0366 21.4352H12.0406C17.309 21.4352 21.5984 17.1672 21.6 11.9208C21.6039 10.6706 21.3586 9.4321 20.8785 8.27685C20.3983 7.1216 19.6927 6.07256 18.8026 5.19043Z" fill="#03AE00"/>
            </svg>
          </div>
          <p>Whatsapp</p>      
        </a> 
      </div>
      <div class="footer-wrap-item">
        <div class="form">
          <b>Заявка на обратный звонок</b>
          <?php echo do_shortcode('[contact-form-7 id="596f766" title="Заявка на обратный звонок"]'); ?>
        </div>

      </div>
    </div>
    
  </div>
  <div class="footer-bot">
    <div class="container">
      <a href="<?php the_permalink(3); ?>">Политика конфиденциальности</a>
      <a href="/sitemap/">Карта сайта</a>
      <p>Не является публичной офертой</p>
    </div>
  </div>
</footer>

<div class="overlay"></div>


<div class="popup popup-video">
  <div class="close">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
      <path d="M15.0005 1L1.00049 15M1.00049 1L15.0005 15" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
    </svg>
  </div>
  <iframe width="860" height="515" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>

<div class="popup popup-callback">
  <div class="close">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
      <path d="M15.0005 1L1.00049 15M1.00049 1L15.0005 15" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
    </svg>
  </div>
  <b>Заказать обратный звонок</b>
  <p>Мы постараемся ответить максимально быстро и подробно ответить на ваши вопросы</p>
  <div class="form">
    <?php echo do_shortcode('[contact-form-7 id="f853758" title="Заказать обратный звонок (popup)"]'); ?>
  </div>
</div>

<div class="popup popup-buy">
  <div class="close">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
      <path d="M15.0005 1L1.00049 15M1.00049 1L15.0005 15" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
    </svg>
  </div>
  <b>Заказать лестницу</b>
  <p>Мы постараемся ответить максимально быстро и подробно ответить на ваши вопросы</p>
  <div class="form">
    <?php echo do_shortcode('[contact-form-7 id="6de9a0d" title="Заказ лестницы"]'); ?>
  </div>
</div>

<div class="popup popup-calc">
  <div class="close">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
      <path d="M15.0005 1L1.00049 15M1.00049 1L15.0005 15" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
    </svg>
  </div>
  <b>Заказать лестницу</b>
  <p>Мы постараемся ответить максимально быстро и подробно ответить на ваши вопросы</p>
  <div class="form">
    <?php echo do_shortcode('[contact-form-7 id="72bf55b" title="Расчёт калькулятора"]'); ?>
  </div>
</div>

<div class="popup" id="thx">
  <div class="wrapper">
    <div class="close">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M15.0005 1L1.00049 15M1.00049 1L15.0005 15" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
      </svg>
    </div>
    <div class="icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="61" height="60" viewBox="0 0 61 60" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.7902 30.2903C9.56978 31.5107 9.56978 33.4893 10.7902 34.7097L20.7902 44.7097C22.0106 45.9301 23.9892 45.9301 25.2096 44.7097L50.2096 19.7097C51.43 18.4893 51.43 16.5107 50.2096 15.2903C48.9892 14.0699 47.0106 14.0699 45.7902 15.2903L22.9999 38.0806L15.2096 30.2903C13.9892 29.0699 12.0106 29.0699 10.7902 30.2903Z" fill="white"/>
      </svg>
    </div>
    <b>Ваша заявка отправлена</b>
    <p>Мы перезвоним в течение 10 минут</p>
    <div class="button close-button">
      Понятно
    </div>
  </div>
</div>

<div class="popup" id="thx-feed">
  <div class="wrapper">
    <div class="close">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path d="M15.0005 1L1.00049 15M1.00049 1L15.0005 15" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
      </svg>
    </div>
    <div class="icon">
      <svg xmlns="http://www.w3.org/2000/svg" width="51" height="51" viewBox="0 0 51 51" fill="none">
        <path d="M46.3334 12.9998C46.3334 8.39746 42.6024 4.6665 38 4.6665C33.3976 4.6665 29.6667 8.39746 29.6667 12.9998C29.6667 17.6022 33.3976 21.3332 38 21.3332C42.6024 21.3332 46.3334 17.6022 46.3334 12.9998Z" stroke="white" stroke-width="3.125"/>
        <path d="M35.4455 13.3814C35.4455 13.3814 36.4673 13.9641 36.9782 14.8183C36.9782 14.8183 38.5109 11.4655 40.5545 10.3479" stroke="white" stroke-width="2.39487" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M13.2059 41.1249C10.4973 40.8584 8.46825 40.0449 7.10746 38.684C4.66669 36.2434 4.66669 32.3149 4.66669 24.4582V23.4165C4.66669 15.5598 4.66669 11.6314 7.10746 9.19065C9.54825 6.74988 13.4766 6.74988 21.3334 6.74988H24.4584M14.0417 37.9999C13.6136 40.0872 11.7035 44.5968 13.6577 46.0522C14.6792 46.7953 16.3069 46.0015 19.5623 44.4143C21.8469 43.3001 24.1588 42.0226 26.6554 41.4478C27.569 41.2397 28.499 41.1509 29.6667 41.1249C37.5234 41.1249 41.4519 41.1249 43.8925 38.684C46.2229 36.3536 46.3284 32.6672 46.3332 25.4999" stroke="white" stroke-width="3.125" stroke-linecap="round"/>
        <path d="M17.1666 29.6665H29.6666M17.1666 19.2499H23.4166" stroke="white" stroke-width="3.125" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>
    <b>Спасибо за комментарий</b>
    <p>Он будет опубликован после проверки модератором</p>
    <div class="button close-button">
      Понятно
    </div>
  </div>
</div>

<div class="mob-menu" style="display: none">
  <div class="container">
    <div class="toggle">
      <span>Каталог</span>
    </div>
    <div class="mob-menu-catalog">
      <div class="back-btn">
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12" fill="none">
            <path d="M2 5.99978L18 5.99982M2 5.99978L6.99996 10.9998M2 5.99978L7 0.999817" stroke="#C01025" stroke-width="1.5"/>
          </svg>
        </div>
        <span>Назад</span>
      </div>
      <nav class="left" itemscope itemtype="http://schema.org/SiteNavigationElement">
        <?php if (have_rows('catalog_menu', 'options')) : while(have_rows('catalog_menu', 'options')) : the_row(); ?>
          <div class="item">
            <div class="item-header">
              <div class="icon">
                <img src="<?php the_sub_field('ikonka'); ?>" alt="Icon">
              </div>
              <b><?php the_sub_field('nazvanie_punkta'); ?></b>
            </div>
            <ul itemprop="about" itemscope itemtype="http://schema.org/ItemList">
              <?php if (have_rows('punkty_menyu')) : while(have_rows('punkty_menyu')) : the_row(); ?>
              <li><a href="<?php the_sub_field('ssylka'); ?>"><?php the_sub_field('imya'); ?></a></li>
              <?php endwhile; endif; ?>
            </ul>
          </div>
        <?php endwhile; endif; ?>
      </nav>
    </div>
    <nav class="menu" itemscope itemtype="http://schema.org/SiteNavigationElement"> 
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
    <div class="mob-menu-contacts">
      <div class="left">
        <a class="phone" href="tel:<?php the_field('phone', 'options'); ?>" target="blank">
          <?php the_field('phone', 'options'); ?>         
        </a> 
        <time>
          <?php the_field('work_time', 'options'); ?>  
        </time>
      </div>
      <div class="right">
        <a class="email" href="mailto:<?php the_field('email', 'options'); ?>" target="blank">
          <?php the_field('email', 'options'); ?>         
        </a> 
      </div>
    </div>
    <div class="btns">
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
    </div>
  </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
