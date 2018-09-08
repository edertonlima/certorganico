<?php get_header(); ?>
	
	<?php $term = get_queried_object(); ?>
	<?php while ( have_posts() ) : the_post(); ?>

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

		<section class="box-content border border-verde det-noticia">
			<div class="container">
				
				<div class="row">
					<div class="col-12">
						<h2 class="center verde"><?php echo get_the_category()[0]->name; ?></h2>
						<h3 class="center verde"><?php the_title(); ?></h3>
					</div>

					<div class="content-text vertical-align">
						<div class="col-6">
							<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' ); ?>
							<img src="<?php echo $imagem[0] ?>" alt="<?php the_title(); ?>">
						</div>
						<div class="col-5 mlright">
							
							<?php the_excerpt(); ?>

						</div>
					</div>
				</div>

			</div>
		</section>

		<section class="box-content no-padding-top">
			<div class="container">
				
				<div class="row">
					<div class="col-10 mlleft mlright">
						<?php the_content(); ?>
					</div>
				</div>

			</div>
		</section>

	<?php endwhile;
	wp_reset_query(); ?>

<?php get_footer(); ?>