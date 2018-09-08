<section class="box-content contato border border-verde <?php if(!is_front_page()){ echo 'cinza'; } ?>" id="contato">
	<div class="container">
		
		<div class="row">
			<div class="col-12">
				<h2 class="verde center">Contato</h2>
				<h3 class="verde center">Escreva suas dúvidas ou agende uma visita</h3>

				<?php 
					//$contact = get_page_by_path('contact'); 
					//$content = apply_filters( 'the_content', $contact->post_content ); 
				?>
			</div>

			<div class="col-6">
				<div class="content-text right txt-contato">
					<h3><strong>Equipe CertOrgânico</strong></h3>
					<h3 class="verde">contato@certotganico.com.br</h3>
					<h3 class="verde">+55 (48) 99669-5539</h3>
					<h3>Florianópolis - SC - Brasil</h3>
				</div>
			</div>
			
			<div class="col-6">
				<div class="form-contato">
					<form action="javascript:" class="contato">
						<fieldset>
							<input type="text" name="nome" id="nome" placeholder="Nome:*">
						</fieldset>

						<fieldset>
							<input type="text" name="email" id="email" placeholder="E-mail:*">
						</fieldset>

						<fieldset>
							<input type="text" name="telefone" id="telefone" placeholder="Telefone:*">
						</fieldset>

						<fieldset>
							<textarea name="mensagem" id="mensagem" placeholder="Mensagem:*"></textarea>
						</fieldset>

						<fieldset class="center">
							<p class="msg-form"></p>
							<button class="button enviar">Enviar</button>
						</fieldset>
					</form>						
				</div>
			</div>
		</div>

	</div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function(){	  

		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('Enviando').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var mensagem = jQuery('#mensagem').val();
			var para = '<?php the_field('email', 'option'); ?>';
			var nome_site = '<?php bloginfo('name'); ?>';

			if(nome == ''){
				jQuery('#nome').parent().addClass('erro');
			}

			if(email == ''){
				jQuery('#email').parent().addClass('erro');
			}

			if(telefone == ''){
				jQuery('#telefone').parent().addClass('erro');
			}

			if(mensagem == ''){
				jQuery('#mensagem').parent().addClass('erro');
			}

			if((nome == '') || (email == '') || (mensagem == '') || (telefone == '')){
				jQuery('.msg-form').html('Campos obrigatórios não podem estar vazios.').addClass('erro');
				jQuery('.enviar').html('Enviar').prop( "disabled", false );
			}else{
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('.contato').trigger("reset");
					jQuery('.enviar').html('Enviar').prop( "disabled", false );
				});
			}
		});

		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

		jQuery('textarea').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});
		
	});

</script>