<?php
/**
 Template Name: Контакты
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

<section class="contacts container">
  <div class="contacts-wrap">
    <div class="left">
      <h1 class="page-title"><?php the_title(); ?></h1>
      <div class="row">
        <div class="row-left">
          <a class="phone" href="tel:<?php echo get_field('phone', 'options'); ?>" target="blank">
            <?php echo get_field('phone', 'options'); ?>         
          </a> 
          <time>
            <?php echo get_field('work_time', 'options'); ?>  
          </time>
        </div>
        <div class="row-right">
          <a class="button button-transparent" href="<?php echo get_field('whatsapp', 'options'); ?>" target="blank">
            <div class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3991 13.9056C16.1595 13.7864 14.9851 13.212 14.7665 13.132C14.5478 13.0528 14.3886 13.0136 14.2287 13.252C14.0695 13.4888 13.6121 14.0248 13.4731 14.1832C13.3332 14.3424 13.1941 14.3616 12.9554 14.2432C12.7166 14.1232 11.9465 13.8728 11.0342 13.0632C10.3244 12.4328 9.84448 11.6544 9.70541 11.416C9.56635 11.1784 9.69014 11.0496 9.80991 10.9312C9.91763 10.8248 10.0487 10.6536 10.1684 10.5152C10.2882 10.376 10.3276 10.2768 10.4072 10.1176C10.4876 9.95922 10.4474 9.82082 10.3871 9.70162C10.3276 9.58242 9.85011 8.41202 9.65075 7.93603C9.45702 7.47283 9.26008 7.53603 9.11378 7.52803C8.97391 7.52163 8.81475 7.52003 8.65558 7.52003C8.49642 7.52003 8.23758 7.57923 8.01893 7.81763C7.79948 8.05522 7.18293 8.63042 7.18293 9.80082C7.18293 10.9704 8.03823 12.1008 8.158 12.26C8.27777 12.4184 9.84207 14.82 12.2383 15.8496C12.8091 16.0944 13.2536 16.2408 13.6001 16.3496C14.1724 16.5312 14.6933 16.5056 15.1049 16.444C15.5631 16.376 16.518 15.8688 16.7174 15.3136C16.9159 14.7584 16.9159 14.2824 16.8565 14.1832C16.797 14.084 16.6378 14.0248 16.3983 13.9056H16.3991ZM12.0406 19.828H12.0374C10.6141 19.8283 9.21697 19.4475 7.99241 18.7256L7.70302 18.5544L4.69502 19.34L5.49806 16.4216L5.30916 16.1224C4.51346 14.8619 4.09237 13.403 4.09454 11.9144C4.09615 7.55443 7.66042 4.00723 12.0438 4.00723C14.166 4.00723 16.1611 4.83123 17.6611 6.32563C18.401 7.05889 18.9874 7.93088 19.3864 8.89114C19.7854 9.85141 19.9892 10.8809 19.9858 11.92C19.9842 16.28 16.42 19.828 12.0406 19.828ZM18.8026 5.19043C17.9169 4.30317 16.8631 3.59966 15.7022 3.12067C14.5413 2.64168 13.2965 2.39674 12.0398 2.40003C6.77136 2.40003 2.48202 6.66803 2.48041 11.9136C2.47961 13.5904 2.91931 15.2272 3.75612 16.6696L2.40002 21.6L7.46749 20.2768C8.86931 21.0369 10.4402 21.4352 12.0366 21.4352H12.0406C17.309 21.4352 21.5984 17.1672 21.6 11.9208C21.6039 10.6706 21.3586 9.4321 20.8785 8.27685C20.3983 7.1216 19.6927 6.07256 18.8026 5.19043Z" fill="#03AE00"/>
              </svg>
            </div>
            <p>Whatsapp</p>      
          </a> 
        </div>
        <a class="email" href="mailto:<?php echo get_field('email', 'options'); ?>" target="blank">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M6.38564 8.5699C6.62318 8.23057 7.09082 8.14804 7.43016 8.38557L12.0001 11.5845L16.57 8.38557C16.9093 8.14804 17.377 8.23056 17.6145 8.5699C17.852 8.90924 17.7695 9.37689 17.4302 9.61442L12.4302 13.1144C12.1719 13.2952 11.8282 13.2952 11.57 13.1144L6.56997 9.61442C6.23063 9.37689 6.1481 8.90924 6.38564 8.5699Z" fill="#C01025"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5.75C3.30964 5.75 2.75 6.30964 2.75 7L2.75 17C2.75 17.6904 3.30964 18.25 4 18.25L20 18.25C20.6904 18.25 21.25 17.6904 21.25 17L21.25 7C21.25 6.30964 20.6904 5.75 20 5.75L4 5.75ZM1.25 7C1.25 5.48122 2.48122 4.25 4 4.25L20 4.25C21.5188 4.25 22.75 5.48122 22.75 7L22.75 17C22.75 18.5188 21.5188 19.75 20 19.75L4 19.75C2.48122 19.75 1.25 18.5188 1.25 17L1.25 7Z" fill="#C01025"/>
            </svg>
          </div>
          <span><?php echo get_field('email', 'options'); ?>     </span>    
        </a>
      </div>
     
      <b>
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M15.5352 10C15.5352 11.933 13.9682 13.5 12.0352 13.5C10.1022 13.5 8.53516 11.933 8.53516 10C8.53516 8.067 10.1022 6.5 12.0352 6.5C13.9682 6.5 15.5352 8.067 15.5352 10Z" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M12 2C7.58172 2 4 5.61783 4 10.0807C4 12.6325 5 14.6167 7 16.389C8.40971 17.6382 10.9746 20.3179 12 21.9999C13.0773 20.3514 15.5903 17.6382 17 16.389C19 14.6167 20 12.6325 20 10.0807C20 5.61783 16.4183 2 12 2Z" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
          </svg>
        </div>
        <span>Производство и офис</span>
      </b>
      <address><?php echo get_field('adres_proizvodstva', 'options'); ?></address>
      <a target="blank" rel="nofollow noindex" href="<?php echo get_field('addres_yandex', 'options'); ?>" class="how mob">Как проехать?</a>
      <div class="how-pc">
        <div class="toggle">Как проехать?</div>
        <div class="content">
          <?php echo get_field('how_content', 'options'); ?>
        </div>
      </div>
      <b>
        <div class="icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M15.5352 10C15.5352 11.933 13.9682 13.5 12.0352 13.5C10.1022 13.5 8.53516 11.933 8.53516 10C8.53516 8.067 10.1022 6.5 12.0352 6.5C13.9682 6.5 15.5352 8.067 15.5352 10Z" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
            <path d="M12 2C7.58172 2 4 5.61783 4 10.0807C4 12.6325 5 14.6167 7 16.389C8.40971 17.6382 10.9746 20.3179 12 21.9999C13.0773 20.3514 15.5903 17.6382 17 16.389C19 14.6167 20 12.6325 20 10.0807C20 5.61783 16.4183 2 12 2Z" stroke="#C01025" stroke-width="1.5" stroke-linejoin="round"/>
          </svg>
        </div>
        <span>Дополнительный офис</span>
      </b>
      <address><?php echo get_field('adres_ofisa', 'options'); ?></address>
    </div>
    <div class="right">
     <iframe src="<?php echo get_field('map','options'); ?>" width="765" height="450" frameborder="0"></iframe>
    </div>
    

   
    

  </div>
</section>

<?php if (get_field('req', 'options')) { ?>
<section class="req container">
  <h2 class="title">
    Реквизиты
  </h2>
  <div class="req-wrap">
    <div class="left">
        <?php if( have_rows('req', 'options') ): while( have_rows('req', 'options') ): the_row(); ?>
        <div class="item">
          <b><?php echo get_sub_field('nazvanie'); ?></b>
          <p><?php echo get_sub_field('dannye'); ?></p>
        </div>
        <?php endwhile; endif; ?>
    </div>
    <div class="right">

      <?php if (get_field('personal', 'options')) : ?>
      <div class="personal">
        <?php if( have_rows('personal', 'options') ): while( have_rows('personal', 'options') ): the_row(); ?>
        <div class="item">
          <p><?php echo get_sub_field('dolzhnost'); ?></p>
          <b><?php echo get_sub_field('imya'); ?></b>
          <?php if (get_sub_field('kontakt')) : ?>
          <a target="blank" href="mailto:<?php echo get_sub_field('kontakt'); ?>"><?php echo get_sub_field('kontakt'); ?></a>
          <?php endif; ?>
        </div>
        <?php endwhile; endif; ?>
      </div>
      <?php endif; ?>
      <?php if (get_field('dokumenty', 'options')) : ?>
      <div class="files">
        <?php if( have_rows('dokumenty', 'options') ): while( have_rows('dokumenty', 'options') ): the_row(); ?>
        <a href="<?php echo get_sub_field('fajl'); ?>" target="blank" download class="item">
          <div class="icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 17C8.25 16.5858 8.58579 16.25 9 16.25L15 16.25C15.4142 16.25 15.75 16.5858 15.75 17C15.75 17.4142 15.4142 17.75 15 17.75L9 17.75C8.58579 17.75 8.25 17.4142 8.25 17Z" fill="#C01025"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4697 13.5303C11.7626 13.8232 12.2374 13.8232 12.5303 13.5303L16.0303 10.0303C16.3232 9.73744 16.3232 9.26256 16.0303 8.96967C15.7374 8.67678 15.2626 8.67678 14.9697 8.96967L12.75 11.1893V6C12.75 5.58579 12.4142 5.25 12 5.25C11.5858 5.25 11.25 5.58579 11.25 6V11.1893L9.03033 8.96967C8.73744 8.67678 8.26256 8.67678 7.96967 8.96967C7.67678 9.26256 7.67678 9.73744 7.96967 10.0303L11.4697 13.5303Z" fill="#C01025"/>
              <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2.75C6.89137 2.75 2.75 6.89137 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75ZM1.25 12C1.25 6.06294 6.06294 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12Z" fill="#C01025"/>
            </svg>
          </div>
          <div class="item-data">
            <b><?php echo get_sub_field('zagolovok'); ?></b>
            <p><?php echo get_sub_field('nazvanie_dokumenta_i_ves'); ?></p>
          </div>
        </a>
        <?php endwhile; endif; ?>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php } ?>

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

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "ContactPage",
    "breadcrumb": {
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "item": {
          "@id": "https://lesen-ko.ru/",
          "name": "Главная"
        }
      },{
        "@type": "ListItem",
        "position": 2,
        "item": {
          "@id": "https://lesen-ko.ru/kontakty",
          "name": "Контакты"
        }
      }]
    },
    "lastReviewed": "2023-03-20",
    "mainContentOfPage": {
      "@type": "WebPageElement",
      "description": "Контактная информация и форма обратной связи."
    }
  }
</script>
<?php
get_footer();
