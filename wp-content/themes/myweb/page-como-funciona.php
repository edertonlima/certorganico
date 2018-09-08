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

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content border border-verde">
			<div class="container">
				
				<div class="row">
					<div class="col-12">
						<h2 class="center verde"><?php the_title(); ?></h2>
						<h3 class="center verde"><?php the_field('subtitulo'); ?></h3>
					</div>
				</div>

			</div>
		</section>

		<?php if(get_the_content()){ ?>
			<section class="box-content no-padding-top">
				<div class="container">
					
					<div class="row">
						<div class="col-10 mlleft mlright">
							<?php the_content(); ?>
						</div>
					</div>

				</div>
			</section>
		<?php } ?>

		<section class="box-content no-padding-top como-funciona">
			<div class="container">
				
				<div class="row">
					<div class="col-10 mlleft mlright">		

						<?php if( have_rows('como-funciona') ):
							while ( have_rows('como-funciona') ) : the_row(); ?>

								<div class="item-como-funciona col-<?php the_sub_field('largura'); ?>">
									<img src="<?php the_sub_field('icone'); ?>" alt="<?php the_sub_field('titulo'); ?>" class="img-item">
									<div class="content-text">
										<h4 style="color:<?php the_sub_field('cor'); ?>"><?php the_sub_field('titulo'); ?></h4>
										<p><?php the_sub_field('texto'); ?></p>
									</div>
								</div>

							<?php endwhile;
						endif; ?>

					</div>
				</div>

			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>