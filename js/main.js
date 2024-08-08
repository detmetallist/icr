$(document).ready(function(){
	var nazhali=0;
	var header_li_length=$('.header-menu--bottom>ul>li').length;
	$(document).scroll(function(){
		if($(window).scrollTop()>0){
			$('.header, .menu>li>.sub-menu, .menu, .menu-back').addClass('header-scroll');
		} else {
			$('.header, .menu>li>.sub-menu, .menu, .menu-back').removeClass('header-scroll');
		}
		if($(".advantage").length>0){
			if($(window).scrollTop()>=$(".advantage").offset().top){
				$(".popup").fadeIn(200);
			} else {
				$(".popup").fadeOut(200);
			}
		}
		if($(".fixed_sidebar li").length>0&&nazhali==0){
			if($('#menu-sertyfykatsyia-dlia-ostalnoho-myra').length>0){
				podsvetiti_menu();
			}
		}	
		if($('.fixed_sidebar').length>0){
			var sidebar_height=$('.fixed_sidebar').height()+parseInt($('section.wrapper').css('padding-top'));
			var win_height=$(window).height();
			var top_sidebar_fixed=sidebar_height-win_height;
			var win_top=$(document).scrollTop();
			var footer_top=$('footer').offset().top;
			var do_footera=footer_top-win_top-win_height;
			var do_contenta=$('header').height()+50;
			var do_sidebara_ot_footera=$('.fixed_sidebar').position().top+$('.fixed_sidebar ul').height()-(footer_top-win_top);
			var ot_headera_do_footera=-($('header').height()-(footer_top-win_top));
			if(win_top>top_sidebar_fixed&&do_footera>0&&sidebar_height>win_height){
				$('.fixed_sidebar').css('position','fixed');
			} else if(sidebar_height<=win_height&&do_footera>0){
				$('.fixed_sidebar').css('position','fixed').css('top','100px');
			} else if(do_sidebara_ot_footera>0&&ot_headera_do_footera<=$('.fixed_sidebar ul').height()){
				$('.fixed_sidebar').css('position','absolute').css('top','auto');
			} else if(do_sidebara_ot_footera>=0&&ot_headera_do_footera>-$('.fixed_sidebar ul').height()) {
				$('.fixed_sidebar').css('position','fixed').css('top','100px');
			} else if(do_footera>0) {
				$('.fixed_sidebar').css('position','relative');
			}
		}
	})
	$(".form_close, .popup_over").click(function(){
		$(".popup_forms, .form_block").fadeOut(200);
	})
	$('a[href^="#form"]').click(function () { 
		elementClick = $(this).attr("href");
		$(".popup_forms").fadeIn(200);
		$(elementClick).fadeIn(200);
		return false;
	})
	if($(".fixed_sidebar").length>0){
		$(".fixed_sidebar .menu-item").removeClass("current-menu-item");
		if($('#menu-sertyfykatsyia-dlia-ostalnoho-myra').length>0){
			podsvetiti_menu();
		}
		$(".fixed_sidebar li a, .sub-menu li a").click(function(){
			for(i=0; i<$(".fixed_sidebar li").length; i++){
				if($(".fixed_sidebar li").eq(i).children("a").text()==$(this).text()){
					nazhali=1;
					$(".fixed_sidebar li").removeClass("current-menu-item");
					$(".fixed_sidebar li").eq(i).addClass("current-menu-item");
					$(".header-menu--bottom>ul>li").eq(header_li_length-1).children("ul").children("li").children("ul").children("li").removeClass("current-menu-item");
					$(".header-menu--bottom>ul>li").eq(header_li_length-1).children("ul").children("li").children("ul").children("li").eq(i).addClass("current-menu-item");
					var selected = $(this).attr("href").split('#');
					var destination = $("#"+selected[1]).offset().top;
					$('html,body').animate( { scrollTop: destination }, 500 );
					setTimeout(function(){
						nazhali=0;
					},600);
				}
			}
		})
	}
	function podsvetiti_menu(){
		for(i=0; i<$(".fixed_sidebar li").length; i++){
			console.log($(".fixed_sidebar li a").length);
			if($(".fixed_sidebar li a").length>i+1){
					var th = $(".fixed_sidebar li").eq(i+1).children("a").attr("href").split('#');
					if(th[1].length>0){
						var destination = $("#"+th[1]).offset().top-$(window).scrollTop()-500;
						if(destination>0){
							$(".fixed_sidebar li").removeClass("current-menu-item");
							$(".fixed_sidebar li").eq(i).addClass("current-menu-item");
							$(".header-menu--bottom>ul>li").eq(header_li_length-1).children("ul").children("li").children("ul").children("li").removeClass("current-menu-item");
							$(".header-menu--bottom>ul>li").eq(header_li_length-1).children("ul").children("li").children("ul").children("li").eq(i).addClass("current-menu-item");
							break;
						}
					}	
			} else {
				$(".fixed_sidebar li").removeClass("current-menu-item");
				$(".fixed_sidebar li").eq(i).addClass("current-menu-item");
				$(".header-menu--bottom>ul>li").eq(header_li_length-1).children("ul").children("li").children("ul").children("li").removeClass("current-menu-item");
				$(".header-menu--bottom>ul>li").eq(header_li_length-1).children("ul").children("li").children("ul").children("li").eq(i).addClass("current-menu-item");
				break;
			}
		}
	}
	$(".menu-item-has-children>a").click(function(){
		if($(document).width()<960){
			$(this).parent(".menu-item-has-children").children(".sub-menu").animate({"right":"0"},300);
			$(this).parent(".menu-item-has-children").parent(".menu").animate({"right":"-300px"},300);
			$(".menu-back").fadeIn(200);
		}
		return false;
	})
	$(".menu-back").click(function(){
		$(".sub-menu").animate({"right":"-300px"},300);
		$(".menu").animate({"right":"0"},300);
		$(this).fadeOut(200);
	})
	$(".mobile-menu-wrap").click(function(){
		if($(this).hasClass("mobile-menu-close")){
			$(this).removeClass("mobile-menu-close");
			$(".menu, .sub-menu").animate({"right":"-300px"},300);
			$(".mobile-menu-wrap .menu-close, .menu-back").fadeOut(300);
			$(".mobile-menu-wrap span").fadeIn(300);
		} else {
			$(this).addClass("mobile-menu-close");
			$(".menu").animate({"right":"0"},300);
			$(".mobile-menu-wrap .menu-close").fadeIn(300);
			$(".mobile-menu-wrap span").fadeOut(300);
		}
	})
})