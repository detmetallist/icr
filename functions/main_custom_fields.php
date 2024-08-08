<?php
	function extra_fields_mainpage_func( $post ){
		$lang=wpm_get_language();
		?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/admin-style.css" />
		<h1>Главная страница</h1>
		<div class="tabs">
			<ul>
				<li><a class="active" href="#tab_first">Первый экран</a></li>
				<li><a href="#tab_onas">О нас</a></li>
				<li><a href="#tab_preim">Преимущества</a></li>
				<li><a href="#tab_constructor">Конструктор</a></li>
				<li><a href="#tab_map">Карта</a></li>
			</ul>
		</div>
		<div class="tabs_content">
			<div class="tab" id="tab_first">
				<div class="admblock">
					<h2>Первый экран</h2>
					<p><b>Заголовок</b></p>
					<input  type="text" name="extra[zagolovok_ekran1_<?php echo $lang; ?>]" value="<?php echo get_post_meta($post->ID, 'zagolovok_ekran1_'.$lang, 1);?>" placeholder="Заголовок"/>
					<p><b>Подзаголовок</b></p>
					<input  type="text" name="extra[podzagolovok_ekran1_<?php echo $lang; ?>]" value="<?php echo get_post_meta($post->ID, 'podzagolovok_ekran1_'.$lang, 1);?>" placeholder="Подзаголовок"/>
					<div class="images_flex">
						<?php upload_image('1','img_ekran1','Выберите фоновую картинку'); ?>
						<?php upload_image('2','video_ekran1','Выберите фоновое видео'); ?>
					</div>
				</div>
			</div>
			<div class="tab" id="tab_onas">
				<div class="admblock">
					<h2>О нас</h2>
					<p><b>Заголовок</b></p>
					<input  type="text" name="extra[zagolovok_onas_<?php echo $lang; ?>]" value="<?php echo get_post_meta($post->ID, 'zagolovok_onas_'.$lang, 1);?>" placeholder="Заголовок"/>
					<p><b>Текст</b></p>
					<?php 
						$settings = array(
							'textarea_name'	=>	'extra[onas_content_'.$lang.']',
							'dfw'		=>	true,
							'quicktags'	=>	false
						);
						wp_editor( get_post_meta($post->ID, 'onas_content_'.$lang, true), 'truewpeditor_onas', $settings );
					?>
					<div class="images_flex">
						<?php
							upload_image('3','img_onas1920','Выберите фоновую картинку под 1920');
							upload_image('4','img_onas1280','Выберите фоновую картинку под 1280');
							upload_image('5','img_onas1000','Выберите фоновую картинку под 1000');
							upload_image('6','img_onas768','Выберите фоновую картинку под 768');
							upload_image('7','img_onas360','Выберите фоновую картинку под 360');
						?>
					</div>
				</div>
			</div>
			<div class="tab" id="tab_preim">
				<div class="admblock">
					<h2>Экран преимущества</h2>
					<p><b>Заголовок</b></p>
					<input  type="text" name="extra[zagolovok_preim_<?php echo $lang; ?>]" value="<?php echo get_post_meta($post->ID, 'zagolovok_preim_'.$lang, 1);?>" placeholder="Заголовок"/><br>
					<div class="many_items">
						<?php
							$rel=8;
							for($i=1; $i<=4; $i++){ 
								?>
								<div class="item">
									<p><b>Текст</b></p>
									<input  type="text" name="extra[text_preim<?php echo $i; ?>_<?php echo $lang; ?>]" value="<?php echo get_post_meta($post->ID, 'text_preim'.$i.'_'.$lang, 1);?>" placeholder="Заголовок"/><br>
									<?php upload_image($rel,'img_preim1920'.$i,'Выберите фоновую картинку под 1920'); $rel++; ?>
									<?php upload_image($rel,'img_preim1280'.$i,'Выберите фоновую картинку под 1280'); $rel++; ?>
									<?php upload_image($rel,'img_preim1000'.$i,'Выберите фоновую картинку под 1000'); $rel++; ?>
									<?php upload_image($rel,'img_preim768'.$i,'Выберите фоновую картинку под 768'); $rel++; ?>
									<?php upload_image($rel,'img_preim360'.$i,'Выберите фоновую картинку под 360'); $rel++; ?>
									<?php upload_image($rel,'svg_preim'.$i,'Выберите фоновый значок svg или png'); $rel++; ?>
								</div>
							<?php }
						?>
					</div>
				</div>
			</div>
			<div class="tab" id="tab_constructor">
				<div class="admblock">
					<?php constructor($post->ID, $lang); ?>
				</div>
			</div>
			<div class="tab" id="tab_map">
				<div class="admblock">
					<h2>Экран с картой</h2>
					<div class="images_flex">
						<?php upload_image('40','img_ekran_map','Выберите фоновую картинку'); ?>
						<?php upload_image('41','video_ekran_map','Выберите фоновое видео'); ?>
						<?php upload_image('42','img_map_map','Выберите картинку карты'); ?>
					</div>
					<h2>Города на карте</h2>
					<p>Введите в любую строчку название города и нажмите место на карте. Координаты сгенерируются автоматически.</p>
					<div class="two_items">
						<div class="item">
							<div class="adm_map">
								<?php 
									$img=get_post_meta($post->ID, 'img_map_map', 1); 
	      							$src = wp_get_attachment_image_src( $img,'full');
								?>
								<img src="<?php echo $src[0]; ?>">
							</div>
						</div>
						<div class="item">
							<div class="adm_goroda">
								<p class="gorod">Город</p>
								<p class="procent">x %</p>
								<p class="procent">y %</p>
								<p class="sert_kolich">Количество сертификатов</p>
								<p class="galka">Cлева</p>
								<p class="galka">Cправа</p>
							</div>
							<?php 
								for($i=1; $i<=30; $i++){ ?>
								<div class="adm_goroda">
									<input  type="text" class="gorod" data-num="<?php echo $i; ?>" name="extra[field_gorod_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post->ID, 'field_gorod_'.$lang.'_'.$i, 1);?>" placeholder="Город"/>
									<input  type="text" class="procent procent_x" data-num="<?php echo $i; ?>" name="extra[field_x_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post->ID, 'field_x_'.$lang.'_'.$i, 1);?>" placeholder="x %"/>
									<input  type="text" class="procent procent_y" data-num="<?php echo $i; ?>" name="extra[field_y_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post->ID, 'field_y_'.$lang.'_'.$i, 1);?>" placeholder="y %"/>
									<input  type="text" class="sert_kolich" data-num="<?php echo $i; ?>" name="extra[field_sert_kolich_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post->ID, 'field_sert_kolich_'.$lang.'_'.$i, 1);?>" placeholder="0"/>
									<input type="hidden" data-num="<?php echo $i; ?>" name="extra[field_sleva_<?php echo $lang; ?>_<?php echo $i ?>]" <?php if(get_post_meta($post->ID, 'field_sleva_'.$lang.'_'.$i, 1)) { echo 'value="'.get_post_meta($post->ID, 'field_sleva_'.$lang.'_'.$i, 1).'"'; } else { echo 'value="off"'; } ?> >
									<div class="galka"><input type="checkbox" data-num="<?php echo $i; ?>" name="extra[field_sleva_<?php echo $lang; ?>_<?php echo $i ?>]" <?php if(get_post_meta($post->ID, 'field_sleva_'.$lang.'_'.$i, 1)=='on'||get_post_meta($post->ID, 'field_sleva_'.$lang.'_'.$i, 1)=='true') { echo "checked"; } ?> ></div>
									<input type="hidden" data-num="<?php echo $i; ?>" name="extra[field_sprava_<?php echo $lang; ?>_<?php echo $i ?>]" <?php if(get_post_meta($post->ID, 'field_sprava_'.$lang.'_'.$i, 1)) { echo 'value="'.get_post_meta($post->ID, 'field_sprava_'.$lang.'_'.$i, 1).'"'; } else { echo 'value="off"'; } ?> >
									<div class="galka"><input type="checkbox" data-num="<?php echo $i; ?>" name="extra[field_sprava_<?php echo $lang; ?>_<?php echo $i ?>]" <?php if(get_post_meta($post->ID, 'field_sprava_'.$lang.'_'.$i, 1)=='on'||get_post_meta($post->ID, 'field_sprava_'.$lang.'_'.$i, 1)=='true') { echo "checked"; } ?> ></div>
								</div>	
								<?php }
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
		<?
	}
	add_action( 'save_post', 'my_extra_fields_update', 0 );
	function my_extra_fields_update( $post_id ){
	    // базовая проверка
	    if (
	        empty( $_POST['extra'] )
	        || ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
	        || wp_is_post_autosave( $post_id )
	        || wp_is_post_revision( $post_id )
	    )
	        return false;

	    // Все ОК! Теперь, нужно сохранить/удалить данные
	    //$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
	    foreach( $_POST['extra'] as $key => $value ){
	        if( empty($value) ){
	            delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
	            continue;
	        }

	        update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
	    }

	    return $post_id;
	}
?>