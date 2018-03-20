<?php

function add_cpt_annonce(){

	// On créé notre type de post personnalisé
	$labels = array(
		'name'               => _x( 'Annonces', 'Nom du type de post personnalisé au pluriel', THEME_NAME_SPACE ),
		'singular_name'      => _x( 'Annonce', 'Nom du type de post personnalisé au singulier', THEME_NAME_SPACE ),
		'menu_name'          => _x( 'Annonces', 'Nom dans le menu du back-office', THEME_NAME_SPACE ),
		'name_admin_bar'     => _x( 'Annonce', 'Ajouter un nouveau dans l\'admin bar', THEME_NAME_SPACE ),
		'add_new'            => _x( 'Ajouter', 'Annonce', THEME_NAME_SPACE ),
		'add_new_item'       => __( 'Ajouter une nouvelle annonce', THEME_NAME_SPACE ),
		'new_item'           => __( 'Nouvelle annonce', THEME_NAME_SPACE ),
		'edit_item'          => __( 'Modifier l\'annonce', THEME_NAME_SPACE ),
		'view_item'          => __( 'Voir l\'annonce', THEME_NAME_SPACE ),
		'all_items'          => __( 'Toutes les annonces', THEME_NAME_SPACE ),
		'search_items'       => __( 'Chercher une annonce', THEME_NAME_SPACE ),
		'parent_item_colon'  => __( 'Annonce parente:', THEME_NAME_SPACE ),
		'not_found'          => __( 'Aucune annonce trouvée.', THEME_NAME_SPACE ),
		'not_found_in_trash' => __( 'Aucune annonce trouvée dans la corbeille.', THEME_NAME_SPACE )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Annonce des voitures à vendre.', THEME_NAME_SPACE ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'annonces' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 3,
		'show_in_nav_menus'	 => true,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type('annonce',$args);

	
	require_once(get_template_directory().'/conf/custom-post-types/annonce/metabox.php');
	require_once(get_template_directory().'/conf/custom-post-types/annonce/tax-marque.php');
	require_once(get_template_directory().'/conf/custom-post-types/annonce/tax-type.php');
	require_once(get_template_directory().'/conf/custom-post-types/annonce/tax-couleur.php');
	require_once(get_template_directory().'/conf/custom-post-types/annonce/tax-options.php');

	require_once(get_template_directory().'/conf/custom-post-types/annonce/admin-columns.php');
}

add_action('init','add_cpt_annonce');