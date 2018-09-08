<article class="list-noticia">
	<div class="col-6">
		<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' )[0]; ?>" alt="<?php the_title(); ?>" class="img-item">
	</div>
	<div class="col-6">
		<h4 class="verde"><?php the_title(); ?></h4>
		<?php the_excerpt(); ?>
		<span class="center">
			<a href="<?php echo get_permalink(); ?>" class="btn-inline mais-informacoes" title="leia mais"><i class="fas fa-plus circle"></i> leia mais</a>
		</span>
	</div>
</article>