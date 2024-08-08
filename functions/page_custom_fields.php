<?php
	function extra_fields_otherpage_func( $post ){
		$lang=wpm_get_language();
		?>
		<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/admin-style.css" />
		<div class="admblock">
			<label for="select_sidebar">Выберите сайдбар для этой сранциы</label>
			<select name="extra[sidebar]" id="select_sidebar" value="<?php echo get_post_meta($post->ID, 'sidebar', 1);?>">
				<option value="0" <?php if(get_post_meta($post->ID, 'sidebar', 1)=='0') echo "selected" ?> >Без сайдбара</option>
				<option value="SE" <?php if(get_post_meta($post->ID, 'sidebar', 1)=='SE') echo "selected" ?> >СЕ сертификация</option>
				<option value="ISO" <?php if(get_post_meta($post->ID, 'sidebar', 1)=='ISO') echo "selected" ?> >ISO сертификация</option>
				<option value="world" <?php if(get_post_meta($post->ID, 'sidebar', 1)=='world') echo "selected" ?> >Сертификация для остального мира</option>
			</select>
		</div>
		<div class="admblock">
			<?php constructor($post->ID, $lang); ?>
		</div>
		<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
	}	
	add_action( 'save_post', 'page_extra_fields_update', 0 );
	function page_extra_fields_update( $post_id ){
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