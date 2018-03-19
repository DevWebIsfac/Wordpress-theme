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

	
 ?>