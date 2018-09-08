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

</body>
</html>

<script type="text/javascript">
	jQuery(window).load(function(){
		jQuery('.vertical-align').each(function(){
			jQuery('.col-5',this).height(jQuery('.col-6 img',this).height());
		});
	});
</script>