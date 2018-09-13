<section class="box-content border <?php if(is_front_page()){ echo 'cinza'; } ?>">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2 class="center"><?php echo get_the_title(icl_object_id( get_page_by_path('quem-somos')->ID, 'post', false, false )); ?></h2>
				<h3 class="center"><?php the_field('subtitulo',icl_object_id( get_page_by_path('quem-somos')->ID, 'post', false, false )); ?></h3>
			</div>

			<div class="content-text <?php if(!is_front_page()){ echo 'vertical-align'; } ?>">
				<div class="col-6">
					<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(icl_object_id( get_page_by_path('quem-somos')->ID, 'post', false, false )), 'medium' ); ?>
					<img src="<?php echo $imagem[0] ?>" alt="<?php echo get_the_title(icl_object_id( get_page_by_path('quem-somos')->ID, 'post', false, false )); ?>">
				</div>
				<div class="col-5 mlright">
					
					<p><?php echo get_the_excerpt(icl_object_id( get_page_by_path('quem-somos')->ID, 'post', false, false )); ?></p>

					<?php if(is_front_page()){ ?>
						<span class="center">
							<a href="<?php echo get_permalink(get_page_by_path('quem-somos')->ID); ?>" class="btn-inline mais-informacoes" title="<?php if(ICL_LANGUAGE_CODE == 'pt'){ echo 'mais informações'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'more information'; }else{ echo 'mas informaciones'; }} ?>">
								<i class="fas fa-plus circle"></i> 
								<?php if(ICL_LANGUAGE_CODE == 'pt'){ echo 'mais informações'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'more information'; }else{ echo 'mas informaciones'; }} ?>
							</a>
						</span>
					<?php } ?>
				</div>
			</div>
		</div>

	</div>
</section>