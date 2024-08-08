<?php
   global $lang;
   $lang=wpm_get_language();
   function get_image($field){
      global $post;
      $img=get_post_meta($post->ID, $field, 1); 
      $src = wp_get_attachment_image_src( $img,'full');
      if($src){
         $result=$src[0];
      } else {
         $src = wp_get_attachment_url( $img);
         $result=$src;
      }
      return $result;
   }
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <?php wp_head(); ?>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/style.css?v=1" media="all">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700;900&display=swap" rel="stylesheet">
      <title>Inspection certification registration</title>
   </head>
   <body>
      <div class="popup_forms">
         <div class="popup_over"></div>
         <div class="forms">
            <div class="form_close"><img src="<?php echo get_template_directory_uri() ?>/img/close.svg"></div>
            <div id="form5" class="form_block"><?php echo do_shortcode('[contact-form-7 id="5" title="Запрос на официальные документы"]'); ?></div>
            <div id="form202" class="form_block"><?php echo do_shortcode('[contact-form-7 id="202" title="Контактная форма на главной странице"]'); ?></div>
            <div id="form203" class="form_block"><?php echo do_shortcode('[contact-form-7 id="203" title="Обратная связь с клиентом"]'); ?></div>
            <div id="form204" class="form_block"><?php echo do_shortcode('[contact-form-7 id="204" title="Проверка Сертфиката"]'); ?></div>
            <div id="form205" class="form_block"><?php echo do_shortcode('[contact-form-7 id="205" title="Просчет ISO Сертификации"]'); ?></div>
            <div id="form206" class="form_block"><?php echo do_shortcode('[contact-form-7 id="206" title="Просчет СЕ сертификации"]'); ?></div>
            <div id="form207" class="form_block"><?php echo do_shortcode('[contact-form-7 id="207" title="Расчет проведения испытаний"]'); ?></div>
            <div id="form208" class="form_block"><?php echo do_shortcode('[contact-form-7 id="208" title="Сертификация остальных стран"]'); ?></div>
            <div id="form546" class="form_block"><?php echo do_shortcode('[contact-form-7 id="546" title="Расчет уполномоченного представителя"]'); ?></div>
         </div>
      </div>
      <header class="header">
         <div class="header-logo logo">
            <span></span>
            <a href="/" class="custom-logo-link" rel="home" aria-current="page">
               <img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" class="custom-logo" alt="" decoding="async">
               <img src="<?php echo get_template_directory_uri() ?>/img/logo-mobile.svg" class="mobile-logo">
            </a>
         </div>
         <div class="header-menu">
            <div class="header-menu--top">
               <div class="header-link--mail">
                  <a href="mailto:<?php echo do_shortcode('[sc name="email"][/sc]'); ?>"> 
                     <img src="<?php echo get_template_directory_uri() ?>/img/icon-mail.svg" alt="" /> 
                     <span><?php echo do_shortcode('[sc name="email"][/sc]'); ?></span>
                  </a>
               </div>
               <div class="header-link">
                  <a href="tg://resolve?domain=<?php echo do_shortcode('[sc name="telegram"][/sc]'); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/telega.svg" alt="" /></a>
                  <a href="viber://chat?number=%2B<?php echo do_shortcode('[sc name="viber"][/sc]'); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/viber.svg" alt="" /></a>
                  <a href="https://wa.me/<?php echo do_shortcode('[sc name="whatsapp"][/sc]'); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/whatsapp.svg" alt="" /></a>
                  <a class="header-link--phone" href="tel:<?php echo do_shortcode('[sc name="phone"][/sc]'); ?>"><?php echo do_shortcode('[sc name="phone"][/sc]'); ?></a>
               </div>
               <aside id="secondary" class="widget-area">
                  <section id="wpm_language_switcher-4" class="widget wpm widget_language_switcher">
                     <h2 class="widget-title">Языки</h2>
                     <?php if ( function_exists ( 'wpm_language_switcher' ) ) { wpm_language_switcher('dropdown','name');} ?>
                     
                  </section>                  
               </aside>
               <!-- #secondary -->
            </div>
            <div class="header-menu--bottom">
               <?php
                  wp_nav_menu(
                     array(
                        'theme_location'  => 'main_menu',
                        'container'       => 'ul',
                        'menu_class'      => 'menu'
                     )
                  );
               ?>
            </div>
         </div>
         <div class="mobile-menu-wrap">
            <span></span><span></span><span></span>
            <img class="menu-close" src="<?php echo get_template_directory_uri() ?>/img/menu-close.svg">
         </div>
         <button class="menu-back"><img src="<?php echo get_template_directory_uri() ?>/img/menu-back.svg"></button>
      </header>