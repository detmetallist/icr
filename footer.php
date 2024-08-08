<?php global $lang; ?>
    <footer class="footer">
      <div class="container">
			  <div class="footer-content">
          <div class="widget_text wsfooterwdget">
            <p class="footer-title">
              <?php if($lang=='uk'): ?>
                <?php echo do_shortcode('[sc name="footer_zagolovok1_ukr"][/sc]'); ?>
              <?php else: ?>
                <?php echo do_shortcode('[sc name="footer_zagolovok1_rus"][/sc]'); ?>
              <?php endif; ?>
            </p>
            <div class="textwidget custom-html-widget">
              <div class="footer-address">
                вул. Промислова, 1, <br>
                м. Київ, 02000, <br>
                Україна💙💛
              </div>
            </div>
          </div>
	        <div class="footer-col footer-contact">
            <p class="footer-title">
              <?php if($lang=='uk'): ?>
                <?php echo do_shortcode('[sc name="footer_zagolovok2_ukr"][/sc]').':'; ?>
              <?php else: ?>
                <?php echo do_shortcode('[sc name="footer_zagolovok2_rus"][/sc]').':'; ?>
              <?php endif; ?>
            </p>
            <div>
              <a href="tg://resolve?domain=<?php echo do_shortcode('[sc name="telegram"][/sc]'); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/telega.svg" alt="" /></a>
              <a href="viber://chat?number=%2B<?php echo do_shortcode('[sc name="viber"][/sc]'); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/viber.svg" alt="" /></a>
              <a href="https://wa.me/<?php echo do_shortcode('[sc name="whatsapp"][/sc]'); ?>"><img src="<?php echo get_template_directory_uri() ?>/img/whatsapp.svg" alt="" /></a>
              <a class="header-link--phone" href="tel:<?php echo do_shortcode('[sc name="phone"][/sc]'); ?>"><?php echo do_shortcode('[sc name="phone"][/sc]'); ?></a>
            </div>
            <div class="">
              <a class="footer-mail" href="mailto:<?php echo do_shortcode('[sc name="email"][/sc]'); ?>"> 
                <img src="<?php echo get_template_directory_uri() ?>/img/icon-mail.svg" alt="" /> 
                <span><?php echo do_shortcode('[sc name="email"][/sc]'); ?></span>
              </a> 
            </div>
			    </div>
          <div class="widget_text wsfooterwdget">
            <p class="footer-title">
              <?php if($lang=='uk'): ?>
                <?php echo do_shortcode('[sc name="footer_zagolovok3_ukr"][/sc]').':'; ?>
              <?php else: ?>
                <?php echo do_shortcode('[sc name="footer_zagolovok3_rus"][/sc]').':'; ?>
              <?php endif; ?>
            </p>
            <div class="textwidget custom-html-widget">
              <div class="footer-col footer-nav">
                <?php global $lang; ?>
                <a href="<?php echo do_shortcode('[sc name="url1"][/sc]'); ?>" class="check-certificate-popup pum-trigger" style="cursor: pointer;">
                  <?php if($lang=='uk') {
                    echo do_shortcode('[sc name="url1_ukr_text"][/sc]');
                  } else {
                    echo do_shortcode('[sc name="url1_rus_text"][/sc]');
                  } ?>
                </a>
                <a href="<?php echo do_shortcode('[sc name="url2"][/sc]'); ?>" class="requestoffidoc pum-trigger" style="cursor: pointer;">
                  <?php if($lang=='uk') {
                    echo do_shortcode('[sc name="url2_ukr_text"][/sc]');
                  } else {
                    echo do_shortcode('[sc name="url2_rus_text"][/sc]');
                  } ?>
                </a>
                <a href="<?php echo do_shortcode('[sc name="url3"][/sc]'); ?>" class="call-to-action-popup pum-trigger" style="cursor: pointer;">
                  <?php if($lang=='uk') {
                    echo do_shortcode('[sc name="url3_ukr_text"][/sc]');
                  } else {
                    echo do_shortcode('[sc name="url3_rus_text"][/sc]');
                  } ?>
                </a>
              </div>
            </div>
          </div>    
        </div>
      </div>
      <div class="divider"></div>
		  <div class="">
			  <div class="wsfooterwdget">
          <div class="footer-copyright">LLC "ICR" © 2022 Все права защищены.</div>
        </div>
		  </div>
    </footer>
  </body>
  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/main.js?v=1"></script>
</html>
<?php wp_footer(); ?>