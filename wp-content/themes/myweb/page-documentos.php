<?php 
	session_start();

	if(!isset($_SESSION['id'])){ //echo '<br>não tem session';

		if(($_POST['email-login'] != '') and ($_POST['senha-login'] != '')){ //echo '<br>login não é vazio';

			$usuario = get_posts(array(
				'numberposts'	=> 1,
				'post_type'		=> 'area-restrita',
				'meta_key'		=> 'email_arearestrita',
				'meta_value'	=> $_POST['email-login']
			));

			if(count($usuario)){ //echo '<br>tem usuario';

				//echo '<br>'.$usuario[0]->ID; 
				//echo '<br>'.get_field('senha_arearestrita',$usuario[0]->ID);

				if(get_field('senha_arearestrita',$usuario[0]->ID) == $_POST['senha-login']){
					//echo "<br>senha OK";

					session_cache_limiter('private');
					$cache_limiter = session_cache_limiter();
					session_cache_expire(10);
					$cache_expire = session_cache_expire();

					$_SESSION['email'] = $_POST['email-login'];
					$_SESSION['senha'] = $_POST['email-login'];
					$_SESSION['id'] = $usuario[0]->ID;

					$msg = ' <form action="' . get_permalink(get_page_by_path('documentos')) . '" method="post"><p><strong class="verde">Bem vindo!</strong><br>Caso queria sair, <input type="hidden" name="logout" value="true"><button type="submit">clique aqui.</button></p></form>';

				}else{ //echo '<br>ERRO SENHA';
					$msg = '<p><strong class="verde">Não foi possivel entrar em sua área.</strong><br>Por favor, verifique seu nome de usuário e sua senha ou se o seu cadastro ainda não foi aprovado, você não conseguirá acessar a sua área.</p>';
				}

				//echo '<br>logado';

			}else{ //echo '<br> ERRO USUARIO';
				$msg = '<p><strong class="verde">Não foi possivel entrar em sua área.</strong><br>Por favor, verifique seu nome de usuário e sua senha ou se o seu cadastro ainda não foi aprovado, você não conseguirá acessar a sua área.</p>';
			}

		}else{ //echo '<br>não USER NEM SENHA';
			//$login = false;
			$msg = '';
		}

	}else{
		//echo '<br>tem session';
		/*session_start();
		unset($_SESSION['senha']);
		unset($_SESSION['email']);
		unset($_SESSION['id']);*/

		$msg = ' <form action="' . get_permalink(get_page_by_path('documentos')) . '" method="post"><p><strong class="verde">Bem vindo!</strong><br>Caso queria sair, <input type="hidden" name="logout" value="true"><button type="submit">clique aqui.</button></p></form>';
	}

	if(isset($_POST['logout'])){
		session_start();
		unset($_SESSION['senha']);
		unset($_SESSION['email']);
		unset($_SESSION['id']);

		$msg = '<p class="msg-documentos"><strong class="verde">Você saiu da área restrita!</strong><br>Caso queira entrar novamente, <a href="javascript:" title="clique aqui" class="btn-login">clique aqui.</a></p>';
	}
?>


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

		<?php if(isset($_SESSION['id'])){ ?>

			<section class="box-content cinza documentos documentos-restrito">
				<div class="container">
					
					<div class="row">
						<div class="col-10 mlleft mlright">

							<div class="msg-documentos">
								<?php echo $msg; ?>
							</div>
							<h3 class="verde-claro"><?php if(ICL_LANGUAGE_CODE == 'pt-br'){ echo 'Documentos Restritos'; }else{ if(ICL_LANGUAGE_CODE == 'en'){ echo 'Restricted Documents'; }else{ echo 'Documentos restringidos'; }} ?></h3>

							<?php if( have_rows('documentos') ):
								while ( have_rows('documentos') ) : the_row(); 

									if(get_sub_field('restrito')){ ?>

										<div class="item-documentos">
											<div class="content-text">
												<h4 class="verde"><?php the_sub_field('titulo'); ?></h4>
												<p><?php echo nl2br(get_sub_field('texto')); ?></p>
											</div>

											<?php if(get_sub_field('arquivo')){ ?>
												<a href="<?php the_sub_field('arquivo'); ?>" target="_blank" class="img-item" title="Download">
													<img src="<?php echo get_template_directory_uri(); ?>/assets/images/documento-download.png" alt="Download">
												</a>
											<?php }else{ ?>
												<a href="<?php the_sub_field('url'); ?>" target="_blank" class="img-item" title="Acessar">
													<img src="<?php echo get_template_directory_uri(); ?>/assets/images/documento-link.png" alt="Acessar">
												</a>
											<?php } ?>
										</div>

									<?php } ?>

								<?php endwhile;
							endif; ?>


						</div>
					</div>

				</div>
			</section>

		<?php }else{

			if($msg != ''){ ?>

				<section class="box-content cinza documentos documentos-restrito">
					<div class="container">
						
						<div class="row">
							<div class="col-10 mlleft mlright">

								<?php echo $msg; ?>

							</div>
						</div>

					</div>
				</section>
			<?php }

		} ?>

		<section class="box-content no-padding-top documentos">
			<div class="container">
				
				<div class="row">
					<div class="col-10 mlleft mlright">		

						<?php if( have_rows('documentos') ):
							while ( have_rows('documentos') ) : the_row(); 

								if(!get_sub_field('restrito')){ ?>

									<div class="item-documentos">
										<div class="content-text">
											<h4 class="verde"><?php the_sub_field('titulo'); ?></h4>
											<p><?php echo nl2br(get_sub_field('texto')); ?></p>
										</div>

										<?php if(get_sub_field('arquivo')){ ?>
											<a href="<?php the_sub_field('arquivo'); ?>" target="_blank" class="img-item" title="Download">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/documento-download.png" alt="Download">
											</a>
										<?php }else{ ?>
											<a href="<?php the_sub_field('url'); ?>" target="_blank" class="img-item" title="Acessar">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/documento-link.png" alt="Acessar">
											</a>
										<?php } ?>
									</div>

								<?php } ?>

							<?php endwhile;
						endif; ?>

					</div>
				</div>

			</div>
		</section>

	<?php endwhile; ?>

<?php get_footer(); ?>