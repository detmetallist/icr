<?php /* Template Name: Шаблон главной страницы */ ?>
<?php get_header(); ?>
    <section class="main">
	    <video autoplay preload="auto" playsinline muted loop id="myVideo" style="background-image: url(<?php echo get_image('img_ekran1') ?>)">
        <source src="<?php echo get_image('video_ekran1') ?>" type="video/mp4">
      </video>
      <div class="main-bg">
        <div class="main-title--wrap">
          <h1 class="main-title"><?php echo get_post_meta($post->ID, 'zagolovok_ekran1_'.$lang, 1);?></h1>
          <p><?php echo get_post_meta($post->ID, 'podzagolovok_ekran1_'.$lang, 1);?></p>
        </div>
      </div>
	    <div class="popup ">
        <a href="<?php echo do_shortcode('[sc name="info_o_stoimosti_url"][/sc]'); ?>" class='main-page-modal'>
          <?php if($lang=='uk'): ?>
            <?php echo do_shortcode('[sc name="info_o_stoimosti_text_ukr"][/sc]'); ?>
          <?php else: ?>
            <?php echo do_shortcode('[sc name="info_o_stoimosti_text_rus"][/sc]'); ?>
          <?php endif; ?>
        </a>
      </div>
    </section> 
    <section class="about" id="about">
      <h2 class="about-title title"><?php echo get_post_meta($post->ID, 'zagolovok_onas_'.$lang, 1);?></h2>
      <div class="container_bg">
        <div class="background1920" style="background-image: url(<?php echo get_image('img_onas1920') ?>)"></div>
        <div class="background1280" style="background-image: url(<?php echo get_image('img_onas1280') ?>)"></div>
        <div class="background1000" style="background-image: url(<?php echo get_image('img_onas1000') ?>)"></div>
        <div class="background768" style="background-image: url(<?php echo get_image('img_onas768') ?>)"></div>
        <div class="background360" style="background-image: url(<?php echo get_image('img_onas360') ?>)"></div>
        <div class="container-1500">
            <div class="about-text"> 
            	<?php echo get_post_meta($post->ID, 'onas_content_'.$lang, 1);?>
  			    </div> 
  			    <div class="about-text about-text--mobile"> 
            	<div class="do_spoilera">
                <p><strong>ICR</strong> — экспертный центр по вопросам безопасности продукции и Европейской сертификации, повышающий ценность Вашего бизнеса.</p>
                <p>&nbsp;</p>
                <p>Имея успешный опыт уже более 6 лет, мы можем консультировать, помогать и направлять вашу компанию через сложный лабиринт, называемый нормативным соответствием продукции. Сертификационные партнеры в более чем в 10 странах мира.</p>
              </div>
              <div class="posle_spoilera">
                <p>Наша команда дополняется различными партнерствами с испытательными лабораториями, экспертами по безопасности и нотифицированными органами. Благодаря нашей обширной сети экспертов в области права и безопасности мы обеспечиваем соблюдение нормативных требований во всем мире и доступ к вашим продуктам на рынке.</p>
                <p>В штате компании сотрудники постоянно повышают квалификацию, в целях расширения возможностей спектра услуг, а также для конкурентоспособности на рынке. Обращаясь в нашу компанию, мы обязательно подберем для Вас оптимальное решение по выводу сертификации продукции на рынки стран Европейского союза. К каждому клиенту индивидуальный подход.</p>
              </div>
              <span class="otkrit_spoiler">Читать полностью</span>
              <span class="zakrit_spoiler">Скрыть текст</span>
  		      </div> 
        </div>
      </div>
    </section> 
      <section class="advantage">
        <h2 class="advantage-title title"><?php echo get_post_meta($post->ID, 'zagolovok_preim_'.$lang, 1);?></h2>
        <div class="advantage-card--wrap">
          <?php for($i=1; $i<=4; $i++){ ?>
            <div class="advantage-card">
              <div class="container_bg">
                <div class="background1920" style="background-image: url(<?php echo get_image('img_preim1920'.$i) ?>)"></div>
                <div class="background1280" style="background-image: url(<?php echo get_image('img_preim1280'.$i) ?>)"></div>
                <div class="background1000" style="background-image: url(<?php echo get_image('img_preim1000'.$i) ?>)"></div>
                <div class="background768" style="background-image: url(<?php echo get_image('img_preim768'.$i) ?>)"></div>
                <div class="background360" style="background-image: url(<?php echo get_image('img_preim360'.$i) ?>)"></div>
                <div class="advantage-card--content">
                  <img src="<?php echo get_image('svg_preim'.$i); ?>" alt="">
                  <p class="advantage-card--title"><?php echo get_post_meta($post->ID, 'text_preim'.$i.'_'.$lang, 1);?></p>
                </div>
              </div>
            </div>
          <?php } ?>
      </div>
    </section>
    <section>
      <?php 
        $j_kray=1;
        for($i=1; $i<=100; $i++){
          if(get_post_meta($post->ID, 'block_order_'.$lang.'_'.$i, 1)){
            $nomer_ocheredi[$j_kray]=get_post_meta($post->ID, 'block_order_'.$lang.'_'.$i, 1);
            $nomer_i[$j_kray]=$i;
            $j_kray++;
          }
        }
        for($i=1; $i<=$j_kray; $i++){
          for($j=$i+1; $j<=$j_kray; $j++){
            if($nomer_ocheredi[$j]<$nomer_ocheredi[$i]){
              $min_nomer_ocheredi=$nomer_ocheredi[$j];
              $min_nomer_i=$nomer_i[$j];
              $nomer_ocheredi[$j]=$nomer_ocheredi[$i];
              $nomer_i[$j]=$nomer_i[$i];
              $nomer_ocheredi[$i]=$min_nomer_ocheredi;
              $nomer_i[$i]=$min_nomer_i;
            }
          }
        }
        $i_kray=1;
        $nomer_bloka=1;
        for($z=1; $z<=$j_kray; $z++){
          $i=$nomer_i[$z];
          if(get_post_meta($post->ID, 'field_zagolovok_'.$lang.'_'.$i, 1)){ ?>
            <h2 class="main-title--content title"><?php echo get_post_meta($post->ID, 'field_zagolovok_'.$lang.'_'.$i, 1);?></h2>
          <?php }
          if(get_post_meta($post->ID, 'field_text_sprava_'.$lang.'_'.$i, 1)){ ?>
            <div class="main-content--div ce">
              <div class="container_bg">
                <div class="background1920" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1920_'.$i); ?>)"></div>
                <?php if(get_image('field_text_sprava_bg_1280_'.$i)): ?>
                  <div class="background1280" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1280_'.$i); ?>)"></div>
                  <div class="background1000" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1000_'.$i); ?>)"></div>
                  <div class="background768" style="background-image: url(<?php echo get_image('field_text_sprava_bg_768_'.$i); ?>)"></div>
                  <div class="background360" style="background-image: url(<?php echo get_image('field_text_sprava_bg_360_'.$i); ?>)"></div>
                <?php else: ?>
                  <div class="background1280" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1920_'.$i); ?>)"></div>
                  <div class="background1000" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1920_'.$i); ?>)"></div>
                  <div class="background768" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1920_'.$i); ?>)"></div>
                  <div class="background360" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1920_'.$i); ?>)"></div>
                <?php endif; ?>
                <div class="img_over"></div>
                <div class="container-1500">
                  <div class="cetxt-wrap">
                    <div class="ce-text">
                      <?php echo get_post_meta($post->ID, 'field_text_sprava_'.$lang.'_'.$i, 1);?>
                      <?php if(get_post_meta($post->ID, 'field_text_sprava_button_name_'.$lang.'_'.$i, 1)): ?>
                        <a class="link" href="<?php echo get_post_meta($post->ID, 'field_text_sprava_button_url_'.$lang.'_'.$i, 1) ?>"><?php echo get_post_meta($post->ID, 'field_text_sprava_button_name_'.$lang.'_'.$i, 1) ?></a>
                      <?php endif; ?>
                      <?php if(get_post_meta($post->ID, 'field_text_sprava_vovale_'.$lang.'_'.$i, 1)): ?>
                        <div class="info-wrap-noborder">
                          <div class="info-wrap">
                            <div>
                              <img src="<?php echo get_template_directory_uri() ?>/img/info-img.svg" alt="">
                            </div>
                            <div class="info-txt"><p><?php echo get_post_meta($post->ID, 'field_text_sprava_vovale_'.$lang.'_'.$i, 1); ?></p></div>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php }
          if(get_post_meta($post->ID, 'field_text_sleva_'.$lang.'_'.$i, 1)){ ?>
            <div class="main-content--div ce">
              <div class="container_bg">
                <div class="background1920" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1920_'.$i); ?>)"></div>
                <?php if(get_image('field_text_sleva_bg_1280_'.$i)): ?>
                  <div class="background1280" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1280_'.$i); ?>)"></div>
                  <div class="background1000" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1000_'.$i); ?>)"></div>
                  <div class="background768" style="background-image: url(<?php echo get_image('field_text_sleva_bg_768_'.$i); ?>)"></div>
                  <div class="background360" style="background-image: url(<?php echo get_image('field_text_sleva_bg_360_'.$i); ?>)"></div>
                <?php else: ?>
                  <div class="background1280" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1920_'.$i); ?>)"></div>
                  <div class="background1000" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1920_'.$i); ?>)"></div>
                  <div class="background768" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1920_'.$i); ?>)"></div>
                  <div class="background360" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1920_'.$i); ?>)"></div>
                <?php endif; ?>
                <div class="img_over"></div>
                <div class="container-1500">
                  <div class="isotxt-wrap">
                    <div class="cew-text">
                      <?php echo get_post_meta($post->ID, 'field_text_sleva_'.$lang.'_'.$i, 1);?>
                      <?php if(get_post_meta($post->ID, 'field_text_sleva_button_name_'.$lang.'_'.$i, 1)): ?>
                        <a class="link" href="<?php echo get_post_meta($post->ID, 'field_text_sleva_button_url_'.$lang.'_'.$i, 1) ?>"><?php echo get_post_meta($post->ID, 'field_text_sleva_button_name_'.$lang.'_'.$i, 1) ?></a>
                      <?php endif; ?>
                      <?php if(get_post_meta($post->ID, 'field_text_sleva_vovale_'.$lang.'_'.$i, 1)): ?>
                        <div class="info-wrap-noborder">
                          <div class="info-wrap">
                            <div>
                              <img src="<?php echo get_template_directory_uri() ?>/img/info-img.svg" alt="">
                            </div>
                            <div class="info-txt"><p><?php echo get_post_meta($post->ID, 'field_text_sleva_vovale_'.$lang.'_'.$i, 1); ?></p></div>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php }
        }
      ?>
    </section> 
    <section class="map">
	   	<div class="video-wrap">
        <video autoplay muted loop class="myVideo-2" style="background-image: url(<?php echo get_image('img_ekran_map'); ?>)">
          <source src="<?php echo get_image('video_ekran_map'); ?>" type="video/mp4">
	      </video>
      </div>
      <div class="container">
        <div class="map-content">
          <div class="map-content--column">
            <img src="<?php echo get_image('img_map_map') ?>" alt="">
            <div class="map-content-goroda">
            	<?php 
					for($i=1; $i<=30; $i++){
						if(get_post_meta($post->ID, 'field_gorod_'.$lang.'_'.$i, 1)&&get_post_meta($post->ID, 'field_sert_kolich_'.$lang.'_'.$i, 1)>0){ ?>
							<div class="map_gorod" style="left:<?php echo get_post_meta($post->ID, 'field_x_'.$lang.'_'.$i, 1); ?>%; top:<?php echo get_post_meta($post->ID, 'field_y_'.$lang.'_'.$i, 1); ?>%"><?php echo get_post_meta($post->ID, 'field_sert_kolich_'.$lang.'_'.$i, 1);?></div>
						<?php }
					}
				?>
            </div>
          </div>
          <div class="map-content--city">
            <div>
            	<p>
            	<?php 
            		for($i=1; $i<=30; $i++){
            			if(get_post_meta($post->ID, 'field_sleva_'.$lang.'_'.$i, 1)=='on'||get_post_meta($post->ID, 'field_sleva_'.$lang.'_'.$i, 1)=='true'){ ?>
            				<span style="color: #ffff00;"><?php echo get_post_meta($post->ID, 'field_sert_kolich_'.$lang.'_'.$i, 1); ?></span><?php echo get_post_meta($post->ID, 'field_gorod_'.$lang.'_'.$i, 1); ?><br>
            			<?php }
            		}
            	?>
            	</p>
            </div>
            <div>
            	<p>
            	<?php 
            		for($i=1; $i<=30; $i++){
            			if(get_post_meta($post->ID, 'field_sprava_'.$lang.'_'.$i, 1)=='on'||get_post_meta($post->ID, 'field_sprava_'.$lang.'_'.$i, 1)=='true'){ ?>
            				<span style="color: #ffff00;"><?php echo get_post_meta($post->ID, 'field_sert_kolich_'.$lang.'_'.$i, 1); ?></span><?php echo get_post_meta($post->ID, 'field_gorod_'.$lang.'_'.$i, 1); ?><br>
            			<?php }
            		}
            	?>
            	</p>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php get_footer(); ?>
