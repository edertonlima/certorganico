<?php get_header(); ?>

<!-- slide -->
<section class="box-content no-padding">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();
						$slide = $slide+1;

						if(get_sub_field('video')){ ?>

							<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
								<video autoplay="true" loop="true" muted="true">
									<source src="<?php the_sub_field('video'); ?>" type="video/mp4">
								</video>
							</div>

						<?php }else{

							if(get_sub_field('imagem')){ ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

									<?php if(get_sub_field('texto')){ ?>
										<div class="box-height">
											<div class="box-texto">
												
												<p class="texto"><?php the_sub_field('texto'); ?></p>

											</div>
										</div>
									<?php } ?>
									
								</div>

							<?php }

						}
					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				<?php if($slide > 1){ ?>

					<?php for($i=0; $i<$slide; $i++){ ?>
						<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
					<?php } ?>
				<?php } ?>
			</ol>

		</div>
	</div>
</section>


<?php get_template_part( 'content-quem-somos' ); ?>


<?php if( have_rows('servicos',icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false )) ): ?>
	<section class="box-content border border-verde-claro">
		<div class="container">
			
			<div class="row">
				<div class="col-12">
					<h2 class="verde-claro center"><?php echo get_the_title(icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false )); ?></h2>
					<h3 class="verde-claro center"><?php the_field('subtitulo',icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false )); ?></h3>
				</div>

				<div class="content-text">
					<div class="col-5 mlleft">

						<?php if( have_rows('servicos',icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false )) ):
							while ( have_rows('servicos',icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false )) ) : the_row(); ?>

								<h4 class="verde-claro"><?php the_sub_field('titulo'); ?></h4>
								<p><?php the_sub_field('resumo'); ?></p>

							<?php endwhile;
						endif; ?>

						<span class="center">
							<a href="<?php echo get_permalink(get_page_by_path('servicos')); ?>" class="btn-inline mais-informacoes verde-claro" title="<?php if(ICL_LANGUAGE_CODE == 'pt'){ echo 'mais informações'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'more information'; }else{ echo 'mas informaciones'; }} ?>">
								<i class="fas fa-plus circle"></i> 
								<?php if(ICL_LANGUAGE_CODE == 'pt'){ echo 'mais informações'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'more information'; }else{ echo 'mas informaciones'; }} ?>
							</a>
						</span>
					</div>

					<div class="col-6">
						<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false )), 'medium' ); ?>
						<img src="<?php echo $imagem[0] ?>" alt="<?php echo get_the_title(icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false )); ?>">
					</div>
				</div>
			</div>

		</div>
	</section>
<?php endif; ?>

<?php if( have_rows('como-funciona',icl_object_id( get_page_by_path('como-funciona')->ID, 'post', false, false )) ): ?>
	<section class="box-content cinza border border-verde como-funciona-home">
		<div class="container">
			
			<div class="row">
				<div class="col-12">
					<h2 class="verde center"><?php echo get_the_title(icl_object_id( get_page_by_path('como-funciona')->ID, 'post', false, false )); ?></h2>
					<h3 class="verde center"><?php the_field('subtitulo',icl_object_id( get_page_by_path('como-funciona')->ID, 'post', false, false )); ?></h3>
				</div>
			</div>

				<div class="content-text">
					<div class="col-10 mlleft mlright">

						<?php if( have_rows('como-funciona',icl_object_id( get_page_by_path('como-funciona')->ID, 'post', false, false )) ):
							$count=0;
							while ( have_rows('como-funciona',icl_object_id( get_page_by_path('como-funciona')->ID, 'post', false, false )) ) : the_row();
								$count=$count+1; ?>

									<p><strong><?php echo $count; ?>. <?php the_sub_field('titulo'); ?></strong></p>
									<p><?php the_sub_field('texto'); ?></p>

									<?php if($count == 2){ break; } ?>

							<?php endwhile;
						endif; ?>

						<span class="center">
							<a href="<?php echo get_permalink(get_page_by_path('como-funciona')); ?>" class="btn-inline mais-informacoes" title="<?php if(ICL_LANGUAGE_CODE == 'pt'){ echo 'mais informações'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'more information'; }else{ echo 'mas informaciones'; }} ?>">
								<i class="fas fa-plus circle"></i> 
								<?php if(ICL_LANGUAGE_CODE == 'pt'){ echo 'mais informações'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'more information'; }else{ echo 'mas informaciones'; }} ?>
							</a>
						</span>
					</div>
				</div>

		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>