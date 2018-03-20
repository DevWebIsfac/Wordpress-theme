<?php 

	define('THEME_NAME_SPACE','wpGarage_18');

	require_once( get_template_directory(). '/conf/add-scripts.php');
	
	require_once( get_template_directory(). '/conf/theme-support.php');
	require_once( get_template_directory(). '/conf/search-custom-fields.php');
	
	require_once( get_template_directory(). '/conf/metabox-accueil.php');

	require_once( get_template_directory(). '/conf/menus.php');
	require_once( get_template_directory(). '/conf/menu-walker-bootstrap.php');

	require_once( get_template_directory(). '/conf/custom-post-types/annonce/cpt-conf.php');
	require_once( get_template_directory(). '/conf/custom-post-types/agence/cpt-conf.php');
	require_once( get_template_directory(). '/conf/custom-post-types/actualites.php');
	require_once( get_template_directory(). '/conf/custom-post-types/annonce/filters.php');


	// Personnalisation du title

	function wpg_title( $title, $sep ){
		global $post;
		if ( is_home() ) {
			$title = __('Actualités', THEME_NAME_SPACE);
		}
		elseif( is_post_type_archive('agence') ) {
			$title = __('Agences', THEME_NAME_SPACE);
		}
		elseif( is_post_type_archive('annonce') ) {
			$title = __('Annonces', THEME_NAME_SPACE);
		}
		elseif( is_tax() ) {
			$title = single_term_title();
		}
		else {
			$title = $post->post_title;
		}
		if (is_singular('annonce')) {
			$title .= ' ' . number_format(get_post_meta( $post->ID, 'wpg_annonce_prix', true ),0,',',' ').' € ' . $sep . ' '.__('Annonces', THEME_NAME_SPACE);
		}
		if (is_singular('post')) {
			$title .= ' ' . $sep . ' '.__('Actualités', THEME_NAME_SPACE).' ';
		}
		if (is_singular('agence')) {
			$title .= ' ' . $sep . ' '.__('Agences', THEME_NAME_SPACE).' ';
		}
		$title .= ' ' . $sep . ' ' . get_bloginfo('name');

		return $title;
	}
	add_filter( 'wp_title', 'wpg_title', 10, 2 );


	// Clean-up Wordpress = supprime emoji
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); 
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' ); 
	remove_action( 'wp_print_styles', 'print_emoji_styles' ); 
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	
 ?>