<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8" />
    <title><?php wp_title('|'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class('bg-dark'); ?>>

	<header class="navbar navbar-expand-md bg-white navbar-light">
		<a href="<?php bloginfo('url'); ?>" class="navbar-brand logo">
			<?php 
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'medium' );
			?>
			<img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?>">
		</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		

		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">

			<?php
				wp_nav_menu(array(
					'theme_location' => 'main',
					'container' => '',
					'menu_class' => 'navbar-nav mr-auto',
					'walker' => new bs4Navwalker()
				)); 
			?>

			<?php get_search_form(); ?>
		</div>

	</header>



