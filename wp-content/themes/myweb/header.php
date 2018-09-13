<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php
	/*global $idioma;
	global $url_idioma;
	$idioma = WPGlobus::Config()->language;
	if($idioma == 'en'){
		$url_idioma = explode('/en',home_url());
		$url_idioma = $url_idioma[0];
	}else{
		if($idioma == 'es'){
			$url_idioma = explode('/es',home_url());
			$url_idioma = $url_idioma[0];
		}else{
			$url_idioma = home_url();
		}
	}*/
?>

<?php 
	$titulo_princ = get_field('titulo', 'option');
	$descricao_princ = get_field('descricao', 'option');
	$imagem_princ = get_field('imagem_principal', 'option');
	$url = get_home_url();
	$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );

	if(is_tax()){
		$terms = get_queried_object();
		$titulo = $terms->name;
		$descricao = $terms->description;
		$imagem = get_field('imagem_listagem',$terms->taxonomy.'_'.$terms->term_id);
		$url = get_term_link($terms->term_id);
	}

	if(is_archive()){
		$titulo = get_field('titulo_pagina','option');
		$descricao = get_field('descricao_pagina','option');
		$imagem = get_field('imagem_pagina','option');
		$url = $url.'/produtos';
	}

	if(is_single()){
		$titulo = get_the_title();
		$descricao = get_the_excerpt();
		
		if($imgPage[0] != ''){
			$imagem = $imgPage[0];	
		}			
		$url = get_the_permalink();
	}

	if($titulo == ''){
		$titulo = $titulo_princ;
	}else{
		$titulo = $titulo.' - '.$titulo_princ;
	}
	
	if($descricao == ''){
		$descricao = $descricao_princ;
	}

	$autor = 'Di20 Desenvolvimento';
?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $imagem; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $imagem; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo $titulo_princ; ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){

		jQuery('.menu-mobile').click(function(){
			if(jQuery(this).hasClass('active')){
				//jQuery('.nav').css('top','-100vh');
				jQuery(this).removeClass('active');
				jQuery('.header').removeClass('active');
			}else{
				//jQuery('.nav').css('top','0px');
				jQuery(this).addClass('active');
				jQuery('.header').addClass('active');
			}
		});

		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}

		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 300){
			jQuery('.header').addClass('scroll_menu');
		}
	});	

	jQuery(window).resize(function(){
		jQuery('.menu-mobile').removeClass('active');
		jQuery('.header').removeClass('active');
		//jQuery('.nav').css('top','-100vh');
		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});

	jQuery(window).scroll(function(){
		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 300){
			jQuery('.header').addClass('scroll_menu');
		}else{
			jQuery('.header').removeClass('scroll_menu');
		}
	});
</script>

<?php /*
<!-- ZOPIM -->
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4wUPiAqqUPHLIihFTiGQt2Su4HknexxE";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>

<!-- SUMO -->
<script src="//load.sumome.com/" data-sumo-site-id="0820f5828ba5ae1d27edd8bde6d74989a0ddbfa73cad0af4f62420486d84f071" async="async"></script>
*/ ?>

</head>
<body <?php body_class(); ?>>

	<header class="header">
		<div class="container">
			<h1>
				<a href="<?php echo get_home_url(); ?>" title="<?php the_field('titulo', 'option'); ?>">
					<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>">
				</a>
			</h1>

			<nav class="nav">
				<ul class="menu-principal">
					<li class="<?php if(is_page('quem-somos')){ echo 'active'; } ?>">
						<a href="<?php echo get_permalink(get_page_by_path('quem-somos')); ?>" title="<?php echo get_the_title(icl_object_id( get_page_by_path('quem-somos')->ID, 'post', false, false ));  ?>">
							<?php echo get_the_title(icl_object_id( get_page_by_path('quem-somos')->ID, 'post', false, false ));  ?>
						</a>
					</li>

					<li class="<?php if(is_page('servicos')){ echo 'active'; } ?>">
						<a href="<?php echo get_permalink(get_page_by_path('servicos')); ?>" title="<?php echo get_the_title(icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false ));  ?>">
							<?php echo get_the_title(icl_object_id( get_page_by_path('servicos')->ID, 'post', false, false ));  ?>
						</a>
					</li>

					<li class="<?php if(is_page('como-funciona')){ echo 'active'; } ?>">
						<a href="<?php echo get_permalink(get_page_by_path('como-funciona')); ?>" title="<?php echo get_the_title(icl_object_id( get_page_by_path('como-funciona')->ID, 'post', false, false ));  ?>">
							<?php echo get_the_title(icl_object_id( get_page_by_path('como-funciona')->ID, 'post', false, false ));  ?>
						</a>
					</li>

					<li class="<?php if(is_page('clientes')){ echo 'active'; } ?>">
						<a href="<?php echo get_permalink(get_page_by_path('clientes')); ?>" title="<?php echo get_the_title(icl_object_id( get_page_by_path('clientes')->ID, 'post', false, false ));  ?>">
							<?php echo get_the_title(icl_object_id( get_page_by_path('clientes')->ID, 'post', false, false ));  ?>
						</a>
					</li>

					<li class="<?php if(is_page('documentos')){ echo 'active'; } ?>">
						<a href="<?php echo get_permalink(get_page_by_path('documentos')); ?>" title="<?php echo get_the_title(icl_object_id( get_page_by_path('documentos')->ID, 'post', false, false ));  ?>">
							<?php echo get_the_title(icl_object_id( get_page_by_path('documentos')->ID, 'post', false, false ));  ?>
						</a>
					</li>

					<li class="<?php if((is_category('noticias')) or (is_single())){ echo 'active'; } ?>">
							<?php
								$categories = get_terms( 'category', array(
								    'orderby'    => 'count',
								    'hide_empty' => 0,
								    'slug' => 'noticias',
								) );
							?>
						<a href="<?php echo get_home_url(); ?>noticias" title="<?php echo $categories[0]->name; ?>">
							<?php echo $categories[0]->name; ?>
						</a>
					</li>

					<li>
						<a href="#contato" title="<?php echo get_the_title(icl_object_id( get_page_by_path('contato')->ID, 'post', false, false ));  ?>">
							<?php echo get_the_title(icl_object_id( get_page_by_path('contato')->ID, 'post', false, false ));  ?>
						</a>
					</li>

					<li class="idioma submenu active">
						<?php 
							$langs = icl_get_languages('skip_missing=0&orderby=KEY&order=DIR&link_empty_to=str');

							foreach ($langs as $key => $idioma) {
								if($idioma['active']){ ?>

										<a href="<?php echo $idioma['url']; ?>" title="<?php echo $idioma['native_name']; ?>">
											<?php echo $idioma['native_name']; ?>
										</a>

								<?php }

							}
						?>

						<ul>
							
							<?php 
								foreach ($langs as $key => $idioma) {
									//var_dump($idioma);

									if(!$idioma['active']){ ?>

										<li>
											<a href="<?php echo $idioma['url']; ?>" title="<?php echo $idioma['native_name']; ?>">
												<?php echo $idioma['native_name']; ?>
											</a>
										</li>

									<?php }

								}
							?>

						</ul>
					</li>

					<li class="area-restrita <?php if(isset($_SESSION['id'])){ echo 'submenu'; } ?>">
						<a href="javascript:" title="Área Restrita" class="btn-login">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_restrita.png">
						</a>

						<?php if(isset($_SESSION['id'])){ ?>
							<ul>
								<li>
									<form action="<?php echo get_permalink(get_page_by_path('documentos')); ?>" method="post">
										<input type="hidden" name="logout" value="true">
										<button type="submit">SAIR</button>
									</form>
								</li>
							</ul>
						<?php } ?>
					</li>
				</ul>
			</nav>
		</div>

		<i class="fa fa-bars menu-mobile" aria-hidden="true"></i>

	</header>