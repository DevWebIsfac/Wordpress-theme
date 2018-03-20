<footer class="container-fluid text-light">
	<div class="p-5">
		<?php wp_nav_menu(array(
			'theme_location' => 'footer-nav',
			'container' => '',
			'menu_class' => 'nav justify-content-center',
			'walker' => new bs4Navwalker()
		)); ?>
	</div>
	<div class="row credits text-light p-2">
		<div class="col">&copy; WP Garage</div>
		<div class="col text-right"><a href="<?php echo admin_url(); ?>"><?php __('Connexion', THEME_NAME_SPACE) ?></a></div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>