<article class="list-noticia">
	<div class="col-6">
		<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' )[0]; ?>" alt="<?php the_title(); ?>" class="img-item">
	</div>
	<div class="col-6">
		<h4 class="verde"><?php the_title(); ?></h4>
		<p><?php echo nl2br(get_the_excerpt()); ?></p>
		<span class="center">
			<a href="<?php echo get_permalink(); ?>" class="btn-inline mais-informacoes" title="<?php if(ICL_LANGUAGE_CODE == 'pt'){ echo 'leia mais'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'read more'; }else{ echo 'lea mas'; }} ?>">
				<i class="fas fa-plus circle"></i> 
				<?php if(ICL_LANGUAGE_CODE == 'pt'){ echo 'leia mais'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'read more'; }else{ echo 'lea mas'; }} ?>
			</a>
		</span>
	</div>
</article>