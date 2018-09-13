	<?php get_template_part( 'content-contato' ); ?>

	<footer class="footer border border-verde">
		<div class="container">
			
			<h1>
				<a href="<?php //echo get_home_url(); ?>" title="<?php the_field('titulo', 'option'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-footer.png" alt="<?php the_field('titulo', 'option'); ?>">
				</a>
			</h1>

		</div>
	</footer>

	<?php 
		switch (ICL_LANGUAGE_CODE) {
			case 'pt-br':
				$form_login = array('E-mail:*','Senha:*','Entrar');
			break;
			case 'en':
				$form_login = array('Email:*','Password:*','Login');
			break;
			case 'es':
				$form_login = array('E-mail:*','Contraseña:*','Entrar');
			break;
		}
	?>
	<div class="login-mask">
		<form action="<?php echo get_permalink(get_page_by_path('documentos')); ?>" method="post" id="login" class="contato">
			<fieldset>
				<i class="fas fa-times close"></i> 
				<h3 class="verde-claro"><?php if(ICL_LANGUAGE_CODE == 'pt-br'){ echo 'Documentos Restritos'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'Restricted Documents'; }else{ echo 'Documentos restringidos'; }} ?></h3>
				<input type="text" name="email-login" placeholder="<?php echo $form_login[0]; ?>">
				<input type="password" name="senha-login" placeholder="<?php echo $form_login[1]; ?>">
				<button type="submit" class="button enviar"><?php echo $form_login[2]; ?></button>
			</fieldset>
		</form>
	</div>

</body>
</html>

<script type="text/javascript">
	jQuery(window).load(function(){
		jQuery('.vertical-align').each(function(){
			jQuery('.col-5',this).height(jQuery('.col-6 img',this).height());
		});
	});

	jQuery(document).ready(function(){
		jQuery('.close').click(function(){
			jQuery('.login-mask').css('display','none');
			jQuery('#login').trigger("reset");
		});

		jQuery('.btn-login').click(function(){
			jQuery('.login-mask').css('display','table');;
		});
	});
</script>