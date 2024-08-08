<div class="sidebar">
	<div class="fixed_sidebar">
	<?php 
		if(get_post_meta($post->ID, 'sidebar', 1)=='SE'){
			$theme_location='ce_menu';
		} else if(get_post_meta($post->ID, 'sidebar', 1)=='ISO') {
			$theme_location='iso_menu';
		} else {
			$theme_location='world_menu';
		}
		wp_nav_menu(
	        array(
	            'theme_location'  => $theme_location,
	            'container'       => 'ul',
	           	'menu_class'      => 'sidebar_menu'
	        )
	    );
	?>
	</div>
</div>