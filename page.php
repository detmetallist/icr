<?php 
	get_header(); 
	if(get_post_meta($post->ID, 'sidebar', 1)): ?>
		<section class="wrapper">
			<?php get_sidebar(); ?>
	<?php else: ?>
		<section class="test-product">
	<?php endif; ?>
			<div class="content">
				<div class="container-1500" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
					<h1 class="content-title"><?php echo the_title(); ?></h1>
				</div>
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
						<div class="container-1500" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
							<h2 class="content-title-h2"><?php echo get_post_meta($post->ID, 'field_zagolovok_'.$lang.'_'.$i, 1); ?></h2>
						</div>
					<?php }
					if(get_post_meta($post->ID, 'field_text_sleva_'.$lang.'_'.$i, 1)){ ?>
						<div class="content-description image_right" 
							<?php if(get_post_meta($post->ID, 'field_text_sleva_bg_1920_'.$i, 1)&&!get_post_meta($post->ID, 'field_text_sleva_bg_1280_'.$i, 1)): ?> 
								style="background-image: url('<?php echo get_image('field_text_sleva_bg_1920_'.$i); ?>')"
							<?php endif; ?>
							<?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
							<?php if(get_post_meta($post->ID, 'field_text_sleva_bg_1280_'.$i, 1)): ?>
								<div class="background1920" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1920_'.$i); ?>)"></div>
								<div class="background1280" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1280_'.$i); ?>)"></div>
						        <div class="background1000" style="background-image: url(<?php echo get_image('field_text_sleva_bg_1000_'.$i) ?>)"></div>
						        <div class="background768" style="background-image: url(<?php echo get_image('field_text_sleva_bg_768_'.$i) ?>)"></div>
						        <div class="background360" style="background-image: url(<?php echo get_image('field_text_sleva_bg_360_'.$i) ?>)"></div>
							<?php endif; ?>
							<div class="img_over"></div>
			                <div class="container-1500">
			                	<?php if(get_post_meta($post->ID, 'field_text_sleva_'.$lang.'_'.$i, 1)): ?>
			                		<div class="content-description--paragraph content-description--paragraph-left">
			                     		<?php echo get_post_meta($post->ID, 'field_text_sleva_'.$lang.'_'.$i, 1); ?>
			                  		</div>
			                	<?php endif; ?>
			                	<?php if(get_post_meta($post->ID, 'field_text_sleva_vovale_'.$lang.'_'.$i, 1)): ?> 
			                		<div class="info-wrap-noborder">
				                		<div class="info-wrap">
											<img src="/wp-content/themes/icr/img/info-img.svg" alt="">
					                     	<div class="info-txt">
					                        	<p><?php echo get_post_meta($post->ID, 'field_text_sleva_vovale_'.$lang.'_'.$i, 1); ?></p>
					                     	</div>
					                  	</div>
				                  	</div>
			                	<?php endif; ?>
			                	<?php if(get_post_meta($post->ID, 'field_text_sleva_button_url_'.$lang.'_'.$i, 1)): ?> 
				                  	<div class="link-order">
		                    			<a href="<?php echo get_post_meta($post->ID, 'field_text_sleva_button_url_'.$lang.'_'.$i, 1); ?>" class="iso-popup"><?php echo get_post_meta($post->ID, 'field_text_sleva_button_name_'.$lang.'_'.$i, 1); ?></a>
		                  			</div>
	                  			<?php endif; ?>
			               	</div>
		            	</div>
					<?php }
					if(get_post_meta($post->ID, 'field_text_sprava_'.$lang.'_'.$i, 1)){ ?>
						<div class="content-description image_left" 
							<?php if(get_post_meta($post->ID, 'field_text_sprava_bg_1920_'.$i, 1)&&!get_post_meta($post->ID, 'field_text_sprava_bg_1280_'.$i, 1)): ?> 
								style="background-image: url('<?php echo get_image('field_text_sprava_bg_1920_'.$i); ?>')"
							<?php endif; ?>
							<?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
							<?php if(get_post_meta($post->ID, 'field_text_sprava_bg_1280_'.$i, 1)): ?>
								<div class="background1920" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1920_'.$i); ?>)"></div>
								<div class="background1280" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1280_'.$i); ?>)"></div>
						        <div class="background1000" style="background-image: url(<?php echo get_image('field_text_sprava_bg_1000_'.$i) ?>)"></div>
						        <div class="background768" style="background-image: url(<?php echo get_image('field_text_sprava_bg_768_'.$i) ?>)"></div>
						        <div class="background360" style="background-image: url(<?php echo get_image('field_text_sprava_bg_360_'.$i) ?>)"></div>
							<?php endif; ?>
							<div class="img_over"></div>
			                <div class="container-1500">
			                	<?php if(get_post_meta($post->ID, 'field_text_sprava_'.$lang.'_'.$i, 1)): ?>
			                		<div class="content-description--paragraph content-description--paragraph-right">
			                     		<?php echo get_post_meta($post->ID, 'field_text_sprava_'.$lang.'_'.$i, 1); ?>
			                  		</div>
			                	<?php endif; ?>
			                	<?php if(get_post_meta($post->ID, 'field_text_sprava_vovale_'.$lang.'_'.$i, 1)): ?> 
			                		<div class="info-wrap-noborder">
				                		<div class="info-wrap">
					                     	<div>
											    <img src="/wp-content/themes/icr/img/info-img.svg" alt="">
										    </div>
					                     	<div class="info-txt">
					                        	<p><?php echo get_post_meta($post->ID, 'field_text_sprava_vovale_'.$lang.'_'.$i, 1); ?></p>
					                     	</div>
					                  	</div>
				                  	</div>
			                	<?php endif; ?>
			                	<?php if(get_post_meta($post->ID, 'field_text_sprava_button_url_'.$lang.'_'.$i, 1)): ?> 
				                  	<div class="link-order">
		                    			<a href="<?php echo get_post_meta($post->ID, 'field_text_sprava_button_url_'.$lang.'_'.$i, 1); ?>" class="iso-popup"><?php echo get_post_meta($post->ID, 'field_text_sprava_button_name_'.$lang.'_'.$i, 1); ?></a>
		                  			</div>
	                  			<?php endif; ?>
			               	</div>
		            	</div>
					<?php }
					if(get_post_meta($post->ID, 'field_text_'.$lang.'_'.$i, 1)){ ?>
						<div class="content-description" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
               				<div class="container-1500">
               					<div class="content-description--paragraph">
               						<?php echo get_post_meta($post->ID, 'field_text_'.$lang.'_'.$i, 1); ?>
               					</div>
               				</div>
               			</div>
					<?php }
					if(get_post_meta($post->ID, 'field_text_with_button_name_'.$lang.'_'.$i, 1)){ ?>
						<div class="container-1500" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
			               <div class="calculation">
			                  	<p><?php echo get_post_meta($post->ID, 'field_text_with_button_text_'.$lang.'_'.$i, 1); ?></p>
							   	<div class="calc-link-wrap">
			                  		<a href="<?php echo get_post_meta($post->ID, 'field_text_with_button_url_'.$lang.'_'.$i, 1) ?>" class="directiva-popup"><?php echo get_post_meta($post->ID, 'field_text_with_button_name_'.$lang.'_'.$i, 1); ?></a>
							   	</div>
			               </div>
			            </div>
					<?php }
					if(get_post_meta($post->ID, 'field_picture_center_'.$lang.'_'.$i, 1)){ ?> 
						<div class="content-description" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
							<div class="container-1500">
								<div class="content-image">
									<img src="<?php echo get_image('field_picture_center_'.$lang.'_'.$i); ?>">
								</div>
							</div>
						</div>
					<?php }
					if(get_post_meta($post->ID, 'field_step1_'.$lang.'_'.$i, 1)){ ?> 
						<div class="content-description" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
               				<div class="container-1500">
               					<div class="step-wrap">
               						<?php 
               							for($j=1; $j<=6; $j++){
               								if(get_post_meta($post->ID, 'field_step'.$j.'_'.$lang.'_'.$i, 1)){ ?>
               									<div class="step" style="background: url(<?php echo get_image('field_step'.$j.'_img_'.$i); ?>) no-repeat; background-size: 100% 100%;">
						                           <div class="step-title"><?php echo get_post_meta($post->ID, 'field_steps_slovo_'.$lang.'_'.$i, 1);?></div>
						                           <div class="step-txt"><p><strong><?php echo get_post_meta($post->ID, 'field_step'.$j.'_'.$lang.'_'.$i, 1);?></strong></p></div>
						                        </div>
               								<?php }
               							}
               						?>
               					</div>
               					<?php 
               						for($j=1; $j<=6; $j++){
               							if(get_post_meta($post->ID, 'field_step'.$j.'_'.$lang.'_'.$i, 1)){ ?>
               								<div class="step-p">
               									<p><span><span class="number"><?php echo $j; ?></span> <?php echo get_post_meta($post->ID, 'field_steps_slovo_'.$lang.'_'.$i, 1);?></span> — <strong><?php echo get_post_meta($post->ID, 'field_step'.$j.'_'.$lang.'_'.$i, 1);?></strong><br><?php echo get_post_meta($post->ID, 'field_step'.$j.'_text_'.$lang.'_'.$i, true); ?></p>
               								</div>
               							<?php }
               						}
               					?>
               				</div>
               			</div>
					<?php }
					if(get_post_meta($post->ID, 'field_download1_text_'.$lang.'_'.$i, 1)){ ?>
						<div class="content-description" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >   
							<div class="container-1500">
	           					<div class="content-description--paragraph"> 
	           						<div class="df">
					                    <div class="downoload-wrap">
					                        <div class="downoload-img">
					                            <img src="<?php echo get_image('field_download1_img_'.$i); ?>" alt="">
					                        </div>
					                        <div class="downoload">
					                            <p><?php echo get_post_meta($post->ID, 'field_download1_text_'.$lang.'_'.$i, 1) ?></p>
					                            <a href="<?php echo get_post_meta($post->ID, 'field_download1_button_url_'.$lang.'_'.$i, 1);?>"><?php echo get_post_meta($post->ID, 'field_download1_button_name_'.$lang.'_'.$i, 1);?></a>
					                        </div>
					                    </div>
					                    <?php if(get_post_meta($post->ID, 'field_download2_text_'.$lang.'_'.$i, 1)): ?>
						                    <div class="downoload-wrap">
						                        <div class="downoload-img">
						                            <img src="<?php echo get_image('field_download2_img_'.$i); ?>" alt="">
						                        </div>
						                        <div class="downoload">
						                            <p><?php echo get_post_meta($post->ID, 'field_download2_text_'.$lang.'_'.$i, 1) ?></p>
						                            <a href="<?php echo get_post_meta($post->ID, 'field_download2_button_url_'.$lang.'_'.$i, 1);?>"><?php echo get_post_meta($post->ID, 'field_download2_button_name_'.$lang.'_'.$i, 1);?></a>
						                        </div>
						                    </div>
					                	<?php endif; ?>
					                </div> 
	           					</div>
           					</div>
           				</div>
					<?php }
					if(get_post_meta($post->ID, 'field_tri_kolonki_block1_'.$lang.'_'.$i, 1)){ ?>
						<div class="content-description" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
							<div class="container-1500">
								<div class="content-column-wrap">
									<div class="content-column"><?php echo get_post_meta($post->ID, 'field_tri_kolonki_block1_'.$lang.'_'.$i, true); ?></div>
	            					<div class="content-column"><?php echo get_post_meta($post->ID, 'field_tri_kolonki_block2_'.$lang.'_'.$i, true); ?></div>
	            					<div class="content-column"><?php echo get_post_meta($post->ID, 'field_tri_kolonki_block3_'.$lang.'_'.$i, true); ?></div>	
            					</div>	
							</div>
						</div>
					<?php }
					if(get_post_meta($post->ID, 'field_etapi1_'.$lang.'_'.$i, 1)){ ?> 
						<div class="container-1500" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?>>
                  			<div class="ce-marking-content">
                  				<div class="stage-wrap">
	                  				<div class="stage">
			                           <div class="stage-img">
			                            	<img src="<?php echo get_template_directory_uri() ?>/img/1stage.svg" alt="">
			                           </div>
			                           <div class="stage-txt"><?php echo get_post_meta($post->ID, 'field_etapi1_'.$lang.'_'.$i, true); ?></div>
			                        </div>
			                        <div class="stage">
			                            <div class="stage-img">
			                             	<img src="<?php echo get_template_directory_uri() ?>/img/2stage.svg" alt="">
			                            </div>
			                            <div class="stage-txt"><?php echo get_post_meta($post->ID, 'field_etapi2_'.$lang.'_'.$i, true); ?></div>
			                        </div>
		                        <div class="stage-wrap">
                  			</div>
                  		</div>
					<?php }
					if(get_post_meta($post->ID, 'field_flagi_text_'.$lang.'_'.$i, 1)){ ?>
						<div class="content-description image_right block_ispitaniy" 
							<?php if(get_post_meta($post->ID, 'field_flagi_text_bg_1920_'.$i, 1)&&!get_post_meta($post->ID, 'field_flagi_text_bg_1280_'.$i, 1)): ?> 
								style="background-image: url('<?php echo get_image('field_flagi_text_bg_1920_'.$i); ?>')"
							<?php endif; ?>
							<?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >
							<?php if(get_post_meta($post->ID, 'field_flagi_video_'.$i, 1)): ?>
								<div class="img_over"></div>
								<div class="video_ispitaniy">
									<video autoplay preload="auto" playsinline muted loop id="myVideo">
								        <source src="<?php echo get_image('field_flagi_video_'.$i) ?>" type="video/mp4">
								    </video>
								</div>
							<?php endif; ?>
							<?php if(get_post_meta($post->ID, 'field_flagi_text_bg_1280_'.$i, 1)): ?>
								<div class="background1920" style="background-image: url(<?php echo get_image('field_flagi_text_bg_1920_'.$i); ?>)"></div>
								<div class="background1280" style="background-image: url(<?php echo get_image('field_flagi_text_bg_1280_'.$i); ?>)"></div>
						        <div class="background1000" style="background-image: url(<?php echo get_image('field_flagi_text_bg_1000_'.$i) ?>)"></div>
						        <div class="background768" style="background-image: url(<?php echo get_image('field_flagi_text_bg_768_'.$i) ?>)"></div>
						        <div class="background360" style="background-image: url(<?php echo get_image('field_flagi_text_bg_360_'.$i) ?>)"></div>
							<?php endif; ?>
			                <div class="container-1500">
			                	<div class="flag">
				                    <div class=""><img src="<?php echo get_image('field_flagi_img1_'.$i); ?>" alt=""></div>
				                    <div class=""><img src="<?php echo get_image('field_flagi_img2_'.$i); ?>" alt=""></div>
				                    <div class=""><img src="<?php echo get_image('field_flagi_img3_'.$i); ?>" alt=""></div>
				                </div>
			                	<?php if(get_post_meta($post->ID, 'field_flagi_text_'.$lang.'_'.$i, 1)): ?>
			                		<div class="content-description--paragraph content-description--paragraph-left">
			                     		<?php echo get_post_meta($post->ID, 'field_flagi_text_'.$lang.'_'.$i, 1); ?>
			                  		</div>
			                	<?php endif; ?>
			               	</div>
		            	</div>
					<?php }
					if(get_post_meta($post->ID, 'perechislenie_text_'.$lang.'_'.$i, 1)){ ?>
						<div class="content-description" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?>>
							<div class="container-1500">
								<div class="test-product-content-wrap">
									<div class="test-product-content">
				                        <div class="test-product-content-img">
				                            <img src="<?php echo get_image('perechislenie_img_'.$i); ?>" alt="">
				                        </div>
				                        <div class="test-product-content-txt">
				                            <p><?php echo get_post_meta($post->ID, 'perechislenie_text_'.$lang.'_'.$i, 1); ?></p>
				                        </div>
				                    </div>
								</div>
							</div>
						</div>
					<?php }
					if(get_post_meta($post->ID, 'field_text_oval_'.$lang.'_'.$i, 1)){ ?>
						<div class="content-description" <?php if(get_post_meta($post->ID, 'block_id_'.$i, 1)) { echo ' id="'.get_post_meta($post->ID, 'block_id_'.$i, 1).'"'; } ?> >  
							<div class="container-1500"> 
	            				<div class="content-description--paragraph"> 
	            					<div class="info-wrap-border">
		            					<div class="info-wrap">
						                    <img src="<?php echo get_template_directory_uri() ?>/img/info-img.svg" alt="">
						                    <div class="info-txt"><?php echo get_post_meta($post->ID, 'field_text_oval_'.$lang.'_'.$i, 1);?></div>
						                </div>
					            	</div>
	            				</div>
	            			</div>
            			</div>
					<?php }
				}
			?>
			</div>
		</section>
<?php get_footer(); ?>