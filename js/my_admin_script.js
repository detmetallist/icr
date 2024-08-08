jQuery(document).ready(function($){
	var mediaUploader;
	$(document).on('click','.buttonupload',function(){	
	    //e.preventDefault();
	    var role=$(this).attr('role');
	    mediaUploader = wp.media.frames.file_frame = wp.media({
		    title: 'Выберите изображение',
		    button: {
		    text: 'Вставить'
	    }, multiple: false });
	    // When a file is selected, grab the URL and set it as the text field's value
	    mediaUploader.on('select', function() {
		    var attachment = mediaUploader.state().get('selection').first().toJSON();
		    //$('#image-url').val(attachment.url);
		    $('#image-url'+role).val(attachment.id);
		    $('#upli'+role).html( '<img src="'+attachment.url+'" alt="" style="height: 100px; width: auto; margin: 10px 0"/>' );
		    //$(this).parent(".item").children(".image-url").val(attachment.id);
		    //$(this).parent(".item").children(".upli").html( '<img src="'+attachment.url+'" alt="" style="height: 100px; width: auto; margin: 10px 0"/>' );
	    });
	    // Open the uploader dialog
	    mediaUploader.open();
	});
	$('.delete').click(function(e) {
		e.preventDefault();
	  	var role=$(this).attr('role');	
	  	if (confirm("Изображение будет удалено. Изменения вступят в силу после сохранения")) {
			$('#image-url'+role).val('');
			$('#upli'+role).html('');	    
	  	} else {
	  		return false;
	  	} 
	});
	$(".sozdat_block").click(function(){
		$(".popup").fadeIn(300);
		return false;
	});
	$(".popup_over").click(function(){
		$(".popup").fadeOut(300);
	});
	$(".popup_sozdat_block button").mouseover(function(){
		var popup_class=".block_img_"+$(this).attr("class");
		var popup_html=$(popup_class).html();
		$(".popup_bg").html(popup_html);
	})
	$(".tabs a").click(function(){
		var tab_id=$(this).attr("href");
		$(".tabs_content .tab").fadeOut(0);
		$(".tabs_content "+tab_id).fadeIn(0);
		$(".tabs a").removeClass('active');
		$(this).addClass('active');
		return false;
	})
	var editor_settings= { 
		tinymce: {
			wpautop  : true,
	        language : 'ru',
	        toolbar1   : 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv',
	        toolbar2   : 'formatselect,underline,alignjustify,forecolor,pastetext,removeformat,charmap,outdent,indent,undo,redo,wp_help',
		}, 
		quicktags: true 
	}
	$(".popup_container .zagolovok").click(function(){
		var lang=$(".invisible_lang").text();
		var zagolovok_html=$(".invisible.edit_zagolovok").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+zagolovok_html+"</div>");
		i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container #field_zagolovok_"+lang+"_0").attr("name","extra[field_zagolovok_"+lang+"_"+i_k+"]");
		$(".bloki_container input[name='extra[field_zagolovok_"+lang+"_"+i_k+"]'").attr("id","field_zagolovok_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_zagolovok_"+lang+"_0']").attr("for","field_zagolovok_"+lang+"_"+i_k);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
		return false;
	})
	$(".popup_container .text_sleva").click(function(){
		var lang=$(".invisible_lang").text();
		var text_sleva_html=$(".invisible.edit_text_sleva").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_sleva_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container label[for='field_text_sleva_button_name_"+lang+"_0']").attr("for","field_text_sleva_button_name_"+lang+"_"+i_k);
		$(".bloki_container #field_text_sleva_button_name_"+lang+"_0").attr("id","field_text_sleva_button_name_"+lang+"_"+i_k).attr("name","extra[field_text_sleva_button_name_"+lang+"_"+i_k+"]");
		$(".bloki_container label[for='field_text_sleva_button_url_"+lang+"_0']").attr("for","field_text_sleva_button_url_"+lang+"_"+i_k);
		$(".bloki_container #field_text_sleva_button_url_"+lang+"_0").attr("id","field_text_sleva_button_url_"+lang+"_"+i_k).attr("name","extra[field_text_sleva_button_url_"+lang+"_"+i_k+"]");
		$(".bloki_container label[for='field_text_sleva_vovale_"+lang+"_0']").attr("for","field_text_sleva_vovale_"+lang+"_"+i_k);
		$(".bloki_container #field_text_sleva_vovale_"+lang+"_0").attr("id","field_text_sleva_vovale_"+lang+"_"+i_k).attr("name","extra[field_text_sleva_vovale_"+lang+"_"+i_k+"]");
		$(".bloki_container #image-url0").attr("name","extra[field_text_sleva_bg_"+lang+"_"+i_k+"]").attr("id","image-url"+i_k);
		$(".bloki_container input[role='0']").attr("role",i_k);
		$(".bloki_container #upli0").attr("id","upli"+i_k);
		$(".bloki_container #field_text_sleva_"+lang+"_0").attr("id","field_text_sleva_"+lang+"_"+i_k).attr("name","extra[field_text_sleva_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_text_sleva_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
		return false;
	})
	$(".popup_container .text_sprava").click(function(){
		var lang=$(".invisible_lang").text();
		var text_sprava_html=$(".invisible.edit_text_sprava").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_sprava_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container label[for='field_text_sprava_button_name_"+lang+"_0']").attr("for","field_text_sprava_button_name_"+lang+"_"+i_k);
		$(".bloki_container #field_text_sprava_button_name_"+lang+"_0").attr("id","field_text_sprava_button_name_"+lang+"_"+i_k).attr("name","extra[field_text_sprava_button_name_"+lang+"_"+i_k+"]");
		$(".bloki_container label[for='field_text_sprava_button_url_"+lang+"_0']").attr("for","field_text_sprava_button_url_"+lang+"_"+i_k);
		$(".bloki_container #field_text_sprava_button_url_"+lang+"_0").attr("id","field_text_sprava_button_url_"+lang+"_"+i_k).attr("name","extra[field_text_sprava_button_url_"+lang+"_"+i_k+"]");
		$(".bloki_container label[for='field_text_sprava_vovale_"+lang+"_0']").attr("for","field_text_sprava_vovale_"+lang+"_"+i_k);
		$(".bloki_container #field_text_sprava_vovale_"+lang+"_0").attr("id","field_text_sprava_vovale_"+lang+"_"+i_k).attr("name","extra[field_text_sprava_vovale_"+lang+"_"+i_k+"]");
		$(".bloki_container #image-url0").attr("name","extra[field_text_sprava_bg_"+i_k+"]").attr("id","image-url"+i_k);
		$(".bloki_container input[role='0']").attr("role",i_k);
		$(".bloki_container #upli0").attr("id","upli"+i_k);
		$(".bloki_container #field_text_sprava_"+lang+"_0").attr("id","field_text_sprava_"+lang+"_"+i_k).attr("name","extra[field_text_sprava_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_text_sprava_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
		return false;
	})
	$(".popup_container .text").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_text").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container #field_text_"+lang+"_0").attr("id","field_text_"+lang+"_"+i_k).attr("name","extra[field_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
		return false;
	})
	$(".popup_container .text_with_button").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_text_with_button").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container label[for='field_text_with_button_name_"+lang+"_0']").attr("for","field_text_with_button_name_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_text_with_button_url_"+lang+"_0']").attr("for","field_text_with_button_url_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_text_with_button_text_"+lang+"_0']").attr("for","field_text_with_button_text_"+lang+"_"+i_k);
		$(".bloki_container #field_text_with_button_name_"+lang+"_0").attr("id","field_text_with_button_name_"+lang+"_"+i_k).attr("name","extra[field_text_with_button_name_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_text_with_button_url_"+lang+"_0").attr("id","field_text_with_button_url_"+lang+"_"+i_k).attr("name","extra[field_text_with_button_url_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_text_with_button_text_"+lang+"_0").attr("id","field_text_with_button_text_"+lang+"_"+i_k).attr("name","extra[field_text_with_button_text_"+lang+"_"+i_k+"]");
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
		return false;
	})
	$(".popup_container .steps").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.steps").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container label[for='field_steps_slovo_"+lang+"_0']").attr("for","field_steps_slovo_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step1_"+lang+"_0']").attr("for","field_step1_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step2_"+lang+"_0']").attr("for","field_step2_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step3_"+lang+"_0']").attr("for","field_step3_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step4_"+lang+"_0']").attr("for","field_step4_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step5_"+lang+"_0']").attr("for","field_step5_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step6_"+lang+"_0']").attr("for","field_step6_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step1_text_"+lang+"_0']").attr("for","field_step1_text_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step2_text_"+lang+"_0']").attr("for","field_step2_text_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step3_text_"+lang+"_0']").attr("for","field_step3_text_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step4_text_"+lang+"_0']").attr("for","field_step4_text_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step5_text_"+lang+"_0']").attr("for","field_step5_text_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_step6_text_"+lang+"_0']").attr("for","field_step6_text_"+lang+"_"+i_k);
		$(".bloki_container #field_steps_slovo_"+lang+"_0").attr("id","field_steps_slovo_"+lang+"_"+i_k).attr("name","extra[field_steps_slovo_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_step1_"+lang+"_0").attr("id","field_step1_"+lang+"_"+i_k).attr("name","extra[field_step1_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_step2_"+lang+"_0").attr("id","field_step2_"+lang+"_"+i_k).attr("name","extra[field_step2_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_step3_"+lang+"_0").attr("id","field_step3_"+lang+"_"+i_k).attr("name","extra[field_step3_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_step4_"+lang+"_0").attr("id","field_step4_"+lang+"_"+i_k).attr("name","extra[field_step4_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_step5_"+lang+"_0").attr("id","field_step5_"+lang+"_"+i_k).attr("name","extra[field_step5_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_step6_"+lang+"_0").attr("id","field_step6_"+lang+"_"+i_k).attr("name","extra[field_step6_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_step1_text_"+lang+"_0").attr("id","field_step1_text_"+lang+"_"+i_k).attr("name","extra[field_step1_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_step1_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container #field_step2_text_"+lang+"_0").attr("id","field_step2_text_"+lang+"_"+i_k).attr("name","extra[field_step2_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_step2_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container #field_step3_text_"+lang+"_0").attr("id","field_step3_text_"+lang+"_"+i_k).attr("name","extra[field_step3_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_step3_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container #field_step4_text_"+lang+"_0").attr("id","field_step4_text_"+lang+"_"+i_k).attr("name","extra[field_step4_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_step4_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container #field_step5_text_"+lang+"_0").attr("id","field_step5_text_"+lang+"_"+i_k).attr("name","extra[field_step5_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_step5_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container #field_step6_text_"+lang+"_0").attr("id","field_step6_text_"+lang+"_"+i_k).attr("name","extra[field_step6_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_step6_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
		return false;
	})
	$(".popup_container .download").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_download").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container label[for='field_download1_text_"+lang+"_0']").attr("for","field_download1_text_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_download2_text_"+lang+"_0']").attr("for","field_download2_text_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_download1_button_name_"+lang+"_0']").attr("for","field_download1_name_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_download2_button_name_"+lang+"_0']").attr("for","field_download2_name_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_download1_button_url_"+lang+"_0']").attr("for","field_download1_url_"+lang+"_"+i_k);
		$(".bloki_container label[for='field_download2_button_url_"+lang+"_0']").attr("for","field_download2_url_"+lang+"_"+i_k);
		$(".bloki_container #field_download1_text_"+lang+"_0").attr("id","field_download1_text_"+lang+"_"+i_k).attr("name","extra[field_download1_text_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_download2_text_"+lang+"_0").attr("id","field_download2_text_"+lang+"_"+i_k).attr("name","extra[field_download2_text_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_download1_button_name_"+lang+"_0").attr("id","field_download1_button_name_"+lang+"_"+i_k).attr("name","extra[field_download1_button_name_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_download2_button_name_"+lang+"_0").attr("id","field_download2_button_name_"+lang+"_"+i_k).attr("name","extra[field_download2_button_name_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_download1_button_url_"+lang+"_0").attr("id","field_download1_button_url_"+lang+"_"+i_k).attr("name","extra[field_download1_button_url_"+lang+"_"+i_k+"]");
		$(".bloki_container #field_download2_button_url_"+lang+"_0").attr("id","field_download2_button_url_"+lang+"_"+i_k).attr("name","extra[field_download2_button_url_"+lang+"_"+i_k+"]");
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
		return false;
	})
	$(".popup_container .flagi").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_flagi").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container label[for='field_flagi_text_"+lang+"_0']").attr("for","field_flagi_text_"+lang+"_"+i_k);
		$(".bloki_container #field_flagi_text_"+lang+"_0").attr("id","field_flagi_text_"+lang+"_"+i_k).attr("name","extra[field_flagi_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_flagi_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
		return false;
	})
	$(".popup_container .perechislenie_skartinkoy").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_perechislenie_skartinkoy").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container #perechislenie_text_"+lang+"_0").attr("id","perechislenie_text_"+lang+"_"+i_k).attr("name","extra[perechislenie_text_"+lang+"_"+i_k+"]");
		wp.editor.initialize("perechislenie_text_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
	})
	$(".popup_container .picture_center").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_picture_center").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
	})	
	$(".popup_container .tri_kolonki").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_tri_kolonki").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container #field_tri_kolonki_block1_"+lang+"_0").attr("id","field_tri_kolonki_block1_"+lang+"_"+i_k).attr("name","extra[field_tri_kolonki_block1_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_tri_kolonki_block1_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container #field_tri_kolonki_block2_"+lang+"_0").attr("id","field_tri_kolonki_block2_"+lang+"_"+i_k).attr("name","extra[field_tri_kolonki_block2_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_tri_kolonki_block2_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container #field_tri_kolonki_block3_"+lang+"_0").attr("id","field_tri_kolonki_block3_"+lang+"_"+i_k).attr("name","extra[field_tri_kolonki_block3_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_tri_kolonki_block3_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
	})
	$(".popup_container .etapi").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_etapi").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container #field_etapi1_"+lang+"_0").attr("id","field_etapi1_"+lang+"_"+i_k).attr("name","extra[field_etapi1_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_etapi1_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container #field_etapi2_"+lang+"_0").attr("id","field_etapi2_"+lang+"_"+i_k).attr("name","extra[field_etapi2_"+lang+"_"+i_k+"]");
		wp.editor.initialize("field_etapi2_"+lang+"_"+i_k, editor_settings);
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
	})
	$(".popup_container .text_oval").click(function(){
		var lang=$(".invisible_lang").text();
		var text_html=$(".invisible.edit_text_oval").html();
		$(".perestavit_bloki").fadeOut(0);
		$(".bloki_container").append("<div class='edit_block posl_block'>"+text_html+"</div>");
		var i_k=1;
		for(i=1; i<=100; i++){
			if($(".bloki_container .field_"+i).length>0){
				i_k=i+1;
			}
		}
		$(".bloki_container label[for='block_id_0']").attr("for","block_id_"+i_k);
		$(".bloki_container input[name='extra[block_id_0]'").attr("id","block_id_"+i_k).attr("name","extra[block_id_"+i_k+"]");
		$(".bloki_container .field_0").addClass("field_"+i_k);
		$(".bloki_container .field_"+i_k).removeClass("field_0");
		$(".bloki_container #field_text_oval_"+lang+"_0").attr("id","field_text_oval_"+lang+"_"+i_k).attr("name","extra[field_text_oval_"+lang+"_"+i_k+"]");
		$(".bloki_container input[name='extra[block_order_"+lang+"_0]'").attr("name","extra[block_order_"+lang+"_"+i_k+"]").val(i_k);
		$(".popup").fadeOut(300);
		$(".invisible_edit").html("");
		$(".sozdat_block").fadeOut(200);
	})
	var num=0;
	$(".adm_goroda input").click(function(){
		num=$(this).attr('data-num');
	})
	$(".adm_map").click(function(e){
		if(num!=0){
			var x_letter = Math.round(e.offsetX/$(".adm_map").width()*100*10)/10;
			var y_letter=Math.round(e.offsetY/$(".adm_map").height()*100*10)/10;
			$("input.procent_x[data-num="+num+"]").val(x_letter);
			$("input.procent_y[data-num="+num+"]").val(y_letter);
		}
	})
	$(".adm_goroda input[type='checkbox']").click(function(){
		var name=$(this).attr('name');
		var checked=$(this).prop('checked');
		$(".adm_goroda input[type='hidden'][name='"+name+"']").val(checked);
	})
	$(".block_vniz").click(function(){
		var th=$(this).parent('.perestavit_bloki').parent('.block_head').parent('.edit_block');
		var this_num= $(".edit_block").index(th);
		var this_order=$(this).parent('.perestavit_bloki').parent('.block_head').parent('.edit_block').children('.input_order').val();
		var next_eq=this_num+1;
		var sled_order=$(".edit_block").eq(next_eq).children('.input_order').val();
		$(this).parent('.perestavit_bloki').parent('.block_head').parent('.edit_block').children('.input_order').val(sled_order);
		$(".edit_block").eq(next_eq).children('.input_order').val(this_order);
		$(this).parent('.perestavit_bloki').parent('.block_head').parent('.edit_block').css("order",sled_order);
		$(".edit_block").eq(next_eq).css("order",this_order);
	})
	$(".block_vverh").click(function(){
		var th=$(this).parent('.perestavit_bloki').parent('.block_head').parent('.edit_block');
		var this_num= $(".edit_block").index(th);
		var this_order=$(this).parent('.perestavit_bloki').parent('.block_head').parent('.edit_block').children('.input_order').val();
		var pred_eq=this_num-1;
		var pred_order=$(".edit_block").eq(pred_eq).children('.input_order').val();
		$(this).parent('.perestavit_bloki').parent('.block_head').parent('.edit_block').children('.input_order').val(pred_order);
		$(".edit_block").eq(pred_eq).children('.input_order').val(this_order);
		$(this).parent('.perestavit_bloki').parent('.block_head').parent('.edit_block').css("order",pred_order);
		$(".edit_block").eq(pred_eq).css("order",this_order);
	})
	var kol_blokov=$('.bloki_container .edit_block').length;
	var max_order=0;
	var max_eq=0;
	var min_order=200;
	var min_eq=0;
	for(i=0; i<kol_blokov; i++){
		if(parseInt($(".edit_block").eq(i).children('.input_order').val())>max_order){
			max_order=$(".edit_block").eq(i).children('.input_order').val();
			max_eq=i;
		}
		if(parseInt($(".edit_block").eq(i).children('.input_order').val())<min_order){
			min_order=$(".edit_block").eq(i).children('.input_order').val();
			min_eq=i;
		}
	}
	$('.bloki_container .edit_block').eq(max_eq).addClass('posl_block');
	$('.bloki_container .edit_block').eq(min_eq).addClass('perv_block');
})