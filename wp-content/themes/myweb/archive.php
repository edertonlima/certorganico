<?php get_header(); ?>

<?php $term = get_queried_object(); ?>

	<!-- slide -->
	<section class="box-content no-padding">
		<div class="slide">
			<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

				<div class="carousel-inner" role="listbox">

					<?php if( have_rows('slide',$term) ):
						$slide = 0;
						while ( have_rows('slide',$term) ) : the_row();
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

	<section class="box-content border border-verde">
		<div class="container">
			
			<div class="row">
				<div class="col-12">
					<h2 class="center verde"><?php single_term_title(); ?></h2>
					<h3 class="center verde"><?php the_field('subtitulo',$term); ?></h3>
				</div>
			</div>

		</div>
	</section>

	<section class="box-content no-padding-top noticia">
		<div class="container">
			
			<div class="row">
				<div class="col-10 mlleft mlright">

					<?php
						// Start the Loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the Post-Format-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
							 */
							get_template_part( 'content-noticia', get_post_format() );

						// End the loop.
						endwhile;

						// Previous/next page navigation.
						the_posts_pagination( array(
							'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
							'next_text'          => __( 'Next page', 'twentyfifteen' ),
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
						) );
					?>

				</div>
			</div>

		</div>
	</section>

<?php /*

<section class="box-content">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2 class="borda">Products</h2>
			</div>

			<div class="list-produtos">

				<?php
					$qtd_prod = 0;
					$args = array(
					    'taxonomy'      => 'products_taxonomy',
					    'parent'        => 0,
					    'orderby'       => 'name',
					    'order'         => 'ASC',
					    'hierarchical'  => 1,
					    'pad_counts'    => 0
					);
					$categories = get_categories( $args );
					foreach ( $categories as $categoria ){

						$field_cat = 'products_taxonomy_'.$categoria->term_taxonomy_id; ?>

						<a href="<?php echo get_term_link($categoria->term_id); ?>" class="col-6">
							<img src="<?php the_field('img_categoria', $field_cat); ?>" class="center">
							<h4><?php echo $categoria->name; ?></h4>
							<p class="justify-left"><?php echo $categoria->description; ?></p>
						</a>

					<?php }
				?>

			</div>
		</div>

	</div>
</section>

*/ ?>

<?php get_footer(); ?>