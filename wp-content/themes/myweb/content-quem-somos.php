<section class="box-content border <?php if(is_front_page()){ echo 'cinza'; } ?>">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2 class="center"><?php echo get_the_title(get_page_by_path('quem-somos')->ID); ?></h2>
				<h3 class="center"><?php the_field('subtitulo',get_page_by_path('quem-somos')->ID); ?></h3>
			</div>

			<div class="content-text <?php if(!is_front_page()){ echo 'vertical-align'; } ?>">
				<div class="col-6">
					<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(get_page_by_path('quem-somos')->ID), 'medium' ); ?>
					<img src="<?php echo $imagem[0] ?>" alt="<?php echo get_the_title(get_page_by_path('quem-somos')->ID); ?>">
				</div>
				<div class="col-5 mlright">
					
					<p><?php echo get_the_excerpt(get_page_by_path('quem-somos')->ID); ?></p>

					<?php if(is_front_page()){ ?>
						<span class="center">
							<a href="<?php echo get_permalink(get_page_by_path('quem-somos')->ID); ?>" class="btn-inline mais-informacoes" title="mais informações"><i class="fas fa-plus circle"></i> mais informações</a>
						</span>
					<?php } ?>
				</div>
			</div>
		</div>

	</div>
</section>