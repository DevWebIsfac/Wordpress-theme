<?php

function add_cpt_agence(){

	// On créé notre type de post personnalisé
	$labels = array(
		'name'               => _x( 'Agences', 'post type general name', THEME_NAME_SPACE ),
		'singular_name'      => _x( 'Agence', 'post type singular name', THEME_NAME_SPACE ),
		'menu_name'          => _x( 'Agences', 'admin menu', THEME_NAME_SPACE ),
		'name_admin_bar'     => _x( 'Agence', 'add new on admin bar', THEME_NAME_SPACE ),
		'add_new'            => _x( 'Ajouter', 'Agence', THEME_NAME_SPACE ),
		'add_new_item'       => __( 'Ajouter une nouvelle agence', THEME_NAME_SPACE ),
		'new_item'           => __( 'Nouvelle agence', THEME_NAME_SPACE ),
		'edit_item'          => __( 'Modifier l\'agence', THEME_NAME_SPACE ),
		'view_item'          => __( 'Voir l\'agence', THEME_NAME_SPACE ),
		'all_items'          => __( 'Toutes les agences', THEME_NAME_SPACE ),
		'search_items'       => __( 'Chercher une agence', THEME_NAME_SPACE ),
		'parent_item_colon'  => __( 'Agence parente:', THEME_NAME_SPACE ),
		'not_found'          => __( 'Aucune agence trouvée.', THEME_NAME_SPACE ),
		'not_found_in_trash' => __( 'Aucune agence trouvée dans la corbeille.', THEME_NAME_SPACE )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Nos agences.', THEME_NAME_SPACE ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'agences' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 3,
		'show_in_nav_menus'	 => true,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);

	register_post_type('agence',$args);

	require_once(get_template_directory().'/conf/custom-post-types/agence/metabox.php');
}

add_action('init','add_cpt_agence');