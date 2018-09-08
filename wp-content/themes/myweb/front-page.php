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

<?php /*if(get_field('titulo_chamada_home',get_page_by_path('contact'))){ ?>
	<section class="box-content">
		<div class="container">
			
			<div class="row">
				<div class="col-8">
					<p class="destaque"><?php the_field('titulo_chamada_home',get_page_by_path('contact')); ?></p>
				</div>
				<div class="col-4">
					<a href="<?php echo get_permalink(get_page_by_path('contact')); ?>" class="button contato-home">Contact us</a>
				</div>
			</div>

		</div>
	</section>
<?php } ?>

<section class="box-content azul">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2><?php echo get_the_title(get_page_by_path('company')); ?></h2>
				<p class="destaque-mini"><?php echo get_the_excerpt(get_page_by_path('company')); ?></p>

				<?php if(get_field('img_home',get_page_by_path('company'))){ ?>
					<img src="<?php the_field('img_home',get_page_by_path('company')); ?>" class="center img-top-50">
				<?php } ?>
			</div>
		</div>

	</div>
</section>

<section class="box-content">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2>Products</h2>
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


<?php 
	$markets = get_terms( array(
	    'taxonomy' => 'post_tag',
	    'hide_empty' => true,
	) );

	if(count($markets)){ ?>

		<section class="box-content verde" id="markets">
			<div class="container">
				
				<div class="row">
					<div class="col-12">
						<h2>Markets</h2>
						<ul class="list-markets">


							<?php //var_dump($markets);

							foreach ( $markets as $market ){ 
								$field_tag = 'post_tag_'.$market->term_taxonomy_id; ?>
								<li>
									<img src="<?php the_field('icone',$field_tag); ?>">
									<a href="<?php echo get_category_link( $market->term_id ); ?>" title="<?php echo $market->name; ?>"><?php echo $market->name; ?></a></li>
							<?php } ?>

						</ul>
					</div>
				</div>

			</div>
		</section>

	<?php } */
?>


<?php get_template_part( 'content-quem-somos' ); ?>


<?php if( have_rows('servicos',get_page_by_path('servicos')->ID) ): ?>
	<section class="box-content border border-verde-claro">
		<div class="container">
			
			<div class="row">
				<div class="col-12">
					<h2 class="verde-claro center"><?php echo get_the_title(get_page_by_path('servicos')->ID); ?></h2>
					<h3 class="verde-claro center"><?php the_field('subtitulo',get_page_by_path('servicos')->ID); ?></h3>
				</div>

				<div class="content-text">
					<div class="col-5 mlleft">

						<?php if( have_rows('servicos',get_page_by_path('servicos')->ID) ):
							while ( have_rows('servicos',get_page_by_path('servicos')->ID) ) : the_row(); ?>

								<h4 class="verde-claro"><?php the_sub_field('titulo'); ?></h4>
								<p><?php the_sub_field('resumo'); ?></p>

							<?php endwhile;
						endif; ?>

						<span class="center">
							<a href="<?php echo get_permalink(get_page_by_path('servicos')); ?>" class="btn-inline mais-informacoes verde-claro" title="mais informações"><i class="fas fa-plus circle"></i> mais informações</a>
						</span>
					</div>

					<div class="col-6">
						<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id(get_page_by_path('servicos')->ID), 'medium' ); ?>
						<img src="<?php echo $imagem[0] ?>" alt="<?php echo get_the_title(get_page_by_path('servicos')->ID); ?>">
					</div>
				</div>
			</div>

		</div>
	</section>
<?php endif; ?>

<?php if( have_rows('como-funciona',get_page_by_path('como-funciona')->ID) ): ?>
	<section class="box-content cinza border border-verde como-funciona-home">
		<div class="container">
			
			<div class="row">
				<div class="col-12">
					<h2 class="verde center"><?php echo get_the_title(get_page_by_path('como-funciona')->ID); ?></h2>
					<h3 class="verde center"><?php the_field('subtitulo',get_page_by_path('como-funciona')->ID); ?></h3>
				</div>
			</div>

				<div class="content-text">
					<div class="col-10 mlleft mlright">

						<?php if( have_rows('como-funciona',get_page_by_path('como-funciona')->ID) ):
							$count=0;
							while ( have_rows('como-funciona',get_page_by_path('como-funciona')->ID) ) : the_row();
								$count=$count+1; ?>

									<p><strong><?php echo $count; ?>. <?php the_sub_field('titulo'); ?></strong></p>
									<p><?php the_sub_field('texto'); ?></p>

									<?php if($count == 2){ break; } ?>

							<?php endwhile;
						endif; ?>

						<span class="center">
							<a href="<?php echo get_permalink(get_page_by_path('como-funciona')); ?>" class="btn-inline mais-informacoes" title="mais informações"><i class="fas fa-plus circle"></i> mais informações</a>
						</span>
					</div>
				</div>

		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>