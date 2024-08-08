<?php
	register_nav_menus( array(
		'main_menu' => __( 'main-menu', 'Главное меню' ),
		'ce_menu' => __( 'ce-menu', 'Меню CE сертификация' ),
		'iso_menu' => __( 'iso-menu', 'Меню ISO сертификация' ),
		'world_menu' => __( 'world-menu', 'Меню сертификация для остального мира' ),
	) );
	add_action('add_meta_boxes', 'my_extra_fields', 1);
	function load_custom_wp_admin_style() {
	    wp_enqueue_script( 'my_custom_script', get_template_directory_uri() . '/js/my_admin_script.js' );
	}
	add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

	add_action('add_meta_boxes', 'my_extra_fields', 1);
	function my_extra_fields() {
		global $post;
	    if ( $post->ID==74) {
	    	add_meta_box( 'extra_fields', 'Параметры главной', 'extra_fields_mainpage_func', 'page', 'normal', 'high'  );
	    } else {
	    	add_meta_box( 'extra_fields', 'Параметры страницы', 'extra_fields_otherpage_func', 'page', 'normal', 'high'  );
	    }
	}
	function upload_image($role, $extra_name, $button_text){
		global $post;
		?>
		<div class="upload_media">
			<input id="image-url<?php echo $role; ?>" type="hidden" name="extra[<?php echo $extra_name; ?>]" style="width: 100px"  value="<?php echo get_post_meta($post->ID, $extra_name, 1);?>"/><br>
			<input  role="<?php echo $role; ?>" type="button" class="buttonupload btn" value="<?php echo $button_text; ?>" />
			<div id="upli<?php echo $role; ?>">
				<?php if(get_post_meta($post->ID, $extra_name, true)):?>
					<?php 
						$img=get_post_meta($post->ID, $extra_name, 1); $src = wp_get_attachment_image_src( $img,'full');
					?>
					<?php if($src[0]): ?>
						<img src="<?php echo $src[0]; ?>" style="height: 100px; width: auto; margin: 10px 0">
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri() ?>/img/video_zaglushka.png" style="height: 100px; width: auto; margin: 10px 0">
					<?php endif; ?>
				<?php endif;?> 
			</div><!-- upli -->
			<?php if(get_post_meta($post->ID, $extra_name, true)):?>
				<br />
				<button  class="delete btn" role="<?php echo $role; ?>">Удалить</button>
			<?php endif;?>
		</div>
		<?
	}
	function redactor($post_id, $field_name, $id){
		$settings = array(
			'textarea_name'	=>	'extra['.$field_name.']',
			'dfw'		=>	true,
			'quicktags'	=>	false
		);
		wp_editor( get_post_meta($post_id, $field_name, true), $id, $settings );
	}
	function constructor($post_id, $lang){
		?>
		<div class="invisible_lang"><?php echo $lang; ?></div>
		<div class="popup">
			<div class="popup_over"></div>
			<div class="popup_bg"></div>
			<div class="popup_sozdat_block">
				<h2>Какой блок хотите создать?</h2>
				<div class="popup_container">
					<button class="zagolovok">Заголовок</button>
					<button class="text_sleva">Текст слева<br>картинка справа</button>
					<button class="text_sprava">Текст справа<br>картинка слева</button>
					<button class="text">Текст</button>
					<button class="text_with_button">Текст с кнопкой</button>
					<button class="picture_center">Картинка по центру</button>
					<button class="steps">Блок с шагами</button>
					<button class="download">Блоки скачать</button>
					<button class="tri_kolonki">3 колонки</button>
					<button class="etapi">Блок с этапами</button>
					<button class="flagi">Блок с флагами</button>
					<button class="perechislenie_skartinkoy">Перечисление с картинкой слева</button>
					<button class="text_oval">Текст в овале</button>
				</div>
			</div>
		</div>
		<div class="adm_content">
			<div class="blocks_img">
				<div class="block_img_zagolovok"><img src="<?php echo get_template_directory_uri() ?>/img/zagolovok.jpg"></div>
				<div class="block_img_text_sleva"><img src="<?php echo get_template_directory_uri() ?>/img/text_sleva.jpg"></div>
				<div class="block_img_text_sprava"><img src="<?php echo get_template_directory_uri() ?>/img/text_sprava.jpg"></div>
				<div class="block_img_text"><img src="<?php echo get_template_directory_uri() ?>/img/text.jpg"></div>
				<div class="block_img_text_with_button"><img src="<?php echo get_template_directory_uri() ?>/img/text_with_button.jpg"></div>
				<div class="block_img_picture_center"><img src="<?php echo get_template_directory_uri() ?>/img/picture_center.jpg"></div>
				<div class="block_img_steps"><img src="<?php echo get_template_directory_uri() ?>/img/steps.jpg"></div>
				<div class="block_img_steps_description"><img src="<?php echo get_template_directory_uri() ?>/img/steps_description.jpg"></div>
				<div class="block_img_download"><img src="<?php echo get_template_directory_uri() ?>/img/download.jpg"></div>
				<div class="block_img_tri_kolonki"><img src="<?php echo get_template_directory_uri() ?>/img/tri_kolonki.jpg"></div>
				<div class="block_img_etapi"><img src="<?php echo get_template_directory_uri() ?>/img/etapi.jpg"></div>
				<div class="block_img_kartinka_bez_privyazki"><img src="<?php echo get_template_directory_uri() ?>/img/kartinka_bez_privyazki.jpg"></div>
				<div class="block_img_flagi"><img src="<?php echo get_template_directory_uri() ?>/img/flagi.jpg"></div>
				<div class="block_img_perechislenie_skartinkoy"><img src="<?php echo get_template_directory_uri() ?>/img/perechislenie_skartinkoy.jpg"></div>
				<div class="block_img_text_oval"><img src="<?php echo get_template_directory_uri() ?>/img/text_oval.jpg"></div>
			</div>
			<div class="bloki_container">
				<?php 
					$j_kray=1;
					for($i=1; $i<=100; $i++){
						if(get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1)){
							$nomer_ocheredi[$j_kray]=get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);
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
						if(get_post_meta($post_id, 'field_zagolovok_'.$lang.'_'.$i, 1)){
							?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Заголовок</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<label for="field_zagolovok_<?php echo $lang; ?>_<?php echo $i; ?>">Заголовок</label>
								<input  type="text" id="field_zagolovok_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_zagolovok_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_zagolovok_'.$lang.'_'.$i, 1);?>" placeholder="Заголовок"/>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php
							$i_kray=$i+1;
							$nomer_bloka++;
						}
						if(get_post_meta($post_id, 'field_text_sleva_'.$lang.'_'.$i, 1)){
							?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Текст слева, картинка справа</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<label for="field_text_sleva_<?php echo $lang; ?>_<?php echo $i ?>">Текст. Если на телефоне надо спойлер, разделите тегом more</label>
								<?php
									$settings = array(
										'textarea_name'	=>	'extra[field_text_sleva_'.$lang.'_'.$i.']',
										'dfw'		=>	true,
										'quicktags'	=>	false
									);
									wp_editor( get_post_meta($post_id, 'field_text_sleva_'.$lang.'_'.$i, true), 'field_text_sleva_'.$lang.'_'.$i, $settings );
								?>
								<label for="field_text_sleva_button_name_<?php echo $lang; ?>_<?php echo $i ?>">Название кнопки если есть. Если кнопки нет, оставляем пустым</label>
								<input  type="text" id="field_text_sleva_button_name_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_text_sleva_button_name_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_sleva_button_name_'.$lang.'_'.$i, 1);?>" placeholder="Название кнопки"/>
								<label for="field_text_sleva_button_url_<?php echo $lang; ?>_<?php echo $i ?>">Ссылка кнопки или шорткод вызова попапа</label>
								<input  type="text" id="field_text_sleva_button_url_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_text_sleva_button_url_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_sleva_button_url_'.$lang.'_'.$i, 1);?>" placeholder="Ссылка кнопки"/>
								<label for="field_text_sleva_vovale_<?php echo $lang; ?>_<?php echo $i ?>">Текст в овале если есть</label>
								<textarea type="text" id="field_text_sleva_vovale_<?php echo $lang; ?>_<?php echo $i ?>" class="field_<?php echo $i ?>" name="extra[field_text_sleva_vovale_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_sleva_vovale'.$lang.'_'.$i, 1);?>"><?php echo get_post_meta($post_id, 'field_text_sleva_vovale_'.$lang.'_'.$i, 1);?></textarea>
								<div class="images_flex">
									<?php upload_image('10'.$i,'field_text_sleva_bg_1920_'.$i,'Выберите фоновую картинку 1920'); ?>
									<?php upload_image('20'.$i,'field_text_sleva_bg_1280_'.$i,'Выберите фоновую картинку 1280'); ?>
									<?php upload_image('30'.$i,'field_text_sleva_bg_1000_'.$i,'Выберите фоновую картинку 1000'); ?>
									<?php upload_image('40'.$i,'field_text_sleva_bg_768_'.$i,'Выберите фоновую картинку 768'); ?>
									<?php upload_image('50'.$i,'field_text_sleva_bg_360_'.$i,'Выберите фоновую картинку 360'); ?>
								</div>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_text_sprava_'.$lang.'_'.$i, 1)){
							?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Текст справа, картинка слева</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<label for="field_text_sprava_<?php echo $lang; ?>_<?php echo $i ?>">Текст. Если на телефоне надо спойлер, разделите тегом more</label>
								<?php
									$settings = array(
										'textarea_name'	=>	'extra[field_text_sprava_'.$lang.'_'.$i.']',
										'dfw'		=>	true,
										'quicktags'	=>	false
									);
									wp_editor( get_post_meta($post_id, 'field_text_sprava_'.$lang.'_'.$i, true), 'field_text_sprava_'.$lang.'_'.$i, $settings );
								?>
								<label for="field_text_sprava_button_name_<?php echo $lang; ?>_<?php echo $i ?>">Название кнопки если есть. Если кнопки нет, оставляем пустым</label>
								<input  type="text" id="field_text_sprava_button_name_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_text_sprava_button_name_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_sprava_button_name_'.$lang.'_'.$i, 1);?>" placeholder="Название кнопки"/>
								<label for="field_text_sprava_button_url_<?php echo $lang; ?>_<?php echo $i ?>">Ссылка кнопки или шорткод вызова попапа</label>
								<input  type="text" id="field_text_sprava_button_url_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_text_sprava_button_url_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_sprava_button_url_'.$lang.'_'.$i, 1);?>" placeholder="Ссылка кнопки"/>
								<label for="field_text_sprava_vovale_<?php echo $lang; ?>_<?php echo $i ?>">Текст в овале если есть</label>
								<textarea type="text" id="field_text_sprava_vovale_<?php echo $lang; ?>_<?php echo $i ?>" class="field_<?php echo $i ?>" name="extra[field_text_sprava_vovale_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_sprava_vovale'.$lang.'_'.$i, 1);?>"><?php echo get_post_meta($post_id, 'field_text_sprava_vovale_'.$lang.'_'.$i, 1);?></textarea>
								<div class="images_flex">
									<?php upload_image('60'.$i,'field_text_sprava_bg_1920_'.$i,'Выберите фоновую картинку 1920'); ?>
									<?php upload_image('70'.$i,'field_text_sprava_bg_1280_'.$i,'Выберите фоновую картинку 1280'); ?>
									<?php upload_image('80'.$i,'field_text_sprava_bg_1000_'.$i,'Выберите фоновую картинку 1000'); ?>
									<?php upload_image('90'.$i,'field_text_sprava_bg_768_'.$i,'Выберите фоновую картинку 768'); ?>
									<?php upload_image('100'.$i,'field_text_sprava_bg_360_'.$i,'Выберите фоновую картинку 360'); ?>
								</div>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_text_'.$lang.'_'.$i, 1)){ ?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Текст</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<?php
									$settings = array(
										'textarea_name'	=>	'extra[field_text_'.$lang.'_'.$i.']',
										'dfw'		=>	true,
										'quicktags'	=>	false
									);
									wp_editor( get_post_meta($post_id, 'field_text_'.$lang.'_'.$i, true), 'field_text_'.$lang.'_'.$i, $settings );
								?>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}	
						if(get_post_meta($post_id, 'field_text_with_button_name_'.$lang.'_'.$i, 1)){ ?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Текст с кнопкой</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<label for="field_text_with_button_name_<?php echo $lang; ?>_<?php echo $i ?>">Название кнопки</label>
								<input  type="text" id="field_text_with_button_name_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_text_with_button_name_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_with_button_name_'.$lang.'_'.$i, 1);?>" placeholder="Название кнопки"/>
								<label for="field_text_with_button_url_<?php echo $lang; ?>_<?php echo $i ?>">Ссылка кнопки или шорткод вызова попапа</label>
								<input  type="text" id="field_text_with_button_url_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_text_with_button_url_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_with_button_url_'.$lang.'_'.$i, 1);?>" placeholder="Ссылка кнопки"/>
								<label for="field_text_with_button_text_<?php echo $lang; ?>_<?php echo $i ?>">Текст возле кнопки</label>
								<textarea type="text" id="field_text_with_button_text_<?php echo $lang; ?>_<?php echo $i ?>" class="field_<?php echo $i ?>" name="extra[field_text_with_button_text_<?php echo $lang; ?>_<?php echo $i ?>]" style="width: 100%"  value="<?php echo get_post_meta($post_id, 'field_text_with_button_text_'.$lang.'_'.$i, 1);?>"><?php echo get_post_meta($post_id, 'field_text_with_button_text_'.$lang.'_'.$i, 1);?></textarea>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_step1_'.$lang.'_'.$i, 1)){ ?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Блок с шагами</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<label for="field_steps_slovo_<?php echo $lang; ?>_<?php echo $i ?>">Слово</label>
								<input  type="text" id="field_steps_slovo_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_steps_slovo_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_steps_slovo_'.$lang.'_'.$i, 1);?>" placeholder="Шаг"/>
								<div class="many_items tri_items">
									<div class="item">
										<h3>Шаг 1</h3>
										<label for="field_step1_<?php echo $lang; ?>_<?php echo $i ?>">Название шага</label>
										<input  type="text" id="field_step1_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_step1_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_step1_'.$lang.'_'.$i, 1);?>" placeholder="Название шага"/>
										<label for="field_step1_text_<?php echo $lang; ?>_<?php echo $i ?>">Описание шага</label>
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_step1_text_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_step1_text_'.$lang.'_'.$i, true), 'field_step1_text_'.$lang.'_'.$i, $settings );
										?>
										<?php upload_image('110'.$i,'field_step1_img_'.$i,'Фоновая картинка шага'); ?>
									</div>
									<div class="item">
										<h3>Шаг 2</h3>
										<label for="field_step2_<?php echo $lang; ?>_<?php echo $i ?>">Название шага</label>
										<input  type="text" id="field_step2_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_step2_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_step2_'.$lang.'_'.$i, 1);?>" placeholder="Название шага"/>
										<label for="field_step2_text_<?php echo $lang; ?>_<?php echo $i ?>">Описание шага</label>
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_step2_text_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_step2_text_'.$lang.'_'.$i, true), 'field_step2_text_'.$lang.'_'.$i, $settings );
										?>
										<?php upload_image('111'.$i,'field_step2_img_'.$i,'Фоновая картинка шага'); ?>
									</div>
									<div class="item">
										<h3>Шаг 3</h3>
										<label for="field_step3_<?php echo $lang; ?>_<?php echo $i ?>">Название шага</label>
										<input  type="text" id="field_step3_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_step3_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_step3_'.$lang.'_'.$i, 1);?>" placeholder="Название шага"/>
										<label for="field_step3_text_<?php echo $lang; ?>_<?php echo $i ?>">Описание шага</label>
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_step3_text_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_step3_text_'.$lang.'_'.$i, true), 'field_step3_text_'.$lang.'_'.$i, $settings );
										?>
										<?php upload_image('112'.$i,'field_step3_img_'.$i,'Фоновая картинка шага'); ?>
									</div>
									<div class="item">
										<h3>Шаг 4</h3>
										<label for="field_step4_<?php echo $lang; ?>_<?php echo $i ?>">Название шага</label>
										<input  type="text" id="field_step4_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_step4_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_step4_'.$lang.'_'.$i, 1);?>" placeholder="Название шага"/>
										<label for="field_step4_text_<?php echo $lang; ?>_<?php echo $i ?>">Описание шага</label>
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_step4_text_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_step4_text_'.$lang.'_'.$i, true), 'field_step4_text_'.$lang.'_'.$i, $settings );
										?>
										<?php upload_image('113'.$i,'field_step4_img_'.$i,'Фоновая картинка шага'); ?>
									</div>
									<div class="item">
										<h3>Шаг 5</h3>
										<label for="field_step5_<?php echo $lang; ?>_<?php echo $i ?>">Название шага</label>
										<input  type="text" id="field_step5_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_step5_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_step5_'.$lang.'_'.$i, 1);?>" placeholder="Название шага"/>
										<label for="field_step5_text_<?php echo $lang; ?>_<?php echo $i ?>">Описание шага</label>
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_step5_text_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_step5_text_'.$lang.'_'.$i, true), 'field_step5_text_'.$lang.'_'.$i, $settings );
										?>
										<?php upload_image('114'.$i,'field_step5_img_'.$i,'Фоновая картинка шага'); ?>
									</div>
									<div class="item">
										<h3>Шаг 6</h3>
										<label for="field_step6_<?php echo $lang; ?>_<?php echo $i ?>">Название шага</label>
										<input  type="text" id="field_step6_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_step6_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_step6_'.$lang.'_'.$i, 1);?>" placeholder="Название шага"/>
										<label for="field_step6_text_<?php echo $lang; ?>_<?php echo $i ?>">Описание шага</label>
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_step6_text_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_step6_text_'.$lang.'_'.$i, true), 'field_step6_text_'.$lang.'_'.$i, $settings );
										?>
										<?php upload_image('115'.$i,'field_step6_img_'.$i,'Фоновая картинка шага'); ?>
									</div>
								</div>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_download1_text_'.$lang.'_'.$i, 1)){ ?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Блоки скачать</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<div class="two_items">
									<div class="item">
										<label for="field_download1_text_<?php echo $lang; ?>_<?php echo $i ?>">Описание скачиваемого материала</label>
										<textarea type="text" id="field_download1_text_<?php echo $lang; ?>_<?php echo $i ?>" class="field_<?php echo $i ?>" name="extra[field_download1_text_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_download1_text_'.$lang.'_'.$i, 1);?>"><?php echo get_post_meta($post_id, 'field_download1_text_'.$lang.'_'.$i, 1);?></textarea>
										<label for="field_download1_button_name_<?php echo $lang; ?>_<?php echo $i ?>">Название кнопки</label>
										<input  type="text" id="field_download1_button_name_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_download1_button_name_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_download1_button_name_'.$lang.'_'.$i, 1);?>" placeholder="Название кнопки"/>
										<label for="field_download1_button_url_<?php echo $lang; ?>_<?php echo $i ?>">Ссылка кнопки</label>
										<input  type="text" id="field_download1_button_url_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_download1_button_url_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_download1_button_url_'.$lang.'_'.$i, 1);?>" placeholder="Ссылка кнопки"/>
										<?php upload_image('120'.$i,'field_download1_img_'.$i,'Картинка возле кнопки'); ?>
									</div>
									<div class="item">
										<label for="field_download2_text_<?php echo $lang; ?>_<?php echo $i ?>">Описание скачиваемого материала</label>
										<textarea type="text" id="field_download2_text_<?php echo $lang; ?>_<?php echo $i ?>" class="field_<?php echo $i ?>" name="extra[field_download2_text_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_download2_text_'.$lang.'_'.$i, 1);?>"><?php echo get_post_meta($post_id, 'field_download2_text_'.$lang.'_'.$i, 1);?></textarea>
										<label for="field_download2_button_name_<?php echo $lang; ?>_<?php echo $i ?>">Название кнопки</label>
										<input  type="text" id="field_download2_button_name_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_download2_button_name_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_download2_button_name_'.$lang.'_'.$i, 1);?>" placeholder="Название кнопки"/>
										<label for="field_download1_button_url_<?php echo $lang; ?>_<?php echo $i ?>">Ссылка кнопки</label>
										<input  type="text" id="field_download2_button_url_<?php echo $lang; ?>_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[field_download2_button_url_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_download2_button_url_'.$lang.'_'.$i, 1);?>" placeholder="Ссылка кнопки"/>
										<?php upload_image('121'.$i,'field_download2_img_'.$i,'Картинка возле кнопки'); ?>
									</div>
								</div>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_flagi_text_'.$lang.'_'.$i, 1)){ ?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Блок с флагами</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<label for="field_flagi_text_<?php echo $lang; ?>_<?php echo $i ?>">Текст</label>
								<?php
									$settings = array(
										'textarea_name'	=>	'extra[field_flagi_text_'.$lang.'_'.$i.']',
										'dfw'		=>	true,
										'quicktags'	=>	false
									);
									wp_editor( get_post_meta($post_id, 'field_flagi_text_'.$lang.'_'.$i, true), 'field_flagi_text_'.$lang.'_'.$i, $settings );
								?>
								<div class="images_flex">
									<?php upload_image('130'.$i,'field_flagi_text_bg_1920_'.$i,'Выберите фоновую картинку 1920'); ?>
									<?php upload_image('131'.$i,'field_flagi_text_bg_1280_'.$i,'Выберите фоновую картинку 1280'); ?>
									<?php upload_image('132'.$i,'field_flagi_text_bg_1000_'.$i,'Выберите фоновую картинку 1000'); ?>
									<?php upload_image('133'.$i,'field_flagi_text_bg_768_'.$i,'Выберите фоновую картинку 768'); ?>
									<?php upload_image('134'.$i,'field_flagi_text_bg_360_'.$i,'Выберите фоновую картинку 360'); ?>
								</div>
								<div class="images_flex">
									<?php upload_image('138'.$i,'field_flagi_video_'.$i,'Выберите фоновое видео'); ?>
								</div>
								<div class="many_items tri_items">
									<?php upload_image('135'.$i,'field_flagi_img1_'.$i,'Выберите картинку флага'); ?>
									<?php upload_image('136'.$i,'field_flagi_img2_'.$i,'Выберите картинку флага'); ?>
									<?php upload_image('137'.$i,'field_flagi_img3_'.$i,'Выберите картинку флага'); ?>
								</div>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'perechislenie_text_'.$lang.'_'.$i, 1)){ ?>
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Перечисление с картинкой слева</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<?php
									$settings = array(
										'textarea_name'	=>	'extra[perechislenie_text_'.$lang.'_'.$i.']',
										'dfw'		=>	true,
										'quicktags'	=>	false
									);
									wp_editor( get_post_meta($post_id, 'perechislenie_text_'.$lang.'_'.$i, true), 'perechislenie_text_'.$lang.'_'.$i, $settings );
								?>
								<?php upload_image('140'.$i,'perechislenie_img_'.$i,'Выберите картинку'); ?>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_picture_center_'.$lang.'_'.$i, 1)){ ?> 
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Картинка по центру</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<?php upload_image('150'.$i,'field_picture_center_'.$lang.'_'.$i,'Выберите картинку'); ?>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_tri_kolonki_block1_'.$lang.'_'.$i, 1)){ ?> 
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Три колонки</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<div class="many_items tri_items">
									<div class="item">
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_tri_kolonki_block1_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_tri_kolonki_block1_'.$lang.'_'.$i, true), 'field_tri_kolonki_block1_'.$lang.'_'.$i, $settings );
										?>
									</div>
									<div class="item">
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_tri_kolonki_block2_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_tri_kolonki_block2_'.$lang.'_'.$i, true), 'field_tri_kolonki_block2_'.$lang.'_'.$i, $settings );
										?>
									</div>
									<div class="item">
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_tri_kolonki_block3_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_tri_kolonki_block3_'.$lang.'_'.$i, true), 'field_tri_kolonki_block3_'.$lang.'_'.$i, $settings );
										?>
									</div>
								</div>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_etapi1_'.$lang.'_'.$i, 1)){ ?> 
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Этапы</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<div class="two_items">
									<div class="item">
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_etapi1_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_etapi1_'.$lang.'_'.$i, true), 'field_etapi1_'.$lang.'_'.$i, $settings );
										?>
									</div>
									<div class="item">
										<?php
											$settings = array(
												'textarea_name'	=>	'extra[field_etapi2_'.$lang.'_'.$i.']',
												'dfw'		=>	true,
												'quicktags'	=>	false
											);
											wp_editor( get_post_meta($post_id, 'field_etapi2_'.$lang.'_'.$i, true), 'field_etapi2_'.$lang.'_'.$i, $settings );
										?>
									</div>
								</div>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
						if(get_post_meta($post_id, 'field_text_oval_'.$lang.'_'.$i, 1)){ ?>  
							<div class="edit_block field_<?php echo $i; ?>" style="order:<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
								<div class="block_head">
									<h2>Текст в овале</h2>
									<div class="perestavit_bloki">
										<div class="block_vverh"></div>
										<div class="block_vniz"></div>
									</div>
								</div>
								<label for="block_id_<?php echo $i; ?>">id блока</label>
								<input  type="text" id="block_id_<?php echo $i; ?>" class="field_<?php echo $i; ?>" name="extra[block_id_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'block_id_'.$i, 1);?>" placeholder="id блока"/>
								<textarea type="text" id="field_text_oval_<?php echo $lang; ?>_<?php echo $i ?>" class="field_<?php echo $i ?>" name="extra[field_text_oval_<?php echo $lang; ?>_<?php echo $i ?>]" value="<?php echo get_post_meta($post_id, 'field_text_oval_'.$lang.'_'.$i, 1);?>"><?php echo get_post_meta($post_id, 'field_text_oval_'.$lang.'_'.$i, 1);?></textarea>
								<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_<?php echo $i; ?>]" value="<?php echo get_post_meta($post_id, 'block_order_'.$lang.'_'.$i, 1);?>">
							</div>
							<?php 
							$nomer_bloka++;
							$i_kray=$i+1;
						}
					}
				?>
			</div>
			<div class="invisible_edit">
				<div class="invisible edit_zagolovok">
					<div class="block_head">
						<h2>Заголовок</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<label for="field_zagolovok_<?php echo $lang; ?>_0">Заголовок</label>
					<input  type="text" id="field_zagolovok_<?php echo $lang; ?>_0" class="field_0" name="extra[field_zagolovok_<?php echo $lang; ?>_0]" placeholder="Заголовок">
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_text_sleva">
					<div class="block_head">
						<h2>Текст слева, картинка справа</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<label for="field_text_sleva_<?php echo $lang; ?>_0">Текст. Если на телефоне надо спойлер, разделите тегом more</label>
					<textarea id="field_text_sleva_<?php echo $lang; ?>_0" name="extra[field_text_sleva_<?php echo $lang; ?>_0]"></textarea>
					<label for="field_text_sleva_button_name_<?php echo $lang; ?>_0">Название кнопки если есть. Если кнопки нет, оставляем пустым</label>
					<input  type="text" id="field_text_sleva_button_name_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_sleva_button_name_<?php echo $lang; ?>_0]" placeholder="Название кнопки"/>
					<label for="field_text_sleva_button_url_<?php echo $lang; ?>_0">Ссылка кнопки или шорткод вызова попапа</label>
					<input  type="text" id="field_text_sleva_button_url_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_sleva_button_url_<?php echo $lang; ?>_0]" placeholder="Ссылка кнопки"/>
					<label for="field_text_sleva_vovale_<?php echo $lang; ?>_0">Текст в овале если есть</label>
					<textarea type="text" id="field_text_sleva_vovale_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_sleva_vovale_<?php echo $lang; ?>_0"></textarea>
					<div class="images_flex">
						<?php upload_image('10'.$i_kray,'field_text_sleva_bg_1920_'.$i_kray,'Выберите фоновую картинку 1920'); ?>
						<?php upload_image('20'.$i_kray,'field_text_sleva_bg_1280_'.$i_kray,'Выберите фоновую картинку 1280'); ?>
						<?php upload_image('30'.$i_kray,'field_text_sleva_bg_1000_'.$i_kray,'Выберите фоновую картинку 1000'); ?>
						<?php upload_image('40'.$i_kray,'field_text_sleva_bg_768_'.$i_kray,'Выберите фоновую картинку 768'); ?>
						<?php upload_image('50'.$i_kray,'field_text_sleva_bg_360_'.$i_kray,'Выберите фоновую картинку 360'); ?>
					</div>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_text_sprava">
					<div class="block_head">
						<h2>Текст справа, картинка слева</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<label for="field_text_sprava_<?php echo $lang; ?>_0">Текст. Если на телефоне надо спойлер, разделите тегом more</label>
					<textarea id="field_text_sprava_<?php echo $lang; ?>_0" name="extra[field_text_sprava_<?php echo $lang; ?>_0]"></textarea>
					<label for="field_text_sprava_button_name_<?php echo $lang; ?>_0">Название кнопки если есть. Если кнопки нет, оставляем пустым</label>
					<input  type="text" id="field_text_sprava_button_name_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_sprava_button_name_<?php echo $lang; ?>_0]" placeholder="Название кнопки"/>
					<label for="field_text_sprava_button_url_<?php echo $lang; ?>_0">Ссылка кнопки или шорткод вызова попапа</label>
					<input  type="text" id="field_text_sprava_button_url_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_sprava_button_url_<?php echo $lang; ?>_0]" placeholder="Ссылка кнопки"/>
					<label for="field_text_sprava_vovale_<?php echo $lang; ?>_0">Текст в овале если есть</label>
					<textarea type="text" id="field_text_sprava_vovale_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_sprava_vovale_<?php echo $lang; ?>_0"></textarea>
					<div class="images_flex">
						<?php upload_image('60'.$i_kray,'field_text_sprava_bg_1920_'.$i_kray,'Выберите фоновую картинку 1920'); ?>
						<?php upload_image('70'.$i_kray,'field_text_sprava_bg_1280_'.$i_kray,'Выберите фоновую картинку 1280'); ?>
						<?php upload_image('80'.$i_kray,'field_text_sprava_bg_1000_'.$i_kray,'Выберите фоновую картинку 1000'); ?>
						<?php upload_image('90'.$i_kray,'field_text_sprava_bg_768_'.$i_kray,'Выберите фоновую картинку 768'); ?>
						<?php upload_image('100'.$i_kray,'field_text_sprava_bg_360_'.$i_kray,'Выберите фоновую картинку 360'); ?>
					</div>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_text">
					<div class="block_head">
						<h2>Текст</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<textarea id="field_text_<?php echo $lang; ?>_0" name="extra[field_text_<?php echo $lang; ?>_0]"></textarea>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_text_with_button">
					<div class="block_head">
						<h2>Текст с кнопкой</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<label for="field_text_with_button_name_<?php echo $lang; ?>_0">Название кнопки</label>
					<input type="text" id="field_text_with_button_name_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_with_button_name_<?php echo $lang; ?>_0]" placeholder="Название кнопки"/>
					<label for="field_text_with_button_url_<?php echo $lang; ?>_0">Ссылка кнопки или шорткод вызова попапа</label>
					<input  type="text" id="field_text_with_button_url_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_with_button_url_<?php echo $lang; ?>_0]" placeholder="Ссылка кнопки"/>
					<label for="field_text_with_button_text_<?php echo $lang; ?>_0">Текст возле кнопки</label>
					<textarea type="text" id="field_text_with_button_text_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_with_button_text_<?php echo $lang; ?>_0]"></textarea>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible steps">
					<div class="block_head">
						<h2>Блок с шагами</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<label for="field_steps_slovo_<?php echo $lang; ?>_0">Слово</label>
					<input  type="text" id="field_steps_slovo_<?php echo $lang; ?>_0" class="field_0" name="extra[field_steps_slovo_<?php echo $lang; ?>_0]" placeholder="Шаг"/>
					<div class="many_items tri_items">
						<div class="item">
							<h3>Шаг 1</h3>
							<label for="field_step1_<?php echo $lang; ?>_0">Название шага</label>
							<input  type="text" id="field_step1_<?php echo $lang; ?>_0" class="field_0" name="extra[field_step1_<?php echo $lang; ?>_0]" placeholder="Название шага"/>
							<label for="field_step1_text_<?php echo $lang; ?>_0">Описание шага</label>
							<textarea id="field_step1_text_<?php echo $lang; ?>_0" name="extra[field_step1_text_<?php echo $lang; ?>_0]"></textarea>
							<?php upload_image('110'.$i_kray,'field_step1_img_'.$i_kray,'Фоновая картинка шага'); ?>
						</div>
						<div class="item">
							<h3>Шаг 2</h3>
							<label for="field_step2_<?php echo $lang; ?>_0">Название шага</label>
							<input  type="text" id="field_step2_<?php echo $lang; ?>_0" class="field_0" name="extra[field_step2_<?php echo $lang; ?>_0]" placeholder="Название шага"/>
							<label for="field_step2_text_<?php echo $lang; ?>_0">Описание шага</label>
							<textarea id="field_step2_text_<?php echo $lang; ?>_0" name="extra[field_step2_text_<?php echo $lang; ?>_0]"></textarea>
							<?php upload_image('111'.$i_kray,'field_step2_img_'.$i_kray,'Фоновая картинка шага'); ?>
						</div>
						<div class="item">
							<h3>Шаг 3</h3>
							<label for="field_step3_<?php echo $lang; ?>_0">Название шага</label>
							<input  type="text" id="field_step3_<?php echo $lang; ?>_0" class="field_0" name="extra[field_step3_<?php echo $lang; ?>_0]" placeholder="Название шага"/>
							<label for="field_step3_text_<?php echo $lang; ?>_0">Описание шага</label>
							<textarea id="field_step3_text_<?php echo $lang; ?>_0" name="extra[field_step3_text_<?php echo $lang; ?>_0]"></textarea>
							<?php upload_image('112'.$i_kray,'field_step3_img_'.$i_kray,'Фоновая картинка шага'); ?>
						</div>
						<div class="item">
							<h3>Шаг 4</h3>
							<label for="field_step4_<?php echo $lang; ?>_0">Название шага</label>
							<input  type="text" id="field_step4_<?php echo $lang; ?>_0" class="field_0" name="extra[field_step4_<?php echo $lang; ?>_0]" placeholder="Название шага"/>
							<label for="field_step4_text_<?php echo $lang; ?>_0">Описание шага</label>
							<textarea id="field_step4_text_<?php echo $lang; ?>_0" name="extra[field_step4_text_<?php echo $lang; ?>_0]"></textarea>
							<?php upload_image('113'.$i_kray,'field_step4_img_'.$i_kray,'Фоновая картинка шага'); ?>
						</div>
						<div class="item">
							<h3>Шаг 5</h3>
							<label for="field_step5_<?php echo $lang; ?>_0">Название шага</label>
							<input  type="text" id="field_step5_<?php echo $lang; ?>_0" class="field_0" name="extra[field_step5_<?php echo $lang; ?>_0]" placeholder="Название шага"/>
							<label for="field_step5_text_<?php echo $lang; ?>_0">Описание шага</label>
							<textarea id="field_step5_text_<?php echo $lang; ?>_0" name="extra[field_step5_text_<?php echo $lang; ?>_0]"></textarea>
							<?php upload_image('114'.$i_kray,'field_step5_img_'.$i_kray,'Фоновая картинка шага'); ?>
						</div>
						<div class="item">
							<h3>Шаг 6</h3>
							<label for="field_step6_<?php echo $lang; ?>_0">Название шага</label>
							<input  type="text" id="field_step6_<?php echo $lang; ?>_0" class="field_0" name="extra[field_step6_<?php echo $lang; ?>_0]" placeholder="Название шага"/>
							<label for="field_step6_text_<?php echo $lang; ?>_0">Описание шага</label>
							<textarea id="field_step6_text_<?php echo $lang; ?>_0" name="extra[field_step6_text_<?php echo $lang; ?>_0]"></textarea>
							<?php upload_image('115'.$i_kray,'field_step6_img_'.$i_kray,'Фоновая картинка шага'); ?>
						</div>
					</div>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_download">
					<div class="block_head">
						<h2>Блоки скачать</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<div class="two_items">
						<div class="item">
							<label for="field_download1_text_<?php echo $lang; ?>_0">Описание скачиваемого материала</label>
							<textarea type="text" id="field_download1_text_<?php echo $lang; ?>_0" class="field_<?php echo $i ?>" name="extra[field_download1_text_<?php echo $lang; ?>_0]" ></textarea>
							<label for="field_download1_button_name_<?php echo $lang; ?>_0">Название кнопки</label>
							<input  type="text" id="field_download1_button_name_<?php echo $lang; ?>_0" class="field_<?php echo $i; ?>" name="extra[field_download1_button_name_<?php echo $lang; ?>_0]" placeholder="Название кнопки"/>
							<label for="field_download1_button_url_<?php echo $lang; ?>_0">Ссылка кнопки</label>
							<input  type="text" id="field_download1_button_url_<?php echo $lang; ?>_0" class="field_<?php echo $i; ?>" name="extra[field_download1_button_url_<?php echo $lang; ?>_0]" value="<?php echo get_post_meta($post_id, 'field_download1_button_url_'.$lang.'_0', 1);?>" placeholder="Ссылка кнопки"/>
							<?php upload_image('120'.$i_kray,'field_download1_img_'.$i_kray,'Картинка возле кнопки'); ?>
						</div>
						<div class="item">
							<label for="field_download2_text_<?php echo $lang; ?>_0">Описание скачиваемого материала</label>
							<textarea type="text" id="field_download2_text_<?php echo $lang; ?>_0" class="field_<?php echo $i ?>" name="extra[field_download2_text_<?php echo $lang; ?>_0]" ></textarea>
							<label for="field_download2_button_name_<?php echo $lang; ?>_0">Название кнопки</label>
							<input  type="text" id="field_download2_button_name_<?php echo $lang; ?>_0" class="field_<?php echo $i; ?>" name="extra[field_download2_button_name_<?php echo $lang; ?>_0]" placeholder="Название кнопки"/>
							<label for="field_download2_button_url_<?php echo $lang; ?>_0">Ссылка кнопки</label>
							<input  type="text" id="field_download2_button_url_<?php echo $lang; ?>_0" class="field_<?php echo $i; ?>" name="extra[field_download2_button_url_<?php echo $lang; ?>_0]" value="<?php echo get_post_meta($post_id, 'field_download2_button_url_'.$lang.'_0', 1);?>" placeholder="Ссылка кнопки"/>
							<?php upload_image('121'.$i_kray,'field_download2_img_'.$i_kray,'Картинка возле кнопки'); ?>
						</div>
					</div>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_flagi">
					<div class="block_head">
						<h2>Блок с флагами</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<label for="field_flagi_text_<?php echo $lang; ?>_0">Текст</label>
					<textarea id="field_flagi_text_<?php echo $lang; ?>_0" name="extra[field_flagi_text_<?php echo $lang; ?>_0]"></textarea>
					<div class="images_flex">
						<?php upload_image('130'.$i_kray,'field_flagi_text_bg_1920_'.$i_kray,'Выберите фоновую картинку 1920'); ?>
						<?php upload_image('131'.$i_kray,'field_flagi_text_bg_1280_'.$i_kray,'Выберите фоновую картинку 1280'); ?>
						<?php upload_image('132'.$i_kray,'field_flagi_text_bg_1000_'.$i_kray,'Выберите фоновую картинку 1000'); ?>
						<?php upload_image('133'.$i_kray,'field_flagi_text_bg_768_'.$i_kray,'Выберите фоновую картинку 768'); ?>
						<?php upload_image('134'.$i_kray,'field_flagi_text_bg_360_'.$i_kray,'Выберите фоновую картинку 360'); ?>
					</div>
					<div class="many_items tri_items">
						<?php upload_image('135'.$i_kray,'field_flagi_img1_'.$i_kray,'Выберите картинку флага'); ?>
						<?php upload_image('136'.$i_kray,'field_flagi_img2_'.$i_kray,'Выберите картинку флага'); ?>
						<?php upload_image('137'.$i_kray,'field_flagi_img3_'.$i_kray,'Выберите картинку флага'); ?>
					</div>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_perechislenie_skartinkoy">
					<div class="block_head">
						<h2>Перечисление с картинкой слева</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<textarea id="perechislenie_text_<?php echo $lang; ?>_0" name="extra[perechislenie_text_<?php echo $lang; ?>_0]"></textarea>
					<?php upload_image('140'.$i_kray,'perechislenie_img_'.$i_kray,'Выберите картинку'); ?>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_picture_center">
					<div class="block_head">
						<h2>Картинка по центру</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<?php upload_image('150'.$i_kray,'field_picture_center_'.$lang.'_'.$i_kray,'Выберите картинку'); ?>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_tri_kolonki">
					<div class="block_head">
						<h2>Три колонки</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" class="field_0" name="extra[block_id_0]" placeholder="id блока"/>
					<div class="many_items tri_items">
						<div class="item">
							<textarea id="field_tri_kolonki_block1_<?php echo $lang; ?>_0" name="extra[field_tri_kolonki_block1_<?php echo $lang; ?>_0]"></textarea>
						</div>
						<div class="item">
							<textarea id="field_tri_kolonki_block2_<?php echo $lang; ?>_0" name="extra[field_tri_kolonki_block2_<?php echo $lang; ?>_0]"></textarea>
						</div>
						<div class="item">
							<textarea id="field_tri_kolonki_block3_<?php echo $lang; ?>_0" name="extra[field_tri_kolonki_block3_<?php echo $lang; ?>_0]"></textarea>
						</div>
					</div>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_etapi">
					<div class="block_head">
						<h2>Этапы</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" class="field_0" name="extra[block_id_0]" placeholder="id блока"/>
					<div class="two_items">
						<div class="item">
							<textarea id="field_etapi1_<?php echo $lang; ?>_0" name="extra[field_etapi1_<?php echo $lang; ?>_0]"></textarea>
						</div>
						<div class="item">
							<textarea id="field_etapi2_<?php echo $lang; ?>_0" name="extra[field_etapi2_<?php echo $lang; ?>_0]"></textarea>
						</div>
					</div>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
				<div class="invisible edit_text_oval">
					<div class="block_head">
						<h2>Текст в овале</h2>
						<div class="perestavit_bloki" style="display: none">
							<div class="block_vverh"></div>
							<div class="block_vniz"></div>
						</div>
					</div>
					<label for="block_id_0">id блока</label>
					<input  type="text" id="block_id_0" name="extra[block_id_0]" placeholder="id блока"/>
					<textarea type="text" id="field_text_oval_<?php echo $lang; ?>_0" class="field_0" name="extra[field_text_oval_<?php echo $lang; ?>_0]" ></textarea>
					<input type="hidden" class="input_order" name="extra[block_order_<?php echo $lang; ?>_0]" value="0">
				</div>
			</div>
			<button class="sozdat_block">Создать блок</button>
		</div>
		<?
	}
	include (TEMPLATEPATH . '/functions/main_custom_fields.php');
	include (TEMPLATEPATH . '/functions/page_custom_fields.php');
?>